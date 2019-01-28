<!DOCTYPE html>

<html>
    <head>
        <?php
        include './LoginCheck.php';
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
                            mbapproval: "" + branchapproval,
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
            .listbox{
                border: thin solid #003246;
                margin-bottom: 20px;
            }
            .filter a{
                font-size: 18px; padding: 5px;
                color:#2196F3;
                margin-left: 10px;
                text-decoration: none;
                text-decoration: underline;
            }
            .listbox{
                /*border: thin solid #003246;*/
                margin-bottom: 20px;
                padding: 30px;
                margin-top: 10px;
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
            .update{
                background-color: darkgreen;
                color:black;
                font-size:15px;
                padding:8px;
                width:100%;
                font-weight: bold;
                text-align:center;
                margin-top:5px;
                /*margin: 0px auto;*/
            }
            .delete{
                padding:8px;
                margin-top:5px;
                background-color: red;
                color:black;
                font-size:15px;
                width:100%;
                font-weight: bold;
               
            }
            .update:hover{
                background-color: transparent;
                border: none;
                border-bottom: thin solid green;
                color:green;
                border-radius: 0px;
            }
            .delete:hover{
                background-color: transparent;
                border: none;
                border-bottom: thin solid red;
                color:red;
                border-radius: 0px;
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
                    <h1 style="text-align: center; margin: 0px; text-shadow: 2px 2px lightgray;">All employers</h1>
                    <div class="filter">
                        <h5 style="font-size: 20px; font-weight: bold; color: #BE8D3D; letter-spacing: 1px;">Filter: </h5>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?status=1">Approved only</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?status=0">Not approved</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?active=1">Active employers</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?active=0">Not active employers</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">All</a>
                    </div>
                    <div class="row row-title">
                        <div class="col-sm-3">
                            <h4 >Employer</h4>
                        </div>

                        <div class="col-sm-3">
                            <h4>Approval</h4>
                        </div>
                    </div>


                    <?php
                    $sql = "select * from employers";
                    if (isset($_GET["status"])) {
                        $sql = "select e.*,lc.id as lcid from employers e,login_credentials lc where e.id =lc.employers_id and lc.mbapproval=" . $_GET['status'];
                    }

                    if (isset($_GET["active"])) {
                        $sql = "select e.*,lc.id as lcid from employers e,login_credentials lc where e.id =lc.employers_id and lc.status=" . $_GET['active'];
                    }
                    $data = $conn->query($sql);
                    while ($one = $data->fetch_assoc()) {
                        $data2 = $db->select("login_credentials", "*", array("employers_id" => $one["id"]));
                        if (isset($_GET["status"])) {
                            $data2 = $db->select("login_credentials", "*", array("employers_id" => $one["id"], "operatoroc" => "and", "mbapproval" => $_GET["status"]));
                        }
                        $lc = $data2->fetch_assoc();
                        ?>
                        <div class="row listbox">
                            <div class="col-sm-3">
                                <div class="row">
                                    <a href="../Companyprofile.php?id=<?php echo $one["id"]; ?>"><img src="../images/CompanyProfile/<?php echo $one["company_logo"]; ?>" height="150" width="150" class="img-responsive img-thumbnail"></a>
                                </div>
                                <div class="row column-text">
                                    <strong><?php
                                        echo $one["id"] . ":";
                                        echo $one["Organization_Name"] . " " . $one["Type_of_organization"];
                                        ?></strong>
                                    <BR> Incorporation date ON <?php echo $one["Date_of_incorporation"]; ?>
                                </div>
                            </div>

                            <div class="col-sm-3">

                                <strong>Status:-</strong> <?php echo $lc["status"] == 0 ? " Not Active" : "Active"; ?>
                                <br><br>
                                <?php
//                                echo $lc["bapproval"] == 0 ? "<button id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $lc['id'] . "\",\"login_credentials\")'>Your Approvel pending</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $lc['id'] . "\",\"login_credentials\")' class='btn btn-default'>Branch Approved</button>";
                                ?>
                                <br><br>
                                <?php
                                echo $lc["mbapproval"] == 0 ? "<button id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $lc['id'] . "\",\"login_credentials\")'>Main Branch Approvel</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $lc['id'] . "\",\"login_credentials\")' class='btn btn-default'>Main Branch Approved</button>";
                                ?>
                                <!--<button class="btn btn-default update" type="submit">Update</button>-->
                                <a href="../controller/DeleteController.php?id=<?php echo $one["id"]; ?>&table_name=employers"><button class="btn btn-default delete">Delete</button></a>

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
