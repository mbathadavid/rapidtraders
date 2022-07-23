<?php
session_start();
$loggeduserdetails = $_SESSION['user'];

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
<h3 class="text-center">You are logged in as <?=$loggeduserdetails['Fname']?> <?=$loggeduserdetails['Lname']?></h3>
<div style="display: flex;justify-content: center;align-items: center;">
    <div class="col-lg-4 col-md-8 col-sm-11">
        <h4>First Name : <?=$loggeduserdetails['Fname']?></h4>
        <h4>Last Name : <?=$loggeduserdetails['Lname']?></h4>
        <h4>Email : <?=$loggeduserdetails['email']?></h4>
        <h4>Phone : <?=$loggeduserdetails['phone']?></h4>
        <h4>Username : <?=$loggeduserdetails['username']?></h4>
           
     </div> 
</div>  
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
    
    })
</script>
</html>