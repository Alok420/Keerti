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
        <script>
            function approval(employerapproval, id, table) {
                $.post("../controller/approval.php",
                        {
                            id: "" + id,
                            employerapproval: "" + employerapproval,
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
<?php include './RootAdmin_page.css'; ?>
        </style>
        <style>
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
                box-shadow: 2px 2px #BE8D3D;
            }
            .row-title h4{
                margin:0px; 
                padding: 20px; 
                color: #003246;
                margin-top: 10px;
                text-shadow: 1px 1px lightgray;
                padding-bottom: 2px;
                /*text-align: center;*/
                font-weight: bold; 
                font-size: 20px; 
                letter-spacing: 1px; 
                text-transform: capitalize;
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
                    <h1 style="text-align: center; margin: 0px; font-size: 35px; font-weight: bold; padding: 15px; text-shadow: 2px 2px lightgray; text-transform: capitalize; letter-spacing: 2px;">Job requested by candidates</h1>
                    <div class="filter">
                        <h5 style="font-size: 20px; font-weight: bold; color: #BE8D3D; letter-spacing: 1px;">Filter: </h5>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?status=recent">Recent</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?status=aba">All branch approved</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?status=aea">All Recruiter approved</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">All</a>
                    </div>

                    <div class="row row-title" >
                        <div class="col-sm-3">
                            <h4 >Candidate</h4>
                        </div>
                        <div class="col-sm-3">
                            <h4>Company</h4>
                        </div>
                        <div class="col-sm-3">
                            <h4>Job</h4>
                        </div>
                        <div class="col-sm-3">
                            <h4>Approval</h4>
                        </div>
                    </div>
                    <?php
                    $sql = "select * from hiring where requestedBy='candidates'";
                    if (isset($_GET["status"])) {
                        if (!empty($_GET["status"])) {
                            $status = $_GET["status"];
                            if ($status == "recent") {
                                $sql = "select * from hiring where requestedBy='candidates' order by date_ desc";
                            } elseif ($status == "aba") {
                                $sql = "select * from hiring where requestedBy='candidates' and branchapproval=1";
                            } elseif ($status == "aea") {
                                $sql = "select * from hiring where requestedBy='candidates' and employerapproval=1";
                            }
                        }
                    }
                    $data = $conn->query($sql);
                    if (isset($_GET["status"])) {
                        $filterval = $_GET["status"];
                        $sql = "select * from appointment where appointment_status='$filterval' and hiring_id in(select id from hiring where employers_id=" . $_SESSION["loggedinid"] . ")";
                    }


                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="row listbox">
                            <div class="col-sm-3">
                                <?php
                                $cid = $one["candidates_id"];
                                $one1 = $db->select('candidates', '*', array("id" => $cid));
                                $one1a = $one1->fetch_assoc();
                                ?>
                                <div class="row">
                                    <a href="../resume.php?candidate=<?php echo $one1a["id"]; ?>"><img src="../images/profile/<?php echo $one1a["dp"]; ?>" height="150" width="150" class="img-responsive img-thumbnail"></a>
                           <!--<span style="font-size:2em; transform:scaleX(3);">&zigrarr;</span>-->
                                </div>
                                <div class="row column-text">

                                    <strong><?php echo $one1a["id"] . ":";
                            echo $one1a["fname"] . " " . $one1a["lname"];
                            ?> has requested to </strong>
                                    <BR> ON <?php echo $one["date_"]; ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                $cid = $one["employers_id"];
                                $one1 = $db->select('employers', '*', array("id" => $cid));
                                $one1a = $one1->fetch_assoc();
                                ?>
                                <div class="row">
                                    <!--<h4 style="margin:0px; padding: 10px; color: #003246; text-shadow: 1px 1px lightgray; font-weight: bold; font-size: 20px; letter-spacing: 1px; text-transform: uppercase;">Company</h4>-->
                                    <a href="../Companyprofile.php?id=<?php echo $one1a["id"]; ?>"><img src="../images/CompanyProfile/<?php echo $one1a["company_logo"]; ?>" height="150" width="150" class="img-responsive img-thumbnail"></a>
                                </div>
                                <div class="row column-text">
                                    <strong><?php echo $one1a["id"] . ":";
                            echo $one1a["Organization_Name"] . "<small> " . $one1a["Type_of_organization"] . "</small>";
                                ?></strong>
                                </div>
                            </div>
                            <div class="col-sm-3 job">
                                <?php
                                $jid = $one["jobpost_id"];
                                $onej = $db->select('jobpost', '*', array("id" => $jid));
                                $oneja = $onej->fetch_assoc();
                                ?>
                                <!--<h4 style="margin:0px; padding: 10px; color: #003246; text-shadow: 1px 1px lightgray; font-weight: bold; font-size: 20px; letter-spacing: 1px; text-transform: uppercase;">Job</h4>-->
                                <a href="../Jobdetail.php?id=<?php echo $oneja["id"]; ?>">  
                                    <div>For job id:<?php echo $oneja["id"]; ?></div>
                                    <div>Job name: <?php echo $oneja["job_title"]; ?></div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <!--<h4 style="margin:0px; padding: 10px; color: #003246; text-shadow: 1px 1px lightgray; font-weight: bold; font-size: 20px; letter-spacing: 1px; text-transform: uppercase;">Approval</h4>-->
                                <?php
                                echo $one["branchapproval"] == 0 ? "<button disabled id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $one['id'] . "\",\"hiring\")'>Branch Approvel</button>" : "<button id='approved' disabled onclick='approval(\"0\",\"" . $one['id'] . "\",\"hiring\")' class='btn btn-default'>Branch Approved</button>";
                                ?>
                                <br><br>
                                <?php
                                echo $one["employerapproval"] == 0 ? "<button disabled id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $one['id'] . "\",\"hiring\")'>Recruiter Approvel</button>" : "<button id='approved' class='btn btn-default' disabled onclick='approval(\"0\",\"" . $one['id'] . "\",\"hiring\")'>Recruiter Approved</button>";
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
