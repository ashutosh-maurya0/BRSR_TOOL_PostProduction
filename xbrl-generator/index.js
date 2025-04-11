const mysql = require('mysql');
const fs = require('fs');
const xmlbuilder = require('xmlbuilder');

const logFile = 'index_js.log';
const cin = process.env.CIN;

fs.appendFileSync(logFile, `${new Date().toISOString()} - index.js started. CIN: ${cin}\n`);

if (!cin) {
  console.error('CIN not found.');
  fs.appendFileSync(logFile, `${new Date().toISOString()} - CIN not found.\n`);
  process.exit(1);
}

// Debug statement to confirm script invocation
console.log('index.js invoked. CIN:', cin);
fs.appendFileSync(logFile, `${new Date().toISOString()} - index.js invoked. CIN: ${cin}\n`);

// Database connection
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'crus'
});

connection.connect();

// Fetch data from the database based on the provided CIN
const queries = [
  'SELECT * FROM section_a_form WHERE cin = ?',
  'SELECT * FROM section_b_form WHERE cin = ?',
  'SELECT * FROM section_c_form WHERE cin = ?'
];

const xbrl = xmlbuilder.create('xbrl', { encoding: 'utf-8' });

const schemaRef = xbrl.ele('link:schemaRef', {
  'xlink:type': 'simple',
  'xlink:href': 'your_schema.xsd',
  xmlns: 'http://www.xbrl.org/2003/instance',
  'xmlns:link': 'http://www.xbrl.org/2003/linkbase'
});

const processQuery = (query, callback) => {
  connection.query(query, [cin], (error, results) => {
    if (error) {
      console.error('Error querying database:', error);
      fs.appendFileSync(logFile, `${new Date().toISOString()} - Error querying database: ${error}\n`);
      return callback(error);
    }

    if (results.length === 0) {
      console.log(`No data found for CIN: ${cin} in query: ${query}`);
      fs.appendFileSync(logFile, `${new Date().toISOString()} - No data found for CIN: ${cin} in query: ${query}\n`);
      return callback(null);
    }

    results.forEach(row => {
      const contextId = `I-${row.cin}`;
      const context = xbrl.ele('context', { id: contextId });
      const entity = context.ele('entity');
      entity.ele('identifier', { scheme: 'http://www.sec.gov/CIK' }, row.cin);
      const period = context.ele('period');
      period.ele('instant', new Date().toISOString().split('T')[0]);

      for (const column in row) {
        if (row.hasOwnProperty(column) && row[column] !== null) {
          xbrl.ele(`crus:${column}`, {
            contextRef: contextId,
            xmlns: 'http://www.yourdomain.com/xbrl/2024-01-01'
          }, row[column]);
        }
      }
    });

    callback(null);
  });
};

let queryIndex = 0;

const nextQuery = () => {
  if (queryIndex < queries.length) {
    processQuery(queries[queryIndex], (error) => {
      if (error) {
        connection.end();
        return;
      }
      queryIndex++;
      nextQuery();
    });
  } else {
    // All queries processed, end connection and write XBRL file
    connection.end();

    const xmlString = xbrl.end({ pretty: true });

    fs.writeFile('xbrl_output.xbrl', xmlString, (err) => {
      if (err) {
        console.error('Error writing XBRL document:', err);
        fs.appendFileSync(logFile, `${new Date().toISOString()} - Error writing XBRL document: ${err}\n`);
        return;
      }
      console.log('XBRL document has been saved!');
      fs.appendFileSync(logFile, `${new Date().toISOString()} - XBRL document has been saved!\n`);
    });
  }
};

nextQuery();
