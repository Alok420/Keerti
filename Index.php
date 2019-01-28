<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        include 'Config/ConnectionObjectOriented.php';
        include 'Config/DB.php';
        include './Common/CDN.php';
        include './Common/colors.php';
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            <?php include './css/Footer.css'; ?>
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="container" 
                     style="border:1px solid #000; 
                     background-color:#FFF; 
                     background-image:url('http://www.musictruth.com/wp-content/uploads/2016/12/bible-study-video-background.jpg'); 
                     height: 100px;
                     width: 100%;">

                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <form method="get" action="searchdata.php">
                                <div class="input-group buscador-principal">    					

                                    <input  name="" id="search_param" type="hidden">         
                                    <input class="form-control" name="search_param" placeholder="Search Your Job?" type="text">
                                    <div class="input-group-btn search-panel">
                                        <input type="text" name="location" style="width: 180px;" placeholder="location: Mumbai" class="form-control" role="menu">
                                    </div>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                .</div>
        </div>

        <div class="col-md-4">
            <div class="wrapper">
                <div class="product-info">
                    <div class="product-text">
                        <h1>New On Job Portal</h1>
                    </div>
                    <div class="product-price-btn justify-content">

                        <a href="SignupForm_Employee.php"><button type="button">Register Now</button></a>
                        <div class="product1-price-btn justify-content" style="padding-top:20px;">

                            <a href="Login_User.php"><button type="button">Login Now</button></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Recent Jobs</a>

                        </li>
                        <!--                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Candidates</a></li>-->
                        <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Recruiters</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <?php
                            $data = $conn->query("select * from jobpost order by id desc limit 10");

                            if ($data->num_rows > 0) {
                                while ($one = $data->fetch_assoc()) {
                                    ?>
                                    <li><a title="<?php echo $one["desired_skill_set"]; ?>" href="Jobdetail.php?id=<?php echo $one["id"]; ?>" target="_blank">
                                            Requirement for: <?php echo $one["desired_skill_set"]; ?>
                                            <br>
                                        </a></li>  
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!--                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <?php
//                            $data = $db->select("candidates");
//                            if ($data->num_rows > 0) {
//                                while ($one = $data->fetch_assoc()) {
//                                    
                        ?>
                                                            <li>Mr/Mrs <a title="//<?php // echo $one["fname"] . " " . $one["lname"];     ?>" href="resume.php?candidate=<?php // echo $one["id"]     ?>" target="_blank"><?php echo $one["fname"] . " " . $one["lname"]; ?> has 5 years of experiences in IT.And looking for development field.</a></li>  
                                                            //<?php
//                                }
//                            }
                        ?>
                        
                        
                                                </div>-->
                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                            <?php
                            $data = $conn->query("select * from employers order by id desc limit 10");
                            if ($data->num_rows > 0) {
                                while ($one = $data->fetch_assoc()) {
                                    ?>
                                    <li><a title="<?php echo $one["Organization_Name"]; ?>" href="Companyprofile.php?id=<?php echo $one["id"]; ?>" target="_blank"><?php echo $one["Organization_Name"]; ?></a></li>  
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <?php include './Common/Footer.php'; ?>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js">

            var tabs = $('.tab');
            var items = $('.tab').find('li').length;
            var selector = $(".tab").find(".selector");
            var activeItem = tabs.find('.active');
            var activeWidth = activeItem.innerWidth();
            $(".selector").css({
                "left": activeItem.position.left + "px",
                "width": activeWidth + "px"
            });

            $(".tabs").on("click", "a", function () {
                $('.tabs a').removeClass("active");
                $(this).addClass('active');
                var activeWidth = $(this).innerWidth();
                var itemPos = $(this).position();
                $(".selector").css({
                    "left": itemPos.left + "px",
                    "width": activeWidth + "px"
                });
            });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>