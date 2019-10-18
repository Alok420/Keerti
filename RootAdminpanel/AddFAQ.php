<?php session_start(); ?>
<?php include './LoginCheck.php'; ?> 
<!DOCTYPE html>
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
            #jobpostingform{
                width: 100%;
                padding: 0px 20px!important;
            }
            .form-group{
                width: 100%;
            }
            .allbranchContainer h2{
                text-align:center;
                font-size:35px;
                letter-spacing:2px;
                padding:10px;
                font-family: sans-serif;
                font-weight: bold;
            }
            
            .allbranchContainer label{
                font-size: 15px;
                letter-spacing: 2px;
                font-family: sans-serif;
                
            }
            .allbranchContainer textarea{
                resize:none;
            }
            .allbranchContainer .form-control{
                border:none;
                border-bottom: thin solid black;
                border-radius: 0px;
                background-color: transparent;
                font-size: 15px;
                box-shadow: none;
                letter-spacing: 2px;
            }
            .allbranchContainer .form-control:hover{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .allbranchContainer .form-control:active{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .allbranchContainer .form-control:focus{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .allbranchContainer .form-control:visited{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            
        </style>
    </head>
    <body>

        <?php include './RootAdmin_page_header.php'; ?>
        <?php
        $id = $_SESSION["loggedinid"];
        $type = $_SESSION["loggedintype"];
//        if ($type == "candidate") {
//            
//        } else if ($type == "branch") {
//            
//        } else if ($type == "mainbranch") {
//            
//        } else if ($type == "employer") {
//            
//        }
//        
        ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './RootAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <div class="container">
                        <h3>Add FAQ</h3>
                        <form action="../controller/insertCommon.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">FAQ Title</label>
                                <input type="text" style="width: 70%;"class="form-control" id="title" name="title">
                            </div>
                            <label for="pwd">Description</label>
                            <div class="form-group">

                                <textarea rows="5" cols="100" name="description"></textarea>
                            </div>
                            <input type="hidden" name="tbname" value="faq" >

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form> 
                    </div>
                    <div style="overflow-x: scroll;">
                        <?php
                        $db->showInTable("faq", "*", array(), "all", $externallinks = "", array(), $sort);
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
