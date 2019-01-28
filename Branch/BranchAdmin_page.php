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
<?php include './BranchAdmin_page.css'; ?>
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
                min-width: 200px;
                min-height: 150px;
                /*background-color: #05728f;*/
                /*color: black;*/
                float: left;
                box-shadow: 2px 2px #009999, -1px -1px #009999!important;
                margin-left: 20px;
                margin-top:15px!important;
                padding: 10px;
            }
            .branchstnumber{
                text-align: center;
                font-size: 20px;
                color:yellowgreen;
                top: 0px;
                margin: 2px;
                padding: 2px;
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
        <?php include './BranchAdmin_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './BranchAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <h1>Dashboard</h1> 

                    <form class="form-inline branch-form" action="Report.php">
                        <label>Start date</label>
                        <input type="date" class="form-control form-inline" name="sdate">
                        <label>End date</label>
                        <input type="date" class="form-control form-inline" name="edate">
                        <button class="btn btn-default" type="submit" style="background-color: #002433;color: white; font-size: 18px; font-weight: bold; text-transform: capitalize;">Generate report</button>
                    </form>


                    <div class="row ">

                        <div class="col-sm-6 col-lg-3 col-md-6">
                            <div class="card branchcard">
                                <a href="AllCandidates.php"><div class="rootdashboard">
                                        <h3>
                                            <?php
                                            $data = $db->select("candidates", "count(id) as allnum", array("branches_id" => $_SESSION["loggedinid"]));
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            ?></h3>
                                        <div class="totalbranch">All registered candidates : <?php echo $num; ?></div>
                                        <div class="rooticon"><i class="fa fa-users"></i></div>
                                        <!--                                    <div class="btn-card-root">
                                                                                <div class="btn btn-default card-btn-root"></div>
                                                                            </div>-->
                                    </div></a>
                            </div> 
                        </div>
                        <div class="col-sm-6 col-lg-3 col-md-6">
                            <div class="card branchcard">
                                <a href="AllEmployers.php"><div class="rootdashboard">
                                        <h3><?php
                                            $data = $db->select("employers", "count(id) as allnum");
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            echo $num;
                                            ?></h3>
                                        <div class="totalbranch">Total Companies</div>
                                        <div class="rooticon"><i class="fa fa-building-o"></i></span></div>
                                        <!--                                    <div class="btn-card-root">
                                                                                <div class="btn btn-default card-btn-root"><a href="Allemployers.php">Read More</a></div>
                                                                            </div>-->
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-md-6">
                            <div class="card branchcard">
                                <a href="AllAppointments.php"><div class="rootdashboard">
                                        <h3>
                                            <?php
                                            $query = "select count(id) as allnum from appointment where hiring_id in(select id from hiring where candidates_id in (select id from candidates where branches_id=" . $_SESSION['loggedinid'] . "))";
                                            $data = $conn->query($query);
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            echo $num;
                                            ?>
                                        </h3>
                                        <div class="totalbranch">Total Appointments</div>
                                        <div class="rooticon">
                                            <span class="glyphicon glyphicon-home"></span>
                                        </div>
                                        <!--                                    <div class="btn-card-root">
                                                                                <div class="btn btn-default card-btn-root"><a href="AllAppointments.php">Read More</a></div>
                                                                            </div>-->
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-md-6">
                            <div class="card branchcard" >
                                <div class="rootdashboard">
                                    <h3><?php
                                        $query = "select count(id) as allnum from hiring where candidates_id in(select id from candidates where branches_id=" . $_SESSION['loggedinid'] . ")";
                                        $data = $conn->query($query);
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total JOB request</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
                                    <div class="btn-card-root" >
                                        <div class="btn btn-default card-btn-root" style="color:white!important;" ><a href="Job_Request_by_recruiters.php">By companies</a></div><br>
                                        <div class="btn btn-default card-btn-root" style="color:white!important;"><a href="Job_Request_by_candidates.php">By candidates</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <a href="AllJobs.php"> <div class="card" >
                                    <div class="rootdashboard">
                                        <h3><?php
                                            $data = $db->select("jobpost", "count(id) as allnum");
                                            $one = $data->fetch_assoc();
                                            $num = $one["allnum"];
                                            echo $num;
                                            ?></h3>
                                        <div class="totalbranch">Total JOB posted</div>
                                        <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
                                        <div class="btn-card-root">
                                            <div class="btn btn-default card-btn-root">Read more</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> 

                </div>
            </div>
        </div>
    </body>
</html>
