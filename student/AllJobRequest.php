<?php session_start();?>
<?php include './LoginCheck.php';?> 
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        $db = new DB($conn);
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
<?php include './Student_page.css'; ?>
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
                box-shadow: 2px 2px #3d5c5c;
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
                box-shadow: 2px 2px #3d5c5c;
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
        <?php include './Student_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './Student_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <h1 style="text-align: center; margin: 0px; font-size: 35px; font-weight: bold; padding: 15px; text-shadow: 2px 2px lightgray; text-transform: capitalize; letter-spacing: 2px;">All job request by me</h1>

                    <div class="row row-title" >
                        <div class="col-sm-3">
                            <h4 >Admin</h4>
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
                    $hirings = $db->select("hiring", "*", array("candidates_id" => $_SESSION["loggedinid"], "operatoroc" => "and", "requestedBy" => "candidates"));
                    while ($hiring = $hirings->fetch_assoc()) {
                        $candidate = $db->select("candidates", "*", array("id" => $hiring["candidates_id"]));
                        $employer = $db->select("employers", "*", array("id" => $hiring["employers_id"]));
                        $jobs = $db->select("jobpost", "*", array("id" => $hiring["jobpost_id"]));

                        $candi = $candidate->fetch_assoc();
                        $emp = $employer->fetch_assoc();
                        $job = $jobs->fetch_assoc();
                        ?>
                        <div class="row listbox">
                            <div class="col-sm-3">
                                <div class="row">
                                    <a href="../Companyprofile.php?id=<?php echo $emp["id"]; ?>"><img src="../images/CompanyProfile/<?php echo $emp["company_logo"]; ?>" height="150" width="150"  class="img-responsive img-thumbnail"></a>
                                    <!--<span style="font-size:2em; transform:scaleX(3);">&zigrarr;</span>-->
                                </div>
                                <div class="row column-text">
                                    <strong><?php echo $emp["Organization_Name"] . " " . $emp["Type_of_organization"]; ?>  </strong>
                                    <BR> ON <?php echo $hiring["date_"]; ?>
                                </div>
                            </div>
                            <div class="col-sm-3">

                                <div class="row">
                                    <a href="../resume.php?candidate=<?php echo $candi["id"]; ?>"><img src="../images/profile/<?php echo $candi["dp"]; ?>" height="150" width="150"  class="img-responsive img-thumbnail"></a>
                                </div>
                                <div class="row column-text">
                                    <strong><?php echo $candi["fname"] . " " . $candi["lname"] . "</small>"; ?></strong>
                                </div>
                            </div>
                            <div class="col-sm-3 job">

                                <a href="../Jobdetail.php?id=<?php echo $job["id"]; ?>">  
                                    <div>For job id:<?php echo $job["id"] > 0 ? $job["id"] : "No job selected"; ?></div>
                                    <div>Job name: <?php echo $job["job_title"]; ?></div>
                                </a>
                            </div>
                            <div class="col-sm-3 ">
                                <?php
                                echo $hiring["branchapproval"] == 0 ? "<button disabled id='approve' class='btn btn-success' disabled onclick='approval(\"1\",\"" . $hiring['id'] . "\",\"hiring\")'>Branch Approvel pending </button disabled>" : "<button disabled disabled id='approved' onclick='approval(\"0\",\"" . $hiring['id'] . "\",\"hiring\")' class='btn btn-default'>Branch Approved</button disabled>";
                                ?>
                                <br><br>
                                <?php
                                echo $hiring["employerapproval"] == 0 ? "<button disabled id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $hiring['id'] . "\",\"hiring\")'>Recruiter Approvel pending </button disabled>" : "<button disabled id='approved' class='btn btn-default' onclick='approval(\"0\",\"" . $hiring['id'] . "\",\"hiring\")'>Recruiter Approved</button disabled>";
                                ?>
                            </div>

                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
