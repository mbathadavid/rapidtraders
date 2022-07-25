<?php
session_start();
include 'functions.php';
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'mail\src\Exception.php';
// require 'mail\src\PHPMailer.php';
// require 'mail\src\SMTP.php';

//$mail = new PHPMailer(TRUE);

$db = new Auth();

$response = array();

//Account Register
if (isset($_POST['fname']) || isset($_POST['lname']) || isset($_POST['uname']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['pword'])) {
        $fname = $db->test_input($_POST['fname']);
        $lname = $db->test_input($_POST['lname']);
        $uname = $db->test_input($_POST['uname']);
        $email = $db->test_input($_POST['email']);
        $phoneno = $db->test_input($_POST['phone']);
        $pass = $db->test_input($_POST['pword']);

        $checkemail = $db->checkemail($email);
        $checkphone = $db->checkphone($phoneno);

        if ($checkemail != null) {
            $response = array(
                'status' => 401,
                'message' => 'Sorry! This email has already registered another account'
            );
        } else if($checkphone != null) {
            $response = array(
                'status' => 401,
                'message' => 'Sorry! This phone number has already registered another account'
            );
        } else {
        $latest = $db->fetchlatest();

        if ($latest == null) {
            $sn = 1;
        } else {
            $sn = $latest['SN'] + 1;
        }

        $refcode = $uname.$sn;

        $signup = $db->signup($fname,$lname,$phoneno,$email,$uname,$pass,$refcode);

            if ($signup === TRUE) {
                $response = array(
                    'status' => 200,
                    'message' => 'You have successfully created an account. Check your email to verify your account.'
                );
            } else {
                $response = array(
                    'status' => 400,
                    'message' => 'An error occured while trying to create your account.! try again later'
                );    
            }
            //Send email start
            // try{
            //     $mail->isSMTP();
            //     $mail->Host = 'smtp.gmail.com'; 
            //     $mail->SMTPAuth = true;
            //     $mail->Username = "buysell914@gmail.com";
            //     $mail->Password = "Buysell1998";
            //     //$mail->SMTPAuth = true;
            //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //     $mail->Port = 587;
            //     $mail->setFrom("buysell914@gmail.com");
            //     $mail->addAddress($email);
            //     $mail->isHTML(true);
            //     $mail->Subject = 'Reset Password';
            //     $mail->Body = '<h3>Click the link below to reset your password.<br><a href="http://172.16.121.185:80/Class/reset-pass.php?email='.$email.'&token='.$token.'">Click to reset password</a><br>Regards<br>Admin BuySell.</h3>';
            //     //$mail->SMTPDebug = 4;
            //     $mail->send();
            //     echo 'We have send you a email reset link,click to reset your password.';
            //   }
            //   catch (Exception $e){
            //     echo 'Sorry,Something went wrong.Please try again Later.'.$e->errorMessage();
            //   }
            //Send email end
            
        }

        echo json_encode($response);
}

//login
// if(isset($_POST['username']) || isset($_POST['password'])) {
//     $data = $db->login($_POST['username'],$_POST['password']);
//     if ($data != null) {
//         $response = array(
//             'status' => 'success',
//             'message' => $data
//         );
//     } else {
//         $response = array(
//             'status' => 'failed',
//             'message' => 'Either the password or Email is wrong'
//         );
//     }
//    echo json_encode($response); 
// }

?>