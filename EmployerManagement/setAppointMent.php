<!DOCTYPE html>
<?php
include './LoginCheck.php';
?> 
<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/DB.php';
        include '../Config/ConnectionObjectOriented.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <style>
<?php include './recruiter_page.css'; ?>
            .main-column-form {
                padding: 20px 20px!important;
   
            }
            #jobpostingform h2{
                text-align:center;
                font-size:35px;
                letter-spacing:2px;
                padding:10px;
                font-family: sans-serif;
                font-weight: bold;
                text-transform:capitalize;
            }
            #jobpostingform label{
                font-size: 15px;
                letter-spacing: 2px;
                font-family: sans-serif;
                
            }
            #jobpostingform .form-control{
                border:none;
                border-bottom: thin solid black;
                border-radius: 0px;
                background-color: transparent;
                font-size: 15px;
                box-shadow: none;
                letter-spacing: 2px;
            }
            #jobpostingform .form-control:hover{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            #jobpostingform .form-control:active{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            #jobpostingform .form-control:focus{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            #jobpostingform .form-control:visited{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            #jobpostingform textarea{
                resize:none;
            }
        </style>
    </head>
    <body>

        <?php include './recruiter_page_header.php'; ?>
        <?php
        $id = $_SESSION["loggedinid"];
        $type = $_SESSION["loggedintype"];
        ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './recruiter_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <div class="container">
                        <div id="jobpostingform">
                            <h2 style="text-align:center;">Set appointment form</h2>
                            <hr>
                            <form action="../controller/setAppointment.php" method="POST">
                                <input type="hidden" name="candidates_approval" value="0">
                                <?php
                                date_default_timezone_set("Asia/Calcutta");
                                $date = date("Y-m-d h:i:sa");
                                ?>
                                <input type="hidden" name="appontment_creating_date" value="<?php echo $date; ?>">

                                <div class="form-group">
                                    <label for="job_title">All candidates approved by branch and company</label>
                                    <select name="hiring_id" class="form-control">
                                        <?php
                                        $db = new DB($conn);
                                        $sql = "select * from hiring where employers_id=$id and branchapproval=1 and employerapproval=1";
                                        $hirelist = $conn->query($sql);

                                        while ($hire = $hirelist->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $hire["id"]; ?>">
                                                <?php
                                                $candidates = $db->select("candidates", "*", array("id" => $hire["candidates_id"]));
                                                $candidate = $candidates->fetch_assoc();
                                                echo $candidate["fname"] . " " . $candidate["lname"];
                                                ?>
                                            </option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="experiencerequired">Appointment Date:</label>
                                    <input type="date" class="form-control" id="experiencerequired" placeholder="Enter Experience Required" name="candidates_appointment_date">
                                </div>
                                <div class="form-group">
                                    <label for="experiencerequired">Appointment time:</label>
                                    <input type="time" class="form-control" id="experiencerequired" placeholder="Enter Experience Required" name="candidates_appointment_time">
                                </div>
                                <div class="form-group">
                                    <label for="jobdescription">Description:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-lg btn-default">Submit</button>
                                <div><?php
                                    if (isset($_GET["info"])) {
                                        echo $_GET["info"] == 1 ? "Add more appointment" : " Not added try again or contact to developer";
                                    }
                                    ?></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
