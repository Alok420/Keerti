<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include '../Common/CDN.php';
include '../Common/colors.php';
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            var six_digit_random_number;
            $(document).ready(function () {
                $(".numberverification").height($(".body").height());
                $(".emailverification").height($(".body").height());
                $('#contactnumber').blur(function () {
                    $('.numberverification').slideDown(1000);
                    $('.numberverification h3').append($(" - " + "#contactnumber").val());
                });
                $('#EmailID').blur(function () {
                    var email = $("#EmailID").val();
                    var radioValue = $("input[name='type']:checked").val();
                    if (email != "" && radioValue != "") {
                        var subject = "Email verification";
                        var body = "Please verify your email address: OTP IS ";
                        $('.emailverification').slideDown(1000);
                        $('.emailverification h3').append(" - " + email);
                        $('.emailverification h2').text(email + " : ");
                        var remail = checkEmail(radioValue, email, email, subject, body);


                    }

                });

                $('#otpcheck').click(function () {
                    var userotp = $("#emailotptextbox").val();
                    if (userotp == six_digit_random_number) {
                        $("#otpstatus").text("Email ID verification is done");

                        $('.emailverification').slideUp(2000, function () {
                            $('.emailverification').remove();
                            $('#form').show();
                            $('.container-frm').hide();
                        });
                    } else {
                        $("#otpstatus").text("Incorrect OTP");
                    }
                });
            });
            function sentOtp(to, subject, body) {
                six_digit_random_number = Math.floor(Math.random() * 100000) + 999999;
                $.post("MailSendingController.php",
                        {
                            to: "" + to,
                            subject: "" + subject,
                            body: "" + body + " " + six_digit_random_number
                        },
                        function (data, status) {

                        });
            }
            function checkEmail(type, email, to, subject, body) {
                var email2 = "";
                $.post("checkMail.php",
                        {
                            type: "" + type,
                            email: "" + email
                        },
                        function (data, status) {
                            email2 = data;
                            if (email == email2) {
                                sentOtp(email, subject, body);
                                
                            } else {
                                alert("email not found " + email);
                            }
                        });

            }
        </script>
        <script>
            $(document).ready(function () {
                var pass1, pass2, username;
                $('#pass2').keyup(function () {
                    pass1 = $('#pass1').val();
                    pass2 = $('#pass2').val();
                    username = $('#username').val();
                    if (pass1 != "" && pass2 != "" && username != "") {
                        if (pass1 == pass2) {
                            $('#lblmsg').text("");
                            $('#btn').show();
                        } else {
                            $('#lblmsg').text("Both Passwords are not same");

                        }
                    } else {
                        $('#lblmsg').text("please fill both the fields");
                    }
                });
            });


        </script>
        <style>
            .emailverification h2{
                display: inline;
            }
            .numberverification,.emailverification{
                width:90%;
                height: 100vh;
                text-align: center;
                position: fixed;
                top: 0px;
                left:5%;
                background-color:rgba(236,240,241,.9);
                display: none;
                box-shadow: 1px 1px 100px black,-1px -1px 100px black;
            }
            .verificationbox{
                /*display: none;*/
                background-color: #95afc0;
                border:thin solid black;
                margin: 20px;
                padding: 50px;
            }

            .verificationbox input[type=text]{
                margin: 10px auto;
                width:300px;
            }

        </style>
    </head>
    <body>
        <div class="container container-frm">
            <h3>Please enter your email below:</h3>

            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label>Candidates <input name="type" type="radio" value="candidates" checked>  </label>
                <label>Employers <input name="type" type="radio" value="employers">  </label>
                <label>Branch <input type="radio" name="type" value="branches">  </label>
                <label>Main branch <input type="radio" name="type" value="mainbranch">  </label>
                <input id="EmailID" class="form-control" type="text" name="email">
            </form>
        </div>

        <div>
            <div class="emailverification">
                <h1>Email verification</h1>
                <h3>Enter OTP that is sent on your Email</h3>
                <div class="verificationbox">
                    <input type="text" id="emailotptextbox" class="form-control" placeholder="Enter otp">
                    <button type="button" id="otpcheck" class="btn btn-default">Submit OTP</button>
                    <div id="otpstatus"></div>

                </div>
                <h2></h2><button type="button" class="btn btn-default" id="onemail">Send OTP Again</button></button>

            </div>
            <div class="numberverification">
                <h1>Email verification</h1>
                <h3>Enter OTP that is sent on your phone number</h3>
                <div class="verificationbox">
                    <input type="text" class="form-control" placeholder="Enter otp">
                    <button type="button" id="contactotpcheck">Submit OTP</button>
                    <div id="otpstatus"></div>
                </div>
                <h2></h2><button type="button" class="btn btn-default" id="oncontact">Send OTP Again</button>

            </div>

        </div>
        <div class="container" id="form" style="display: none;">
            <form action="passwordChangeControl.php" method="POST">
                <label>User name</label><br>
                <input type="hidden" value="login_credentials" name="tablename"><br>
                <input type="text" name="username" id="username"><br>
                <label>New Password:</label><br>
                <input type="password" name="password" id="pass1"><br>
                <label>Re enter password:</label><br>
                <input type="password" id="pass2"><br>
                <label id="lblmsg"></label><br>
                <input type="submit" id="btn" style="display: none;" value="change"><br>
            </form>
        </div>
    </body>
</html>
