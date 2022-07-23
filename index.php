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
<div style="display: flex;justify-content: center;align-items: center;">
        <div class="col-lg-4 col-md-8 col-sm-11">
            <form action="#" id="createaccountform" method="post">
                <div class="form-group mb-2">
                    <label for="">Enter your First name</label>
                    <input type="text" name="fname" id="fname" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Enter your last name</label>
                    <input type="text" name="lname" id="lname" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Enter your username</label>
                    <input type="text" name="uname" id="uname" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Enter your email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Enter your phone number</label>
                    <input type="number" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Enter your password</label>
                    <input type="password" name="pword" id="pword" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Confirm your password</label>
                    <input type="password" name="cpassword" id="cpassword" class="form-control" required>
                </div>
                    
                <input type="submit" name="submit" id="submitbtn" value="CREATE ACCOUNT" class="form-control btn btn-danger">
            </form>
            <h6 class="text-info text-center">Already have an account? <a href="login.php">LOGIN</a></h6>
        </div>
     </div>   
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#createaccountform").submit(function(e){
            e.preventDefault();
            //removeValidationClasses($("#createaccountform"))
            $('#submitbtn').val('PLEASE WAIT...');
            var formData = new FormData($('#createaccountform')[0]);

            $.ajax({
                method: 'POST',
                url: 'backend/signup.php',
                contentType: false,
                processData: false,
                data: formData,
               //dataType: 'json',
                success: function(res){
                console.log(res);
                $('#submitbtn').val('CREATE ACCOUNT');
                //    if (res.status == 401) {
                //     showError('profilepic', res.messages);
                //    } else if(res.status == 200){
                //     $('#accountupdatedivres').html('<div class="alert alert-success alert-dismissible w3-animate-zoom show" role="alert"><strong>'+res.messages+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
                //     removeValidationClasses($("#updateprofileform"));
                //     $('#updateprofileModal').modal('hide');
                    
                //    } else if(res.status == 400) {
                //      showError('profilepic', res.messages.profilepic);
                //    }  
               }
            })

        })
    
    })
</script>
</html>