<?php session_start(); ?>
<?php include './LoginCheck.php'; ?> 
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
            .job a{
                text-decoration: none;
                font-size: 18px;
                color: black;
                text-shadow: 1px 1px lightgray;
                text-transform: capitalize;
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
                <div class="col-sm-9">
                    <h1>All employers</h1>
                    <div style="overflow-x: scroll;">
                        <?php
                        $db->showInTable("employers", "*", array(), "no", $externallinks = "../Companyprofile.php?", array(), $sort);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
