<?php
session_start();

// Check if CIN is set in GET data
if (!isset($_GET['cin'])) {
    echo "CIN not set in GET data.";
    exit;
}

$cin = $_GET['cin'];

// Debug statement to confirm script invocation
echo "run_nodejs.php invoked. CIN: $cin\n";

// Log the invocation to a file
$logFile = 'run_nodejs.log';
file_put_contents($logFile, date('Y-m-d H:i:s') . " - run_nodejs.php invoked. CIN: $cin\n", FILE_APPEND);

// Full path to Node.js
$nodePath = 'node'; // Replace with the actual path to node path 

// Construct the command
$command = "$nodePath index.js";
putenv("CIN=$cin");
file_put_contents($logFile, date('Y-m-d H:i:s') . " - Command: $command\n", FILE_APPEND);

// Execute the Node.js script with the CIN as an environment variable
$output = shell_exec($command . " 2>&1");

// Log the output of the Node.js script
file_put_contents($logFile, date('Y-m-d H:i:s') . " - Node.js output: $output\n", FILE_APPEND);

// File path to the generated XBRL document
$file = 'xbrl_output.xbrl';

if (file_exists($file)) {
    // Send the XBRL content as a download
    header('Content-Type: application/xml');
    header('Content-Disposition: attachment; filename="output.xbrl"');
    readfile($file);
    exit;
} else {
    echo "Error: XBRL file not found.";
}
?>
