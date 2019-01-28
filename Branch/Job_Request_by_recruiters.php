<!DOCTYPE html>

<html>
    <head>
        <?php
        include './LoginCheck.php';
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        $loggedinid = $_SESSION["loggedinid"];
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function approval(branchapproval, id, table) {
                $.post("../controller/approval.php",
                        {
                            id: "" + id,
                            branchapproval: "" + branchapproval,
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
<?php include './BranchAdmin_page.css'; ?>
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
                box-shadow: 2px 2px #009999;
                font-family: sans-serif;
                padding: 10px;
            }
            
            .filter a:hover{
                text-decoration:none;
                color: #009999;
            }
            *{
                /*border: thin solid red;*/
            }
            .maincolumn{
                
            }
            .row-title{
                margin-top: 15px;
                box-shadow: 2px 2px #009999;
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
            text-transform: uppercase;
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
            .job a{
                text-decoration: none;
                color:black;
                font-size: 20px;
                text-transform:capitalize;
                /*font-weight: bold;*/
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
                    <h1 style="text-align: center; margin: 0px; font-size: 35px; font-weight: bold; padding: 15px; text-shadow: 2px 2px lightgray; text-transform: capitalize; letter-spacing: 2px;">Job requested by recruiters</h1>
                     <div class="filter">
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?branchapproval=1">All approved</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?branchapproval=0">All Not approved</a>
                    </div>
                    <div class="row row-title" >
                        <div class="col-sm-3">
                            <h4 >Branch</h4>
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
                    $sql = "select * from hiring where requestedBy='employers'";
                    if (isset($_GET["branchapproval"])) {
                        $employerapproval = $_GET["branchapproval"];
                        $sql = "select * from hiring where requestedBy='employers' and branchapproval=" . $_GET['branchapproval'];
                    }
                    $datalist = $conn->query("$sql");
                    echo '<h2>Total Record: ' . $datalist->num_rows . '</h2>';
                    while ($one = $datalist->fetch_assoc()) {
                        ?>
                        <div class="row listbox">
                            <div class="col-sm-3">
                                <?php
                                $eid = $one["employers_id"];
                                $empdata = $db->select('employers', '*', array("id" => $eid));
                                $emp = $empdata->fetch_assoc();
                                ?>
                                <div class="row">
                                    <a href="../Companyprofile.php?id=<?php echo $emp["id"]; ?>"><img src="../images/CompanyProfile/<?php echo $emp["company_logo"]; ?>" height="150" width="150"  class="img-responsive img-thumbnail"></a>
                                    <!--<span style="font-size:2em; transform:scaleX(3);">&zigrarr;</span>-->
                                </div>
                                <div class="row column-text">
                                    <strong><?php echo $emp["Organization_Name"] . " " . $emp["Type_of_organization"]; ?> has requested to </strong>
                                    <BR> ON <?php echo $one["date_"]; ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                $cid = $one["candidates_id"];
                                $one1 = $db->select('candidates', '*', array("id" => $cid));
                                $one1a = $one1->fetch_assoc();
                                ?>
                                <div class="row">
                                    <a href="../resume.php?candidate=<?php echo $one1a["id"]; ?>"><img src="../images/profile/<?php echo $one1a["dp"]; ?>" height="150" width="150"  class="img-responsive img-thumbnail"></a>
                                </div>
                                <div class="row">
                                    <strong><?php echo $one1a["fname"] . " " . $one1a["lname"] . "</small>"; ?></strong>
                                </div>
                            </div>
                            <div class="col-sm-3 job">
                                <?php
                                $jid = $one["jobpost_id"];
                                $onej = $db->select('jobpost', '*', array("id" => $jid));
                                $oneja = $onej->fetch_assoc();
                                ?>
                                <a href="../Jobdetail.php?id=<?php echo $oneja["id"]; ?>">  
                                    <div>For job id:<?php echo $oneja["id"] > 0 ? $oneja["id"] : "No job selected"; ?></div>
                                    <div>Job name: <?php echo $oneja["job_title"]; ?></div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                echo $one["branchapproval"] == 0 ? "<button id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $one['id'] . "\",\"hiring\")'>Branch Approvel</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $one['id'] . "\",\"hiring\")' class='btn btn-default'>Branch Approved</button>";
                                ?>
                                <br><br>
                                <?php
                                echo $one["employerapproval"] == 0 ? "<button id='approve' class='btn btn-success' disabled onclick='approval(\"1\",\"" . $one['id'] . "\",\"hiring\")'>Employer Approvel</button>" : "<button id='approved' class='btn btn-default' disabled  onclick='approval(\"0\",\"" . $one['id'] . "\",\"hiring\")'>Employer Approved</button>";
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
