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
            <?php include './RootAdmin_page.css';?>
            .main-column-form {
                padding: 20px 20px!important;
   
            }
            .main-column-form h2{
                text-align:center;
                font-size:35px;
                letter-spacing:2px;
                padding:10px;
                font-family: sans-serif;
                font-weight: bold;
            }
            .main-column-form label{
                font-size: 15px;
                letter-spacing: 2px;
                font-family: sans-serif;
                
            }
            .main-column-form .form-control{
                border:none;
                border-bottom: thin solid black;
                border-radius: 0px;
                background-color: transparent;
                font-size: 15px;
                box-shadow: none;
                letter-spacing: 2px;
            }
            .main-column-form .form-control:hover{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .main-column-form .form-control:active{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .main-column-form .form-control:focus{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .main-column-form .form-control:visited{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            
        </style>
    </head>
    <body>
        <?php include './RootAdmin_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row" >
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './RootAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn" style="margin: 0px auto;">
                    <div class="main-column-form">
                        <h2>Branch registration form</h2>
                        <form action="../controller/BranchRegistrationController.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Branch name:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="name">
                            </div>  
                            <div class="form-group">
                                <label for="pcontact">Primary contact:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="pcontact">
                            </div>  
                            <div class="form-group">
                                <label for="scontact">Secondary contact:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="scontact">
                            </div>  
                            <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="user_name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
