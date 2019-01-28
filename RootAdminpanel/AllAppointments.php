<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include './LoginCheck.php';
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        $db = new DB($conn);
        $allbranches = $db->select("branches");
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function deletedata(id, table) {
                $.post("../controller/DeleteController.php",
                        {
                            id: "" + id,
                            table_name: "" + table
                        },
                        function (data, status) {
                            if (status == "success") {
                                alert(data);
                                document.location.reload();
                            }
                        });
            }

        </script>
        <script>
            function feedback() {
                var reason = $("#reason").val();
                var description = $("#description").val();
                var appointment_id = $('#sendfeedbackbtn').val();
                $.post("../controller/Insert_Feedback.php",
                        {
                            appointment_id: "" + appointment_id,
                            reason: "" + reason,
                            description: "" + description
                        },
                        function (data, status) {
                            alert("Feedback sent");
                            document.location.reload();
                        });
            }
            function statusChange(id, table, status) {
                var id2 = id.value;
                $('#sendfeedbackbtn').val(id2);
                $.post("../controller/approval.php",
                        {
                            id: "" + id2,
                            appointment_status: "" + status,
                            tablename: "" + table

                        },
                        function (data, status) {
                            if (status == "success") {
                                alert("Status updated");
                                $("[value=" + id2 + "]").removeClass("btn-success");
                                $(id).addClass("btn-success");
                            }
                        });
            }
        </script>
        <style>
