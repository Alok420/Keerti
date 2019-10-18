<?php session_start();?>
<!DOCTYPE html>
<?php include '../LoginCheck.php'; ?>
<?php include '../../Config/ConnectionObjectOriented.php'; ?>
<?php
include '../../Config/DB.php';
$db = new DB($conn);
?>

<html>
    <head>
        <?php
        include '../../Common/CDN.php';
        ?>
        <link href="updateform.css" rel="stylesheet" type="text/css"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function (){
            $('#education').click(function(){
            $('.slide1').append('<div class="formcontainer"><form class="form-horizontal" action="../../controller/Student/EducationUpdate.php">                    <div class="form-group">                        <label class="control-label col-sm-5" for="basicqualification">Basic Qualification:</label>                        <div class="col-sm-7">                            <input type="text" class="form-control" id="basicqualification" placeholder="Enter Basic Qualification" name="basic_qualification">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="time">Full Time/ Part Time:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="fulltime/parttime" placeholder="Enter Fulltime/Parttime" name="fulltime/parttime">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="specialization">Specialization:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="specialization" placeholder="Enter specialization" name="specialization">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="university/board/institute">University/Board:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="university/board/institute" placeholder="Enter university/board/institute" name="university/board/institute">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="yearofpassing">Year Of Passing:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="yearofpassing" placeholder="Enter Year Of passing" name="year_of_passing">                        </div>                    </div>                    <input type="hidden" name="tbname" value="education">                    <div class="form-group">                                <div class="col-sm-offset-5 col-sm-7">                            <button type="submit" class="btn btn-default">Submit</button>                        </div>                    </div>                </form></div>'); });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="slide1">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("id" => $loggedinid);
                $data = $db->select("candidates", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php" enctype="multipart/form-data">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>First Name</label>
                                        <input id="Name" value="<?php echo $one["fname"]; ?>" name="fname" placeholder="First Name" class="form-control" type="text">
                                        <!--<span class="emsg1 hidden1">Please Enter a Valid Name</span>-->


                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Last Name</label>
                                        <input value="<?php echo $one["lname"]; ?>" type="text" class="form-control" name="lname" id="inputEmail4" placeholder="Last Name">
                                        <!--<span class="emsg2 hidden2">Please Enter a Valid Name</span>-->
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input id="EmailID" value="<?php echo $one["email"]; ?>" name="email" placeholder="Email" class="form-control"  type="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile Number</label>
                                    <input id="mnumber" name="mnumber" value="<?php echo $one["mnumber"]; ?>" placeholder="Mobile Number" class="form-control"  type="text">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Date Of Birth</label>
                                        <input id="Date" value="<?php echo $one["dob"]; ?>"  name="dob" placeholder="Birthday" class="form-control" type="date" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Current Address</label>
                                        <input id="Current" value="<?php echo $one["caddress"]; ?>" name="caddress" placeholder="Current Address." class="form-control"  type="text" required="required">
                                        <!--<span class="emsg3 hidden3">Please Enter a Valid Address</span>-->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Permanent Address</label>
                                        <input value="<?php echo $one["paddress"]; ?>" id="Permanent Address." name="paddress" placeholder="Permanent Address" class="form-control"  type="text" required="required">
                                        <!--<span class="emsg4 hidden4">Please Enter a Valid Address</span>-->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pin code</label>
                                        <input id="Pincode" value="<?php echo $one["pcode"]; ?>" name="pcode" placeholder="Pin code " class="form-control"  type="text" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input value="<?php echo $one["city"]; ?>" type="text" class="form-control" name="city"> 
            <!--                                <select id="inputState" class="form-control" name="city">
                                            <option selected>City ...</option>
                                            <option> Kalyan</option>
                                            <option> Dombivali</option>
                                            <option> Thane</option>
                                            <option> Ghatkopar</option>
                                        </select>-->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>State</label>
                                        <input value="<?php echo $one["state"]; ?>" type="text" class="form-control" name="state"> 

                                                                                                                        <!--                                <select id="inputState" class="form-control" name="state">
                                                                                                                                                            <option selected>State ...</option>
                                                                                                                                                            <option> Maharashtra</option>
                                                                                                                                                            <option> Madhya Pradesh</option>
                                                                                                                                                            <option> Kerala</option>
                                                                                                                                                            <option>Gujarat</option>
                                                                                                                                                        </select>-->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input value="<?php echo $one["country"]; ?>" type="text" class="form-control" name="country"> 

                                                                                                                                                        <!--   <select id="inputState" class="form-control" name="country">
                                                                                                                                                            <option selected>Country ...</option>
                                                                                                                                                            <option> India</option>
                                                                                                                                                            <option> Pakistan</option>
                                                                                                                                                            <option> Nepal</option>
                                                                                                                                                            <option>Bangladesh</option>
                                                                                                                                                        </select>-->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Land Line Number</label>
                                        <input id="lnumber" value="<?php echo $one["lnumber"]; ?>" name="lnumber" placeholder="Line Number" class="form-control"  type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> Gender &nbsp;</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" <?php echo $one["gender"] == "male" ? "checked" : ""; ?> value="male" checked>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" <?php echo $one["gender"] == "female" ? "checked" : ""; ?> value="female">Female
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Marital Status</label>
                                        <select id="mstatus" class="form-control" name="mstatus">
                                            <option selected value="<?php echo $one["mstatus"]; ?>"><?php echo $one["mstatus"] == 0 ? "single" : "Married"; ?></option>
                                            <option value="single"> Single</option>
                                            <option value="married"> Married</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Passport Number</label>
                                        <input id="passportno" value="<?php echo $one["passportno"]; ?>" name="passportno" placeholder="Passport Number" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Passport Valid Date</label>
                                        <input value="<?php echo $one["passportvalidtill"]; ?>" id="passportvalidtill" name="passportvalidtill" placeholder="Passport Valid Till" class="form-control" type="date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Work Permit For Other Country</label>
                                        <select value="<?php echo $one["workpermitforothercountries"]; ?>" id="workpermitforothercountry" name="workpermitforothercountries" placeholder="Work Permit For Other Country" class="form-control" type="text">
                                            <option value="<?= $one["workpermitforothercountries"]; ?>" selected><?php echo $one["workpermitforothercountries"] == 1 ? "yes" : "No";
                ;
                        ?></option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Permitted Country Name</label>
                                        <input id="permittedcountryname" value="<?php echo $one["permittedcountrynames"]; ?>" name="permittedcountrynames" placeholder="Permitted Country Name" class="form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Physical Challanged </label>
                                        <select id="phychallanged" name="phychallenged" placeholder="Physical Challanged" class="form-control" >
                                            <option value="<?= $one["phychallenged"]; ?>" selected><?php echo $one["phychallenged"] == 1 ? "yes" : "No";
                                        ;
                                        ?></option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Physical Challanged Detail </label>
                                        <input id="phychallangeddetail" value="<?php echo $one["phychallengeddetail"]; ?>"  name="phychallengeddetail" placeholder="Physical Challanged Detail" class="form-control" type="text">
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label>Profile picture</label>
                                        <Input type="file" class="btn3" name="dp">
                                        <img src="../../images/profile/<?php echo $one["dp"]; ?>" height="100" width="100">
                                    </div>
                                    <input type="hidden" name="tbname" value="candidates">
                                    <div class="form-group">        
                                        <div class="col-sm-offset-5 col-sm-7">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>

                                    <!--<button type="button" style="position: fixed; background: green; color: WHITE; font-size: 20px; border-radius: 20PX; padding: 5PX; top: 50%; right: 0px; " id="education">Add more education fields</button>-->
                            </form>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    $where = array("candidates_id" => $loggedinid);
                    $data = $db->select("login_credentials", "*", $where);
                    if ($data->num_rows > 0) {
                        while ($one = $data->fetch_assoc()) {
                            ?>
                            <form method="POST" action="../../controller/Student/UpdateUsernamePassword.php">
                                <div class="form-row">
                                    <input type="hidden" value="<?php echo $one['id']; ?>" name="id">
                                    <input type="hidden" value="login_credentials" name="tbname">
                                    <div class="form-group col-md-6">
                                        <label>User name</label>
                                        <input id="username" value="<?php echo $one["user_name"]; ?>" name="user_name" placeholder="johndoe1234" class="form-control" type="text">
                                        <!--<span class="username hidden1">Please Enter a Valid Name</span>-->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="********">
                                        <!--<span class="pass hidden2">Please Enter a Valid Name</span>-->
                                    </div>
                                </div>
                                <input type="hidden" name="tbname" value="login_credentials">
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <br>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div> 
        </div>
    </body>
</html>