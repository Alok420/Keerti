<?php session_start(); ?>	
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
<?php include 'css/Employer_page.css'; ?>
            .form-group input{
                text-transform: capitalize;
                font-size: 12px;
                height: 40px;
                font-weight: 800;
                letter-spacing: 1px;
                border-radius: 0;
                border-top-left-radius: 0px;
                border-bottom-left-radius: 0px;
                padding: 15px 25px;
            }
        </Style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <form method="get" action="Employer_page.php">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="inputState" placeholder="john" class="form-control" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Type of organization</label>
                            <input type="text" name="Type_of_organization" id="inputState" placeholder="mumbai" class="form-control" >
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="form-group ">
                            <br>
                            <button name="search" class="btn-primary" style="font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                                    text-transform: capitalize;
                                    font-size: 12px;

                                    font-weight: 800;
                                    letter-spacing: 1px;
                                    border-radius: 0;
                                    border-top-left-radius: 0px;
                                    border-bottom-left-radius: 0px;
                                    padding: 12px 25px;" type="submit"><span class="glyphicon glyphicon-search"></span> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row">
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
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="col-sm-3" style="min-height: 300px; padding: 10px;">
                        <div class="subcontainer">
                            <img src="images/CompanyProfile/<?php echo $emp["company_logo"]; ?>" class="img img-responsive"  style="display:block; margin: auto; max-height: 150px;">
                            <div class="item-text2">
                                <h4 style="text-align: center;padding: 1px; overflow: hidden;"><?php echo $emp["Organization_Name"]; ?></h4>
                                <div class="flex-container">
                                    <a href="Companyprofile.php?id=<?php echo $emp["id"]; ?>" <button class="butt1 butt1bottom" type="button">More Info <i class="fas fa-arrow-right"></i></button></a>
                                </div> 
                            </div>
                        </div> 
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php include './Common/Footer.php'; ?>
    </body>
</html>