<?php include './RootAdmin_page.css'; ?>
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
            
            .cardsforbranch{
                min-width: 100px;
                min-height: 100px;
                background-color: #05728f;
                color: white;
                float: left;
                margin-left: 20px;
            }
            .branchstnumber{
                text-align: center;
                font-size: 35px;
                color:yellowgreen;
                top: 0px;
                margin: 2px;
                padding: 2px;
            }
            .branchname{
                text-align: center;
                position: absolute;
                font-size: 25px;
                color:yellowgreen;
                bottom: 0px;
                margin: 2px;
                padding: 2px;       
            }
            .btn{
                margin: 5px;
            }
            .rowlist{
                box-shadow: 1px 1px 10px grey;
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
                box-shadow: 2px 2px #BE8D3D!important;
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
                padding-left: 20px;
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
        </style>
    </head>
    <body>
        <?php include './RootAdmin_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './RootAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <h1  style="text-align: center; margin: 0px; font-size: 35px; font-weight: bold; padding: 15px; text-shadow: 2px 2px lightgray; text-transform: capitalize; letter-spacing: 2px;">All appointments</h1>
                    <div class="filter">
                        <h5 style="font-size: 20px; font-weight: bold; color: #BE8D3D; letter-spacing: 1px;">Filter: </h5>
                        <a href="AllAppointments.php?status=selected">Hired only</a>
                        <a href="AllAppointments.php?status=rejected">Rejected only</a>
                        <a href="AllAppointments.php?status=Candidate canceled">Candidate canceled</a>
                        <a href="AllAppointments.php?status=Recruiter canceled">Recruiter canceled</a>
                        <a href="AllAppointments.php">All</a>
                    </div>
                    <div class="row row-title">
                        <div class="col-sm-2">Candidates</div>
                        <div class="col-sm-2">Company message</div>
                        <div class="col-sm-2">Appointment time</div>
                        <div class="col-sm-3">Operation</div>
                        <div class="col-sm-3">Update Status</div>

                    </div>
                    <?php
                    $sql = "select * from appointment";
                    if (isset($_GET["status"])) {
                        $filterval = $_GET["status"];
                        $sql = "select * from appointment where appointment_status='$filterval'";
                    }
                    $data = $conn->query($sql);
                    while ($app = $data->fetch_assoc()) {
                        $hiring = $db->select("hiring", "*", array("id" => $app["hiring_id"]));
                        $hire = $hiring->fetch_assoc();

                        $candidates = $db->select("candidates", "*", array("id" => $hire["candidates_id"]));
                        $candi = $candidates->fetch_assoc();

                        $jobs = $db->select("jobpost", "*", array("id" => $hire["jobpost_id"]));
                        $job = $jobs->fetch_assoc();
                        ?>
                        <div class="row rowlist">
                            <div class="col-sm-2">
                                <a href="../resume.php?candidate=<?php echo $candi["id"]; ?>"><img src="../images/profile/<?php echo $candi["dp"]; ?>" height="150" width="150" class="img-thumbnail img-responsive">
                                    <div class="column-text">
                                        <?php echo $candi["fname"]; ?> <?php echo $candi["lname"]; ?>
                                    </div>
                                    <div><a href="AllFeedback.php"><button class="btn btn-default">Feedback</button></a></div>
                                </a> 
                            </div>
                            <div class="col-sm-2">
                                <p><strong>Message by company:</strong> <?php echo $app["description"]; ?></p>
                            </div>
                            <div class="col-sm-2">
                                <strong>Date: </strong><?php echo $app["candidates_appointment_date"]; ?><br>
                                <strong>Time: </strong><?php echo $app["candidates_appointment_time"]; ?><br>
                            </div>

                            <div class="col-sm-3">
                                <?php
                                echo $app["candidates_approval"] == 0 ? "<button disabled id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $app["id"] . "\",\"appointment\")'>Not yet Accepted by candidate</button>" : "<button disabled id='approved' onclick='approval(\"0\",\"" . $app['id'] . "\",\"appointment\")' class='btn btn-default'>Accepted by candidate</button>";
                                ?>
                                <div><a href="update.php?id=<?php echo $app["id"]; ?>&table_name=appointment&column=id,appontment_creating_date,candidates_appointment_date,candidates_appointment_time,hiring_id,description"><button class="btn btn-warning">Update</button></a></div>
                                <div><button class="btn btn-danger" onclick="deletedata('<?php echo $app['id']; ?>', 'appointment')">Delete</button></div>

                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn <?php echo $app["appointment_status"] == "selected" ? "btn-success" : "btn-default"; ?>" onclick="statusChange(this, 'appointment', 'selected')" value="<?php echo $app["id"]; ?>" value="selected">Candidate selected</button>
                                <button type="button" class="btn <?php echo $app["appointment_status"] == "rejected" ? "btn-success" : "btn-default"; ?>" onclick="statusChange(this, 'appointment', 'rejected')" value="<?php echo $app["id"]; ?>" class="btn btn-info btn-lg" data-toggle="modal" data-target="#rejection">Candidate Rejected</button>
                                <button type="button" class="btn <?php echo $app["appointment_status"] == "Candidate canceled" ? "btn-success" : "btn-default"; ?>" onclick="statusChange(this, 'appointment', 'Candidate canceled')" value="<?php echo $app["id"]; ?>" value="candidate_canceled">Candidate canceled <br>/ Not came</button>
                                <button type="button" class="btn <?php echo $app["appointment_status"] == "Recruiter canceled" ? "btn-success" : "btn-default"; ?>" onclick="statusChange(this, 'appointment', 'Recruiter canceled')" value="<?php echo $app["id"]; ?>" value="recruiter_rejected">Recruiter canceled </button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="rejection" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Reason of rejection</h4>
                                </div>
                                <div class="modal-body">
                                    <label>Reason to reject</label>
                                    <select class="form-control" name="reason" id="reason">
                                        <option>Not professional</option>
                                        <option>Less experience</option>
                                        <option>Skill not matched</option>
                                        <option>Communication</option>
                                        <option>Other (Mention detail below)</option>
                                    </select>
                                    <label>Description</label>
                                    <textarea class="form-control" id="description"></textarea>
                                    <button type="button" id="sendfeedbackbtn" onclick="feedback(this)" class="btn btn-success">Send feedback</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> 
</html>
