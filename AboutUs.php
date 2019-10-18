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
            <div class="row">
                <div class="container">
                    <h3>About Us</h3>
                    <p class="p">Keerti Knowledge and Skills Limited is a focused educational enterprise that firmly believes in empowering young minds with skills and enlightening them with knowledge to be the future leaders.</p>

                    <p>Synonymous with INTEGRITY, INNOVATION and EXCELLENCE Keerti has evolved and grown exponentially into an initiative with a progressive outlook and professional approach. It has consistently endeavoured to create entrepreneurs and leaders, to establish foundations of a knowledge based economy.</p>

                    <p>A vibrant and passionate team of Keerti has created a colossal pool of skilled resources with several path breaking ideas and this remains the mainstay of Keerti's achievements. The group further aspires to scale new altitudes of success.</p>
                    <p> Keerti Knowledge and Skills limited is an ISO 9001:2015 certified organization with quality training delivery, processes, pedagogies and systems that ensures a seamless and AFFORDABLE EDUCATION & TRAINING that can be benchmarked across all our services including in its wholly owned subsidiaries i.e. Keerti Institute India Pvt. Ltd. and Keerti Tutorials India Pvt. Ltd.</p>
                    <p> Over the last 20 years, Keerti has successfully trained more than 500000 candidates through our classroom and instructor led programs, Central and State government programs and CSR projects, casting a positive impact towards youth development and contributing towards Skilling India.</p>
                    <p>  Keerti persistently strives to bring the latest innovations and the best value offerings in creating AFFORDABLE EDUCATION & TRAINING through all its companies.</p>

                </div>
            </div>
        </div>
        <?php include './Common/Footer.php'; ?>
    </body>

</html>
