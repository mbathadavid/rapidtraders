<?php
session_start();
include 'functions.php';
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");

$db = new Auth();

$response = array();

if (isset($_POST['uname']) || isset($_POST['pword'])) {
    $uname = $db->test_input($_POST['uname']);
    $pword = $db->test_input($_POST['pword']);

    $email = $db->checkemail($uname);

    if ($email == null) {
        $response = array(
            'status' => 401,
            'message' => 'Sorry, no account with such email registered'
        );
    } else {
        $logindetails = $db->login($uname,$pword);

        if ($logindetails['pword'] != $pword) {
            $response = array(
                'status' => 401,
                'message' => 'Sorry, you entered incorrect password'
            );
        } else {
            $_SESSION['user'] = $logindetails;

            $response = array(
                'status' => 200,
                'message' => $logindetails
            );    
        }
        
    }
    
    echo json_encode($response);
}



?>