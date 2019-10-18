<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'Common/CDN.php';
        include 'Config/ConnectionObjectOriented.php';
        include 'Config/DB.php';
        $db = new DB($conn);
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid allbranchContainer">
            <div class="row">
             
                <div class="col-sm-12" style="border: thin solid red;">
                    <div>
                        <div style="overflow-x: scroll;">
                            <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Go Back</a>
                              <?php
                            if (isset($_GET["searchCol"])) {
                                $searchCol = $_GET["searchCol"];
                                $value = $_GET["searching_data"];
                                $tbname = $_GET["tbname"];
                                $db->showInTable($tbname." where $searchCol like '%".$value."%'","*",array(),"no");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
