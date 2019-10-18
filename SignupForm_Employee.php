<?php session_start(); ?>
<html>
    <head>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <?php
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        include './Common/CDN.php';
        ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            var fields = {
                fname: false,
                lname: false,
                dob: false,
                email: false,
                mobile: false,
                username: false,
                password: false,
                confirmpassword: false
            };
            function getFieldData(id) {
                var data = $('#' + id).val();
                return data;
            }
            function fname(fname) {
                var re = /^[a-zA-Z ]+$/;
                fields["fname"] = re.test(fname);
            }
            function lname(lname) {
                var re = /^[a-zA-Z ]+$/;
                fields["lname"] = re.test(lname);
            }
            function dob(dob) {
                var re = /^\d{2}([./-])\d{2}\1\d{4}$/;
                fields["dob"] = re.test(dob);
            }
            function filterPhone(mobile) {
                var pattern = new RegExp("^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$");
                fields["mobile"] = pattern.test(mobile);
            }
            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                fields["email"] = re.test(email);
            }
            function ValidateUsername(username) {
                var re = /^(?!\s*$).+/;
                fields["username"] = re.test(username);
            }
            function ValidatePassword(password) {
                var re =  new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{4,})");
                fields["password"] = re.test(password);
            }
            function confirm_password(password, confirmpassword) {
                if (password != confirmpassword) {
                    fields["confirmpassword"] = false;
                } else {
                    fields["confirmpassword"] = true;
                }
            }
            function validate(fields) {
                var finallyreturn = true;
                fname(getFieldData("fname"));
                lname(getFieldData("lname"));
                dob(getFieldData("dob"));
                filterPhone(getFieldData('mobile'));
                validateEmail(getFieldData('email'));
                ValidateUsername(getFieldData('username'));
                ValidatePassword(getFieldData('password'));
                confirm_password(getFieldData('password'), getFieldData('confirmpassword'));
                for (var key in fields) {
                    if (fields.hasOwnProperty(key)) {
                        console.log(key + "--" + fields[key]);
                        if (fields[key] === false) {
                            finallyreturn = false;
                            $('.errormessage').text(key.toString().toUpperCase() + " is invalid");
                            $("#" + key.toString()).css("border", "thin solid red");
                            $("#" + key.toString()).css("box-shadow", "1px 1px 10px red");
                            return false;
                        } else {
                            finallyreturn = true
                            $("#" + key.toString()).css("border", "thin solid green");
                            $("#" + key.toString()).css("box-shadow", "1px 1px 10px green");
                            $('.errormessage').text(key.toString().toUpperCase() + " valid");

                        }
                    }
                }
                return finallyreturn;
            }
            var six_digit_random_number;
//            $(document).ready(function () {
//                $(".numberverification").height($(".body").height());
//                $(".emailverification").height($(".body").height());
//                $('#mnumber').blur(function () {
//                    var contact = $('#mnumber').val();
//                    if (!filterPhone(contact)) {
//                        alert("Mobile number is invalid");
//                        $('#mnumber').focus();
//                    } else {
////                        $('.numberverification').slideDown(1000);
////                        $('.numberverification h3').append($(" - " + "#mnumber").val());
//                    }
//                });
//                $('#EmailID').blur(function () {
//                    var email = $("#EmailID").val();
//                    if (!validateEmail(String(email).toLocaleLowerCase())) {
//                        alert('not a valid e-mail address');
//                        $("#EmailID").focus();
//                    } else {
//                        if (!email == "") {
////                            var subject = "Email verification";
////                            var body = "Please verify your email address: OTP IS ";
////                            $('.emailverification').slideDown(1000);
////                            $('.emailverification h3').append(" - " + email);
////                            $('.emailverification h2').text(email + " : ");
////                            sentOtp(email, subject, body);
//                        }
//
//                    }
//
//
//                });
////                $('#otpcheck').click(function () {
////                    var userotp = $("#emailotptextbox").val();
////                    if (userotp == six_digit_random_number) {
////                        $("#otpstatus").text("Email ID verification is done");
////
////                        $('.emailverification').slideUp(2000, function () {
////                            $('.emailverification').remove();
////                            $('#submit').show();
////
////                        });
////                    } else {
////                        $("#otpstatus").text("Incorrect OTP");
////                    }
////                });
////            });
////            function sentOtp(to, subject, body) {
////                six_digit_random_number = Math.floor(Math.random() * 100000) + 999999;
////                $.post("controller/MailSendingController.php",
////                        {
////                            to: "" + to,
////                            subject: "" + subject,
////                            body: "" + body + " " + six_digit_random_number
////                        },
////                        function (data, status) {
////
//            });
//            }
        </script>
        <style type="text/css">
<?php include './css/Footer.css'; ?>
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
            .hidden3 {
                display: none;
            }
            .emsg4{
                color: red;
            }
            .hidden4 {
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
            #submit{
                /*display: none;*/
            }
            .errormessage{
                color:red;
            }
