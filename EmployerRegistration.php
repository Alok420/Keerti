<html>
    <head>
        <?php
        session_start();
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      <script>
            var six_digit_random_number;
            $(document).ready(function () {
                $(".numberverification").height($(".body").height());
                $(".emailverification").height($(".body").height());
//                $('#contactnumber').blur(function () {
////                    $('.numberverification').slideDown(1000);
////                    $('.numberverification h3').append($(" - " + "#contactnumber").val());
//                });
                $('#EmailID').blur(function () {
                    var email = $("#EmailID").val();
                    if (!email == "") {
                        var subject = "Email verification";
                        var body = "Please verify your email address: OTP IS ";
                        $('.emailverification').slideDown(1000);
                        $('.emailverification h3').append(" - " + email);
                        $('.emailverification h2').text(email + " : ");
                        sentOtp(email, subject, body);
                    }

                });

                $('#otpcheck').click(function () {
                    var userotp = $("#emailotptextbox").val();
                    if (userotp == six_digit_random_number) {
                        $("#otpstatus").text("Email ID verification is done");

                        $('.emailverification').slideUp(2000, function () {
                            $("#otpstatus").text(" ");
                            $("#emailotptextbox").val("")
                               $('.emailverification h3').text("");
                        $('.emailverification h2').text("");
                        });
                    } else {
                        $("#otpstatus").text("Incorrect OTP");
                    }
                });
            });
            function sentOtp(to, subject, body) {
                six_digit_random_number = Math.floor(Math.random() * 100000) + 999999;
                $.post("controller/MailSendingController.php",
                        {
                            to: "" + to,
                            subject: "" + subject,
                            body: "" + body + " " + six_digit_random_number
                        },
                        function (data, status) {

                        });
            }
        </script>
        <style type="text/css">
<?php include './css/Footer.css'; ?>
            .emsg{
                color: red;
            }
            .hidden {
                display: none;
            }
            .emsg1{
                color: red;
            }
            .hidden1 {
                display: none;
            }

            .emsg2{
                color: red;
            }
            .hidden2 {
                display: none;
            }

            .emsg3{
                color: red;
            }
            .hidden3{
                display: none;
            }

            .emsg4{
                color: red;
            }
            .hidden4{
                display: none;
            }

            .emsg5{
                color: red;
            }
            .hidden5{
                display: none;
            }
            .emsg6{
                color: red;
            }
            .hidden6{
                display: none;
            }
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
            
<?php include 'css/SignupForm_Employee.css'; ?>
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="container" >
            <div class="row">
                <div class="col-md-4 py-5 border border-dark " style="text-align: center; background: #ecf0f1; color: black; ">
                    <div class=" ">
                        <div class="card-body">
                            <img src="images/Employer.png" style="width:50%">
                            <h2 class="py-3"> Employer Registration</h2>
                            <p>Welcome To Employer or Member Registration Area 
                            </p>                      
                            <h2 class="py-3">Login Now </h2>
                            <p> If You Have Already Account Employer Can Login Here 
                            <div class="flex-box">
                                <a href="Login_User.php"><button type="button" class="btn1 btn-info">Login</button></a>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 py-5  border border-dark">
                    <h4 class="pb-4">Please fill with your details</h4>
                    <form id="myform" method="POST" action="controller/RecruiterRegistrationController.php" enctype="multipart/form-data">

                        <div class="form-row">


                            <div class="form-group col-md-6">
                                <h6>Organization Name</h6>
                                <input  data-validation="length alpha" data-validation-length="min5" id="OrganizationName" name="Organization Name" placeholder="Organization_Name" class="form-control" type="text" required="required"><span class="emsg hidden">Please Enter a Valid Name</span>
                            </div>

                            <div class="form-group col-md-6">
                                <h6>Type of organization(Comp/org</h6>
                                <input type="text" class="form-control" id="typesof" name="Type_of_organization" placeholder="Type of organization ">
                                <span class="emsg1 hidden1">Please Enter a Valid Organization Name</span>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6>Date of incorporation</h6>
                                <input type="Date" name="Date_of_incorporation" class="form-control" id="Date_of_incorporation" placeholder="Date of incorporation" required="required">

                            </div>

                            <div class="form-group col-md-6">
                                <h6>Employee Strength</h6>
                                <input id="Employee" name="Employee_Strength" placeholder="Employee Strength" class="form-control" required="required" type="text">
                                <span class="emsg2 hidden2">Please Enter Valid Employee </span>
                            </div>

                            <div class="form-group col-md-6">
                                <h6>Number of branches in India</h6>
                                <p>
                                    <input id="Number of branches in India " name="branches_in_India" placeholder="Number of branches in India " class="form-control"  type="number"data-validation-length="min4"></p>

                            </div>
                            <div class="form-group col-md-6">
                                <h6>Number of branches abroad </h6>
                                <p>
                                    <input id="Number" name="branches_abroad" placeholder="Number of branches abroad" class="form-control" required="required" type="number">
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Male Female employee ratio</h6>
                                <p>
                                    <input id="Number" name="Male_Female_employee_ratio" placeholder="20-30" class="form-control" required="required" type="text">
                                </p>
                            </div>
                            <div class="form-group col-md-6">

                                <h6>Name of contact person  </h6>
                                <input id="Nameof" name="contact_person" placeholder="Name of contact person  " class="form-control" required="required" type="Text">
                                <span class="emsg3 hidden3">Please Enter Valid Name</span>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Contact mobile number</h6>
                                <input id="contactnumber" name="Contact_number" placeholder="Contact number " class="form-control" required="required" type="text" size="10">
                                <span class="emsg4 hidden4">Please Enter min 10</span>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Alternate contact number 1</h6>
                                <input id="Alternate" name="Alternate_contact_number1" placeholder="Alternate contact number " class="form-control" required="required" type="text">
                                <span class="emsg6 hidden6">Please Enter min 10</span>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Alternate contact number 2</h6>
                                <input id="Alternate" name="Alternate_contact_number2" placeholder="Alternate contact number " class="form-control" required="required" type="text">
                                <span class="emsg6 hidden6">Please Enter min 10</span>
                            </div>

                            <div class="form-group col-md-6">
                                <h6>Email ID </h6>
                                <input id="EmailID" name="Email_ID" placeholder="Email ID " class="form-control" required="required" type="email">
                                <span class="emsg5 hidden5">Please Enter a Valid Email</span>
                            </div> 
                            <div class="form-group col-md-6">
                                <h6>Fax number </h6>
                                <input id="Fax" name="Fax" placeholder="Fax ID " class="form-control" required="required" type="text">
                                <span class="emsg5 hidden5">Please Enter a Valid Email</span>
                            </div> 
                            <div class="form-group col-md-6">
                                <h6>Address of registered office </h6>
                                <input id="Address of registered office" name="Address_office" placeholder="Address of registered office  " class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Upload company logo</h6>
                                <input id="Address of registered office" name="company_logo" placeholder="Any png or jpg" class="form-control" required="required" type="file">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>User name</label>
                                    <input id="username" name="user_name" placeholder="johndoe1234" class="form-control" type="text">
                                    <span class="username hidden1">Please Enter a Valid Name</span>


                                </div>

                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pass" name="password" placeholder="********">
                                    <span class="pass hidden2">Please Enter a Valid Name</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-check">

                                            <label class="form-check-label" for="invalidCheck2">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                                <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row">
                                <button type="submit" class="btn2 btn-info">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
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

        <?php include './Common/Footer.php'; ?>
    </body>



</html>