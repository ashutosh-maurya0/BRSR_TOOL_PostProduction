const mysql = require('mysql');
const fs = require('fs');
const phpSession = require('php-session');
const xmlbuilder = require('xmlbuilder');

// Define the path to your PHP session files
const sessionPath = 'C:\wamp\bin\php\php7.4.33\php.ini'; // Update this path according to your WAMP server configuration

// Get the PHP session ID from the environment variable
const sessionId = process.env.PHPSESSID;

if (!sessionId) {
  console.error('PHP session ID not found.');
  process.exit(1);
}

// Debug statement to confirm script invocation
console.log('index.js invoked. PHPSESSID:', sessionId);

// Log the invocation to a file
const logFile = 'index_js.log';
fs.appendFileSync(logFile, `${new Date().toISOString()} - index.js invoked. PHPSESSID: ${sessionId}\n`, (err) => {
  if (err) {
    console.error('Error writing to log file:', err);
    process.exit(1);
  }
});

// Read the session data
phpSession(sessionPath).get(sessionId, (err, session) => {
  if (err) {
    console.error('Error reading PHP session:', err);
    fs.appendFileSync(logFile, `${new Date().toISOString()} - Error reading PHP session: ${err}\n`);
    process.exit(1);
  }

  const cin = session.cin;

  if (!cin) {
    console.error('CIN not found in PHP session.');
    fs.appendFileSync(logFile, `${new Date().toISOString()} - CIN not found in PHP session.\n`);
    process.exit(1);
  }

  console.log('CIN:', cin);
  fs.appendFileSync(logFile, `${new Date().toISOString()} - CIN: ${cin}\n`);

  // Database connection
  const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'crus'
  });

  connection.connect();

  // Fetch data from the database based on the provided CIN
  connection.query('SELECT * FROM section_a_form WHERE cin = ?', [cin], (error, results, fields) => {
    if (error) throw error;

    if (results.length === 0) {
      console.log(`No data found for CIN: ${cin}`);
      fs.appendFileSync(logFile, `${new Date().toISOString()} - No data found for CIN: ${cin}\n`);
      connection.end();
      return;
    }

    // Create an XBRL document
    const xbrl = xmlbuilder.create('xbrl');
    const schemaRef = xbrl.ele('link:schemaRef', {
      'xlink:type': 'simple',
      'xlink:href': 'your_schema.xsd',
      xmlns: 'http://www.xbrl.org/2003/instance',
      'xmlns:link': 'http://www.xbrl.org/2003/linkbase'
    });

    const row = results[0];
    const contextId = `I-${row.cin}`;

    // Create context element
    const context = xbrl.ele('context', { id: contextId });
    const entity = context.ele('entity');
    entity.ele('identifier', { scheme: 'http://www.sec.gov/CIK' }, row.cin);
    const period = context.ele('period');
    period.ele('instant', new Date().toISOString().split('T')[0]);

    // Add each column as an XBRL fact
    for (const column in row) {
      if (row.hasOwnProperty(column) && row[column] !== null) {
        const fact = xbrl.ele(`crus:${column}`, {
          contextRef: contextId,
          xmlns: 'http://www.yourdomain.com/xbrl/2024-01-01'
        }, row[column]);
      }
    }

    // Convert XBRL document to string
    const xmlString = xbrl.end({ pretty: true });

    // Write XBRL document to file
    fs.writeFile('output.xbrl', xmlString, (err) => {
      if (err) throw err;
      console.log('XBRL document has been saved!');
      fs.appendFileSync(logFile, `${new Date().toISOString()} - XBRL document has been saved!\n`);
    });

    connection.end();
  });
});
