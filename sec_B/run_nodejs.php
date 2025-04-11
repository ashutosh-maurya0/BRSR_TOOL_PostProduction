<?php
session_start();

// Check if CIN is set in session
if (!isset($_SESSION['cin'])) {
    echo "CIN not set in session.";
    exit;
}

$cin = $_SESSION['cin'];

// Debug statement to confirm script invocation
echo "run_nodejs.php invoked. CIN: $cin\n";

// Log the invocation to a file
$logFile = 'run_nodejs.log';
//file_put_contents($logFile, date('Y-m-d H:i:s') . " - run_nodejs.php invoked. CIN: $cin\n", FILE_APPEND);

// Execute the Node.js script with the CIN as an environment variable
$command = escapeshellcmd("PHPSESSID=" . session_id() . " node index.js");
$output = shell_exec($command);

// Log the output of the Node.js script
file_put_contents($logFile, date('Y-m-d H:i:s') . " - Node.js output: $output\n", FILE_APPEND);

// Display the output
echo "<pre>$output</pre>";
?>
