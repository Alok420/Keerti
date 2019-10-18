<?php session_start();?>
<?php include './LoginCheck.php';?> 	
<!DOCTYPE html>

<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            .maincolumn .row{
                
            }
            .card{
                width:100%;
                height: 200px;
                background-color:transparent;
                color: black;
                float: left;
                box-shadow: 2px 2px #3d5c5c, -1px -1px #3d5c5c!important;
                /*margin-left: 20px;*/
                margin-top:15px!important;
                padding: 10px;
                text-align:center;
                font-weight:bold;
                font-size:20px;
                transition: 0.2s ease-in-out;
            }
            .card:hover{
                transform: scale(1.1);
            }
            
            .totalbranch{
                text-align: center;
                position: relative;
                font-size: 22px;
                text-transform:capitalize;
                color:black;
                bottom: 0px;
                margin: 2px;
                padding: 2px;
                
            }
            form{
                font-size:18px;
                font-weight:bold;
                text-transform:capitalize;
            }
            .bttn{
                /*margin: 0px auto!important;*/
                margin-left: 10px;
            }
            .allbranchContainer a{
                text-decoration:none;
                text-align:center;
                color:black;
            }
            .allbranchContainer a:hover{
                text-decoration:none;
                text-align:center;
                color:black;
            }
            .card-btn-root a{
                color: white!important;
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
                    <h1 style="text-align: center; margin: 15px; text-shadow: 2px 2px lightgray; padding:10px;">Dashboard</h1> 


                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card branchcard">
                                <a href="../Employer_page.php"><div class="rootdashboard">
                                        <h3><?php
                                            $data = $db->select("employers", "count(id) as allnum");
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            echo $num;
                                            ?></h3>
                                        <div class="totalbranch">Total Companies</div>
                                        <div class="rooticon"><i class="fa fa-building-o"></i></span></div>
                                        <!--                                    <div class="btn-card-root">
                                                                                <div class="btn btn-default card-btn-root"><a href="../Employee_page.php">Read More</a></div>
                                                                            </div>-->
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card branchcard">
                                <a href="Appointments.php"><div class="rootdashboard">
                                        <h3><?php
                                            $query = "select count(id) as allnum from appointment where hiring_id in (select id from hiring where candidates_id=" . $_SESSION['loggedinid'] . ")";
                                            $data = $conn->query($query);
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            echo $num;
                                            ?></h3>
                                        <div class="totalbranch">Total Appointments</div>
                                        <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
                                        <!--                                    <div class="btn-card-root">                                                                                <div class="btn btn-default card-btn-root"><a href="Appointments.php">Read More</a></div>
     </div>-->
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card branchcard" >
                                <a href="AllJobRequest.php"><div class="rootdashboard">
                                        <h3><?php
                                            $query = "select count(id) as allnum from hiring where candidates_id=" . $_SESSION['loggedinid'];

                                            $data = $conn->query($query);
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            echo $num;
                                            ?></h3>
                                        <div class="totalbranch">Total JOB request</div>
                                        <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
                                        <!--                                    <div class="btn-card-root">
                                                                                <div class="btn btn-default card-btn-root"><a href="AllJobRequest.php">Job request</a></div>
                                                                            </div>-->
                                    </div></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
