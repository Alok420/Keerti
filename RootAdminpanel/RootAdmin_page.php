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
<?php include './RootAdmin_page.css'; ?>
<?php include './final_rootadmin_page.css'; ?>
        </style>
    </head>
    <body>
        <?php include './RootAdmin_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './RootAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn maincolum-1">
                    <h1>Dashboard</h1> 

                    <form class="form-inline form-inline-root" action="Report.php">
                        <label>Start date</label>
                        <input type="date" class="form-control form-inline" name="sdate">
                        <label>End date</label>
                        <input type="date" class="form-control form-inline" name="edate">
                        <button class="btn btn-default submitbtn-root" type="submit" style= "color: black; font-weight: bold; box-shadow: 2px 2px lightgray; background-color: #995805">Generate report</button>
                    </form>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <a href="All_Branches.php"><div class="rootdashboard rootdashboard-new">
                                    <h3><?php
                                        $data = $db->select("branches", "count(id) as allnum");
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total Branches</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read More</div>
                                    </div>-->
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <a href="AllStudents.php"><div class="rootdashboard">
                                    <h3><?php
                                        $data = $db->select("candidates", "count(id) as allnum");
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">All registered candidates</div>
                                    <div class="rooticon"><i class="fa fa-users"></i></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read More</div>
                                    </div>-->
                                    </div></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                               <a href="Allemployers.php"> <div class="rootdashboard">
                                    <h3><?php
                                        $data = $db->select("employers", "count(id) as allnum");
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total Companies</div>
                                    <div class="rooticon"><i class="fa fa-building-o"></i></span></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read More</div>
                                    </div>-->
                                   </div></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <a href="AllAppointments.php"><div class="rootdashboard">
                                    <h3><?php
                                        $data = $db->select("appointment", "count(id) as allnum");
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total Appointments</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read More</div>
                                    </div>-->
                                </div></a>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="card" >
                                <div class="rootdashboard">
                                    <h3><?php
                                        $data = $db->select("hiring", "count(id) as allnum");
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total JOB request</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
                                    <div class="btn-card-root" style="left: 0px;">
                                        <div class="btn btn-default card-btn-root"><a href="Job_Request_by_recruiters.php">By companies</a></div>
                                        <div class="btn btn-default card-btn-root"><a href="Job_Request_by_candidates.php">By candidates</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card" >
                                <a href="AllJobs.php"><div class="rootdashboard">
                                    <h3><?php
                                        $data = $db->select("jobpost", "count(id) as allnum");
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total JOB posted</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read more</div>
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
