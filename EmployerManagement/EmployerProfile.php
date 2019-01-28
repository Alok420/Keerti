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
        <style>
<?php include './recruiter_page.css'; ?>
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
                    <?php
                    $db = new DB($conn);
                    $id = $_SESSION["loggedinid"];
                    $where = array("id" => $id);
                    $db->myProfile("employers", "*", $where);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