<?php include 'css/SignupForm_Employee.css'; ?>
        </style>

    </head>
    <body>
        <?php
        include './Common/Header.php';

        $data = $conn->query("select * from branches where id in(select branches_id from login_credentials where status=1 and bapproval=1 and mbapproval=1)");
        ?>
        <div class="container" >
            <div class="row">
                <div class="col-md-4 py-5 border border-dark " style="text-align: center; background: #ecf0f1; color: black; padding: 25px;">
                    <div class=" ">
                        <div class="card-body">
                            <img src="images/Employee.png" style="width:30%">
                            <h2 class="py-3"> Employee Registration</h2>
                            <p>Welcome To Keerti Job Portal.<br>New user..? Register now
                            </p>
                            <h2 class="py-3">Login Now</h2>
                            <p>Already registered..?<div class="flex-box">
                                <a href="Login_User.php">
                                    <button type="button" class="btn1 btn-info">Login</button>
                                </a>
                            </div>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 py-5  border border-dark">
                    <h4 class="pb-4">Please fill with your details <small class="errormessage"></small></h4>

                    <form method="POST" onsubmit="return validate(fields)" id="commentForm" action="controller/SignupFormController.php" enctype="multipart/form-data">
                        <div style="" class="row">
                            <div class="col-md-12">
                                <label>Select branch</label>
                                <select class="form-control" name="branches_id">
                                    <?php
                                    while ($row = $data->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input id="fname" name="fname" onblur="validate(fields)" minlength="2" placeholder="First Name" class="form-control" required type="text">
                                <span class="emsg1 hidden1">Please Enter a Valid Name</span>


                            </div>

                            <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" minlength="2" onblur="validate(fields)" class="form-control" name="lname" id="lname" placeholder="Last Name">
                                <span class="emsg2 hidden2">Please Enter a Valid Name</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date Of Birth</label>
                                <input id="dob" name="dob" placeholder="Birthday" class="form-control datepicker" type="text" required>
                            </div>
                            <!--                            <div class="form-group col-md-6">
                                                            <label>Current Address</label>
                                                            <input id="Current" name="caddress" placeholder="Current Address." class="form-control"  type="text" required="required">
                                                            <span class="emsg3 hidden3">Please Enter a Valid Address</span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Permanent Address</label>
                                                            <input id="Permanent Address." name="paddress" placeholder="Permanent Address" class="form-control"  type="text" required="required">
                                                            <span class="emsg4 hidden4">Please Enter a Valid Address</span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Pin code</label>
                                                            <input id="Pin code" name="pcode" placeholder="Pin code " class="form-control"  type="text" >
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city"> 
                                                            <select id="inputState" class="form-control" name="city">
                                                                <option selected>City ...</option>
                                                                <option> Kalyan</option>
                                                                <option> Dombivali</option>
                                                                <option> Thane</option>
                                                                <option> Ghatkopar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" name="state"> 
                            
                                                            <select id="inputState" class="form-control" name="state">
                                                                <option selected>State ...</option>
                                                                <option> Maharashtra</option>
                                                                <option> Madhya Pradesh</option>
                                                                <option> Kerala</option>
                                                                <option>Gujarat</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Country</label>
                                                            <input type="text" class="form-control" name="country"> 
                            
                                                            <select id="inputState" class="form-control" name="country">
                                                                <option selected>Country ...</option>
                                                                <option> India</option>
                                                                <option> Pakistan</option>
                                                                <option> Nepal</option>
                                                                <option>Bangladesh</option>
                                                            </select>
                                                        </div>-->
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input id="email" onblur="validate(fields)" name="email" placeholder="Email" class="form-control" required type="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mobile Number</label>
                                <input id="mobile" onblur="validate(fields)" name="mnumber" minlength="10" placeholder="Mobile Number" class="form-control" required  type="text">
                            </div>
                            <!--                            <div class="form-group col-md-6">
                                                            <label>Land Line Number</label>
                                                            <input id="lnumber" name="lnumber" placeholder="Line Number" class="form-control"  type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label> Gender &nbsp;</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="gender" value="male" checked>Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="gender" value="female">Female
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Martarial Status</label>
                                                            <select id="mstatus" class="form-control" name="mstatus">
                                                                <option selected>maratial status ...</option>
                                                                <option> Unmarried</option>
                                                                <option> Married</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Passport Number</label>
                                                            <input id="passportno" name="passportno" placeholder="Passport Number" class="form-control" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Passport Valid Date</label>
                                                            <input id="passportvalidtill" name="passportvalidtill" placeholder="Passport Valid Till" class="form-control" type="date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Work Permit For Other Country</label>
                                                            <input id="workpermitforothercountry" name="workpermitforothercountries" placeholder="Work Permit For Other Country" class="form-control" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Permitted Country Name</label>
                                                            <input id="permittedcountryname" name="permittedcountrynames" placeholder="Permitted Country Name" class="form-control" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Physical Challanged </label>
                                                            <input id="phychallanged" name="phychallenged" placeholder="Physical Challanged" class="form-control" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Physical Challanged Detail </label>
                                                            <input id="phychallangeddetail" name="phychallengeddetail" placeholder="Physical Challanged Detail" class="form-control" type="text">
                                                        </div>-->

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>User name</label>
                                    <input id="username" name="user_name" onblur="validate(fields)" placeholder="johndoe1234" class="form-control" type="text" required minlength="4">  
                                    <span class="username hidden1">Please Enter a Valid Name</span>


                                </div>

                                <div class="form-group col-md-6">
                                    <label>Password (Min Length 4,At least one uppercase,lowercase,digit,spacial character)</label>
                                    <input type="password" onblur="validate(fields)" class="form-control"  name="password" required id="password" placeholder="********">
                                    <span class="pass hidden2">Please Enter a Valid Name</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" onblur="validate(fields)"  name="password" required id="confirmpassword" placeholder="********">
                                    <span class="pass hidden2">Please Enter a Valid Name</span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Profile picture</label>
                                <Input type="file" class="btn3" name="dp">
                            </div>
                            <div class="form-row">
                                <div class="form-group ">
                                    <div class="form-group " >
                                        <div class="form-check">
                                            <!--<input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>-->
                                            <!--<small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>-->

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-row">
                                <Button type="submit" value="submit" id="submit" class="btn2 btn-info">Submit
                                </Button>
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




