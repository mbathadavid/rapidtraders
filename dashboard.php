<?php
session_start();
    if( isset( $_SESSION['user'] ) ) {
        $loggeduserdetails = $_SESSION['user']; 
    }else {
        header("Location: login.php");
        exit();
    }

    $file = "http://localhost/".$_SERVER["SCRIPT_NAME"];
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
<!---Confirm number modal--->
<div class="modal w3-animate-zoom" id="confirmnumbermodal" tabindex="-1" aria-labelledby="confirmnumbermodal">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-success text-center">Confirm Number</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" id="paymentform" method="post">
        <div class="d-flex row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
         <div class="form-group">
            <label for="">Confirm Number</label>
            <input type="text" class="form-control" name="pnumber" class="number">
         </div>
         </div>
         </div>
        </form>
    </div>
    </div>
    </div>  
    </div>      
<!---Confirm number modal end--->


<h3 class="text-center">You are logged in as <?=$loggeduserdetails['Fname']?> <?=$loggeduserdetails['Lname']?></h3>
<div style="display: flex;justify-content: center;align-items: center;">
    <div class="col-lg-4 col-md-8 col-sm-11">
        <h4>First Name : <?=$loggeduserdetails['Fname']?></h4>
        <h4>Last Name : <?=$loggeduserdetails['Lname']?></h4>
        <h4>Email : <?=$loggeduserdetails['email']?></h4>
        <h4>Phone : <?=$loggeduserdetails['phone']?></h4>
        <h4>Username : <?=$loggeduserdetails['username']?></h4>
        <h4>Refferral Code : <?=$loggeduserdetails['referralcode']?></h4>
           
        <a href="" id="logout">LOG OUT</a><br>

        <button class="btn btn-sm btn-danger" id="paymentbtn">Make Payment</button>
     </div> 
</div>  
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#logout').click(function(e){
            e.preventDefault();

            var path = "<?=$file?>";
            
            var data = new FormData();
            data.append('path',path);

            var confirm = window.confirm('Are you sure you want to log out? Your session will be unset once you log out');

            if(confirm){
            $.ajax({
                method: 'POST',
                url: "backend/logout.php",
                contentType: false,
                processData: false,
                data: data,
                //dataType: 'json',
                success: function(res){
                    console.log(res)
                    window.location = "login.php";
                    }
                }) 

                window.location = "login.php";

            } 
        })

        //Trigger STK PUSH
        $('#paymentbtn').click(function(){
            $('#confirmnumbermodal').modal('show'); 
        })

    })
</script>
</html>