<!DOCTYPE html>
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
         
        <style>
<?php include './recruiter_page.css'; ?>
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
        </style>
    </head>
    <body>
        <?php include './recruiter_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './recruiter_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <div class="row">
                        <?php
                        $db->showInTable("jobpost","*",array("employers_id"=>$_SESSION["loggedinid"]));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
