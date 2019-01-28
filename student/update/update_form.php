<!DOCTYPE html>
<?php include '../LoginCheck.php'; ?>
<?php include '../../Config/ConnectionObjectOriented.php'; ?>
<?php include '../../Config/DB.php'; ?>

<html lang="en">
    <head>
        <title>Update Form</title>
        <link rel="stylesheet" href="../Student_page.css">
        <link rel="stylesheet" href="updateform.css">
        <?php include '../../Common/CDN.php'; ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style>
            .nav-stacked li,.nav-stacked .active{
                margin-bottom: 10px!important;
            }
            iframe{
                border: none;
                /*overflow-x: scroll;*/
            }
        </style>

    </head>
    <body>
        <?php include './Student_page_header.php'; ?>
        <div class="container-fluid" style="margin-top: 50px;">
            <ul class="nav nav-tabs nav-stacked">
                <li><a   href="slide0.php" target="ifr">Personal</a></li>
                <li><a   href="slide1.php" target="ifr">Education</a></li>
                <li><a   href="slide2.php" target="ifr">Professional Details</a></li>
                <li><a   href="slide3.php" target="ifr">Skill Set</a></li>
                <li><a   href="slide4.php" target="ifr">Professional Experience Details</a></li>
                <li><a   href="slide5.php" target="ifr">Project Detail</a></li>
                <li><a   href="slide6.php" target="ifr">Language Known</a></li>
                <li><a   href="slide7.php" target="ifr">Job Preference</a></li>
                <li><a   href="slide8.php" target="ifr">Upload Other Data</a></li>
                <li><a   href="slide9.php" target="ifr">Remuneration Details</a></li>
                <li><a   href="slide10.php" target="ifr">References</a></li>
            </ul>
            <div class="tab-content" style="float: left; width:80%; min-height: 550px; overflow: scroll;">
                <div id="education" class="tab-pane fade in active">
                    <iframe width="100%" style="min-height: 500px;"name="ifr" src="slide0.php">
                    </iframe>
                </div>
            </div>
        </div>
    </body>
</html>