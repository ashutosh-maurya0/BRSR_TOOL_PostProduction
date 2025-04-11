<?php
session_start();

$response = array('new_session' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if session is new
    if (!isset($_SESSION['cin'])) {
        $response['new_session'] = true;
    }
    echo json_encode($response);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set session variable
    $cin = isset($_POST['cin']) ? $_POST['cin'] : '';
    if (!empty($cin)) {
        $_SESSION['cin'] = $cin;
        $response['message'] = 'CIN set successfully';
    } else {
        $response['message'] = 'CIN is empty';
    }
    echo json_encode($response);
}
?>