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
                            bapproval: "" + branchapproval,
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
        <?php include './BranchAdmin_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './BranchAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <h1 style="text-align: center; margin: 0px; text-shadow: 2px 2px lightgray;">All Candidates</h1>
                    <div class="row row-title">
                        <div class="col-sm-3">
                            <h4 >Employer</h4>
                        </div>

                        <div class="col-sm-3">
                            <h4>Approval</h4>
                        </div>
                    </div>
                    <?php
                    $data = $db->select("candidates", "*", array("branches_id" => $_SESSION["loggedinid"]));
                    while ($one = $data->fetch_assoc()) {
                        $data2 = $db->select("login_credentials", "*", array("candidates_id" => $one["id"]));
                        $lc = $data2->fetch_assoc();
                        ?>
                        <div class="row listbox">
                            <div class="col-sm-3">
                                <div class="row">
                                    <a href="../resume.php?id=<?php echo $one["id"]; ?>"><img src="../images/profile/<?php echo $one["dp"]; ?>" height="150" width="150" class="img-responsive img-thumbnail"></a>
                                </div>
                                <div class="row">
                                    <strong><?php
                                        echo $one["id"] . ":";
                                        echo $one["fname"] . " " . $one["lname"];
                                        ?></strong>
                                    <BR> Registration date on : <?php echo $lc["creation_date"]; ?>
                                </div>
                            </div>

                            <div class="col-sm-3">

                                <strong>Status:-</strong> <?php echo $lc["status"] == 0 ? " Not Active" : "Active"; ?>
                                <br><br>
                                <?php
                                echo $lc["bapproval"] == 0 ? "<button id='approve' class='btn btn-success' onclick='approval(\"1\",\"" . $lc['id'] . "\",\"login_credentials\")'>Your Approvel pending</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $lc['id'] . "\",\"login_credentials\")' class='btn btn-default'>Branch Approved</button>";
                                ?>
                                <br><br>
                                <?php
                                echo $lc["mbapproval"] == 0 ? "<button id='approve' disabled class='btn btn-success' onclick='approval(\"1\",\"" . $lc['id'] . "\",\"login_credentials\")'>Main Branch Approvel</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $lc['id'] . "\",\"login_credentials\")' disabled class='btn btn-default'>Main Branch Approved</button>";
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
