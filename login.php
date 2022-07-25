<?php
session_start();
    if( isset( $_SESSION['user'] ) ) {
        header("Location: dashboard.php");
        exit();
    }else {
        
    }
//$loggeduserdetails = $_SESSION['user'];
    // if (count($loggeduserdetails) > 0) {
    //     header("Location: dashboard.php");
    //     exit();
    // } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<body class="bg-success">
<div style="display: flex; justify-content: center; align-items: center;">
        <div class="col-lg-4 col-md-8 col-sm-11">
            <form action="#" id="loginform" method="post">
                <div class="form-group mb-2">
                    <label for="">Enter your email to login</label>
                    <input type="email" name="uname" id="uname" class="form-control" required>
                </div>
        
                <div class="form-group mb-2">
                    <label for="">Enter your password</label>
                    <input type="password" name="pword" id="pword" class="form-control" required>
                </div>
                    <input type="submit" name="submit" id="submitbtn" value="LOGIN" class="form-control btn btn-danger">
            </form>
            <h6 class="text-info text-center">Do not have account? <a href="createaccount.php">Create Account</a></h6>
            <h5 class="text-info text-center">Forgot Password? <a href="pass-reset.php">Reset Password</a></h5>
        </div>
     </div>   
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
        $("#loginform").submit(function(e){
            e.preventDefault();
            //removeValidationClasses($("#createaccountform"))
            $('#submitbtn').val('PLEASE WAIT...');
            var formData = new FormData($('#loginform')[0]);

            $.ajax({
                method: 'POST',
                url: 'backend/signin.php',
                contentType: false,
                processData: false,
                data: formData,
               //dataType: 'json',
                success: function(res){
                    console.log(res);
                    $('#submitbtn').val('LOGIN');
                    if (res.status == 200) {
                        window.location = 'dashboard.php';
                    } else {
                        
                    }
                }
            })

        })
    
    })
</script>
</html>