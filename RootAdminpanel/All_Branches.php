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
        $allbranches = $db->select("branches");
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function approval(branchapproval, id, table) {
                $("h1").append("<img src='../images/loading.gif' height='50' width='70'>")
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
            .cardsforbranch{
                min-width: 200px;
                min-height: 150px;
                /*background-color: #05728f;*/
                color: white;
                float: left;
                box-shadow: 2px 2px #995805, -1px -1px #995805!important;
                margin-left: 20px;
                margin-top:10px;
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
            .branchname{
                text-align: center;
                position: relative;
                font-size: 25px;
                color:yellowgreen;
                bottom: 0px;
                margin: 2px;
                padding: 2px;
                
            }
            .update{
                background-color: green;
                color:black;
                font-size:15px;
                width:40%;
                font-weight: bold;
                text-align:center;
                /*margin: 0px auto;*/
            }
            .delete{
                background-color: red;
                color:black;
                font-size:15px;
                width:40%;
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
            .more{
                background-color: #002433;
                color: white;
                font-size:18px;
                width:100%;
                font-weight: bold;
            }
            .more:hover{
                background-color: transparent;
                border: none;
                border-bottom: thin solid #002433;
                color: #002433;
                border-radius: 0px;
            }
            .bttn{
                /*margin: 0px auto!important;*/
                margin-left: 12px;
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
                    <h1 style="font-family: sans-serif;"><?php echo $allbranches->num_rows; ?> Branches</h1>
                    <div class="row">
                        <?php
                        while ($branch = $allbranches->fetch_assoc()) {

                            $where = array("branches_id" => $branch["id"]);
                            $count = $db->select("candidates", "count(*) as total", $where);
                            $data2 = $db->select("login_credentials", "*", array("branches_id" => $branch["id"]));
                            $lc = $data2->fetch_assoc();
                            if($count->num_rows>0)
                            $one = $count->fetch_assoc();
                            ?>
                            <div class="cardsforbranch">
                                <div class="branchstnumber"><?php echo $one["total"]; ?> Candidates</div>
                                <div class="branchname">
                                    <?php
                                    echo "(".$branch["id"].") ";
                                    echo $branch["name"];
                                    ?>
                                </div> 
                                <?php
                                echo $lc["mbapproval"] == 0 ? "<button id='approve' class='btn btn-warning' onclick='approval(\"1\",\"" . $lc['id'] . "\",\"login_credentials\")'>Main Branch Approvel</button>" : "<button id='approved' onclick='approval(\"0\",\"" . $lc['id'] . "\",\"login_credentials\")' class='btn btn-success'>Main Branch Approved</button>";
                                ?>
                                
                                <div class="bttn"><br>
                                    <a href="../controller/DeleteController.php?id=<?php echo $branch["id"]; ?>&table_name=branches"><button class="btn btn-default delete">Delete</button></a>
                                </div>
                                <a href="branchinfo.php?bid=<?php echo $branch["id"]; ?>&bname=<?php echo $branch["name"]; ?>"><button class="btn btn-default more">More</button></a>
                                <div>
                                    <strong>Status:-</strong> <?php echo $lc["status"] == 0 ? " Not Active" : "Active"; ?>
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
