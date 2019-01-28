	

<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style type="text/css">
<?php include './css/Footer.css'; ?>
<?php include 'css/Employer_page.css'; ?>
        </Style>
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
                                 
                                    <div class="col-md-2"></div>
                                    <form method="get" action="Employer_page.php">
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Name</label>
                                                <input type="text" name="name" id="inputState" placeholder="john" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Type of organization</label>
                                                <input type="text" name="Type_of_organization" id="inputState" placeholder="mumbai" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label>&nbsp;</label>
                                            <button class="form-control" name="search" style="background-color: #00bff3;">Go</button>
                                        </div>
                                      
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
                        $sql = "select * from employers where ";
                        $i = 0;
                        $name = $_GET["name"];

                        $Type_of_organization = $_GET["Type_of_organization"];

                        if (!empty($name)) {
                            $i = 1;
                            $sql .= "Organization_Name like '%$name%'";
                        }
                        if (!empty($Type_of_organization)) {
                            if ($i == 1) {
                                $sql .= " and Type_of_organization like '%$Type_of_organization%'";
                            } else {
                                $sql .= " Type_of_organization like '%$Type_of_organization%'";
                            }
                            $i = 1;
                        }

                        if (empty($name) && empty($Type_of_organization)) {
                            $sql = "select * from employers order by id desc";
                        }
                    } else {
                        $sql = "select * from employers order by id desc";
                    }

                    $db = new DB($conn);
                    $employers = $conn->query($sql);
                    while ($emp = $employers->fetch_assoc()) {
                        ?>
                        <div class="col-md-3">
                            <ul id="ul1" class="item-list2">

                                <li id="li1" class="item item2">
                                    <img src="images/CompanyProfile/<?php echo $emp["company_logo"]; ?>">
                                    <div class="item-text2">
                                        <h2><?php echo $emp["Organization_Name"]; ?></h2>
                                        <p></p>
                                        <div class="flex-container">
                                            <a href="Companyprofile.php?id=<?php echo $emp["id"]; ?>" <button class="butt1" type="button">More Info <i class="fas fa-arrow-right"></i></button></a>
                                        </div> 
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
            <?php include './Common/Footer.php'; ?>
    </body>
</html>