<!DOCTYPE html>
<html>
    <head>
        <?php
        $loggedintype = "candidate";
        include './UserLoginCheck.php';
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/user_login.css" rel="stylesheet" type="text/css"/>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style type="text/css">
<?php include './css/Footer.css'; ?>
<?php include 'css/Employee_page.css'; ?>
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class=" container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form method="get" action="Employee_page.php">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Name</label>
                                                <input type="text" name="name" id="inputState" placeholder="john" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Location</label>
                                                <input type="text" name="location" id="inputState" placeholder="mumbai" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Skill</label>
                                                <input type="text" id="inputState" name="skill" placeholder="mumbai" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>&nbsp;</label>
                                            <button class="form-control" name="search" style="background-color: #2196F3;">Go</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php
                    if (isset($_GET["name"])) {
                        $sql = "select * from candidates where ";
                        $i = 0;
                        $name = $_GET["name"];
                        $location = $_GET["location"];
                        $skill = $_GET["skill"];

                        if (!empty($name)) {
                            $i = 1;
                            $sql .= "fname like '%$name%' or lname like '%$name%'";
                        }
                        if (!empty($location)) {
                            if ($i == 1) {
                                $sql .= " and caddress like '%$location%' or paddress like '%$location%' or city like '%$location%' or state like '%$location%' or country like '%$location%'";
                            } else {
                                $sql .= " caddress like '%$location%' or paddress like '%$location%' or city like '%$location%' or state like '%$location%' or country like '%$location%'";
                            }
                            $i = 1;
                        }
                        if (!empty($skill)) {
                            if ($i == 1) {
                                $sql .= " and id in(select id from skill_set where skill like '%$skill%')";
                            } else {
                                $sql .= " id in(select id from skill_set where skill like '%$skill%')";
                            }
                            $i = 1;
                        }
                        if (empty($name) && empty($location) && empty($skill)) {
                            $sql = "select * from candidates order by id desc";
                        }
                    } else {
                        $sql = "select * from candidates order by id desc";
                    }

//                    echo $sql;
                    $db = new DB($conn);
                    $candidates = $conn->query($sql);
                    while ($cd = $candidates->fetch_assoc()) {
                        $skillset = $db->select("skill_set", "skill", array("candidates_id", $cd["id"]));
                        $qualification = $db->select("education", "basic_qualification", array("candidates_id", $cd["id"]));
                        ?>
                        <div class="profilecard" style="width: 100%; margin-top: 10px; padding: 10px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="employe">
                                        <img src="images/profile/<?php echo $cd["dp"]; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                </div>
                                <div class="col-md-4">
                                    <label>Name</label>
                                    <p id="Empname"><?php echo $cd["fname"] . " " . $cd["lname"]; ?></p>
                                    <label>Requirements</label>
                                    <p id="EmpRequi">Looking For Job in <?php
                                        while ($skill = $skillset->fetch_assoc()) {
                                            echo $skill["skill"] . ",";
                                        }
                                        ?>..</p>
                                    <label>Qualification</label>
                                    <p id="EmpRequi"><?php
                                        while ($qual = $qualification->fetch_assoc()) {
                                            echo $qual["basic_qualification"] . ",";
                                        }
                                        ?><a href="resume.php?candidate=<?php echo $cd["id"]; ?>" target="_BLANCK">More info</a></p>
                                </div>
                                <div class="col-md-4">
                                    <p id="Emplocation"><?php echo $cd["caddress"]; ?></p>

                                    <div class="btn3">
                                        <!--<button type="button">Hire</button>-->
                                    </div>
                                </div>
                                <div class="btn4" >
                                    <a href="resume.php?candidate=<?php echo $cd["id"]; ?>" target="_BLANCK"><button type="button">See Profile</button></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <?php include './Common/Footer.php'; ?>

    </body>
</html>

