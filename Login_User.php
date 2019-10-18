<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <?php
     
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/user_login.css" rel="stylesheet" type="text/css"/>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style type="text/css">
<?php include './css/Footer.css'; ?>
     
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="container login-container">
            <h2 style="color: red; text-align: center; font-size: 25px; font-weight: bold;">
                <?php
                if (isset($_GET["message"])) {
                    echo $_GET["message"];
                }
                ?>
            </h2>
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h1>Not yet registered?</h1>
                    <a href="SignupForm_Employee.php">
                        <div class="registrationlink">
                            Register as candidate 
                        </div>
                    </a>
                    <a href="EmployerRegistration.php">
                        <div class="registrationlink">
                            Register as Recruiter 
                        </div>
                    </a>
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    </div>
                    <form method="POST" action="controller/CLoginControl.php">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" name="password" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" />
                        </div>
                        <div class="form-group">
                            <a href="controller/Forgot_Password.php" class="btnForgetPwd">Forget Password?</a> 
                        </div>
                    </form>
                    </form>
                </div>
            </div>

        </div>
        <?php include './Common/Footer.php'; ?>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </body>
</html>
