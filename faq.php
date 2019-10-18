<?php session_start();?>	
<!DOCTYPE html>
<html>
    <head>
        <?php
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style type="text/css">
<?php include './css/Footer.css'; ?>
            p{
                padding: 5px;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="container" >
            <h2 style="text-align: center;">FAQ'S</h2>
            <div class="row">
               
            </div>
        </div>
        <?php include './Common/Footer.php'; ?>
    </body>

</html>
