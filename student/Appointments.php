<!DOCTYPE html>
<?php
include './LoginCheck.php';
?> 
<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function approval(branchapproval, id, table) {
                $.post("../controller/approval.php",
                        {
                            id: "" + id,
                            candidates_approval: "" + branchapproval,
                            tablename: "" + table
                        },
                        function (data, status) {
                            if (status == "success") {
                                document.location.reload();
                            }
                        });
            }
        </script>
        <style>
<?php include './Student_page.css'; ?>
            .allbranchContainer{
                margin-top:-20px;
                
                /*border: thin solid red;*/
            }
            .allbranchContainer .row .col-sm-3 *{
                margin-top:0px;
            }
            .allbranchContainer .row h1{
                text-align: center;
            }
            
            .btn{
                margin: 5px;
            }
            .rowlist{
                box-shadow: 1px 1px 5px grey;
                margin-bottom: 10px;
                padding: 10px;
                margin-top:20px;
            }
            .listbox{
                /*border: thin solid #003246;*/
                margin-bottom: 20px;
                padding: 30px;
                box-shadow: 2px 2px gray!important;
            }
            .filter a{
                text-decoration:none;
                color: black;
                font-size: 18px;
                text-transform: capitalize;
                word-spacing: 2px;
                letter-spacing: 2px;
                box-shadow: 2px 2px #BE8D3D;
                font-family: sans-serif;
                padding: 10px;
            }
            .job a{
                text-decoration: none;
                font-size: 18px;
                color: black;
                text-shadow: 1px 1px lightgray;
                text-transform: capitalize;
            }
            .filter a:hover{
                text-decoration:none;
                color: #BE8D3D;
            }
            *{
                /*border: thin solid red;*/
            }
            .maincolumn{
                
            }
            .row-title{
                margin-top: 15px;
                box-shadow: 2px 2px #3d5c5c!important;
            }
            .row-title {
                margin:0px; 
                padding: 20px; 
                color: #003246!important;
                margin-top: 10px;
                text-shadow: 1px 1px lightgray;
                padding-bottom: 2px;
                /*text-align: center;*/
                font-weight: bold; 
                font-size: 15px!important; 
                letter-spacing: 1px; 
                text-transform: uppercase;
            }
            .btn{
                width:100%;
                word-wrap: break-word;
                word-break:break-all;
            }
            .col-sm-3{
                /*border-right: thin solid red;*/
                word-wrap: break-word;
                /*text-align: center;*/
                /*padding-left: 20px;*/
                padding-right: 20px;
            }
            .column-text{
                font-size: 15px;
                text-transform: capitalize;
                margin-top: 20px;
                letter-spacing: 1px;
            }
            .col-sm-2 a{
                text-decoration:none;
                color:black;
            }
            .col-sm-2 a:hover{
                text-decoration:none;
                color:black;
            }
            .rowlist a{
                text-decoration:none;
                color:black;
                font-size:20px;
                /*text-align:center;*/
                /*margin-left:20px;*/
                font-weight:bold;
                
            }
            .rowlist a:hover{
                text-decoration:none;
                color:black;
                font-size:18px;
                /*margin:10px;*/
            }
        </style>
    </head>
    <body>
        <?php include './Student_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './Student_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <h1 style="text-align: center; margin: 0px; font-size: 35px; font-weight: bold; padding: 15px; text-shadow: 2px 2px lightgray; text-transform: capitalize; letter-spacing: 2px;">All appointments</h1>
                    <div class="row row-title">
                        <div class="col-sm-3">Appointment fixed by</div>
                        <div class="col-sm-3">Extra message by recruiters</div>
                        <div class="col-sm-3">Date and time</div>

                        <div class="col-sm-3">Accept/Decline</div>
                    </div>
                    <?php
                    $loggedinid = $_SESSION["loggedinid"];
                    $sql = "select * from appointment where hiring_id in (select id from hiring where candidates_id=$loggedinid)";
                    $data = $conn->query($sql);
                    while ($app = $data->fetch_assoc()) {

                        $hiring = $db->select("hiring", "*", array("id" => $app["hiring_id"]));
                        $hire = $hiring->fetch_assoc();

                        $employers = $db->select("employers", "*", array("id" => $hire["employers_id"]));
                        $emp = $employers->fetch_assoc();

                        $jobs = $db->select("jobpost", "*", array("id" => $hire["jobpost_id"]));
                        $job = $jobs->fetch_assoc();
                        ?>
                        <div class="row rowlist">
                            <div class="col-sm-3">
                                <a href="../Companyprofile.php?id=<?php echo $emp["id"]; ?>"><img src="../images/CompanyProfile/<?php echo $emp["company_logo"]; ?>" height="150" width="150" class="img-thumbnail img-responsive">
                                    <div class="column-text">
                                        <?php echo $emp["Organization_Name"]; ?>
                                    </div>
                                </a> 
                            </div>
                            <div class="col-sm-3">
                                <p><strong>Message by company:</strong> <?php echo $app["description"]; ?></p>
                            </div>
                            <div class="col-sm-3">
                                <strong>Date: </strong><?php echo $app["candidates_appointment_date"]; ?><br>
                                <strong>Time: </strong><?php echo $app["candidates_appointment_time"]; ?><br>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                echo $app["candidates_approval"] == 0 ? "<button id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $app["id"] . "\",\"appointment\")'>Accept</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $app['id'] . "\",\"appointment\")' class='btn btn-default'>Accepted</button>";
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
