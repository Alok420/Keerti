<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="Index.php"><img src="images/keertiwhite.png" width="150" height="40" alt="<?php echo "$websitename"; ?>"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav link-list">

                <li><a href="Alljobs.php">Jobs</a></li>
                <li><a href="Employer_page.php">Recruiters </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register As <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="SignupForm_Employee.php"> Employee</a></li>
                        <li><a href="EmployerRegistration.php"> Recruiter</a></li>
                    </ul>
                </li>

                <?php
                $db = new DB($conn);
                if (isset($_SESSION["loggedinid"])) {
                    $loggedinid = $_SESSION["loggedinid"];
                    if (isset($_SESSION["loggedintype"])) {
                        $loginarray = $_SESSION["loggedintype"];
                        if ($loginarray == "candidate") {
                            $where = array("id" => $_SESSION["loggedinid"]);
                            $user = $db->select("candidates", "*", $where);
                            $one = $user->fetch_assoc();
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #00bff3;"></span> &nbsp; <?php echo " " . $one["fname"] . " " . $one["lname"]; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="student/StudentPage.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Student's Dashboard</a></li>
                                    <li><a href="controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                </ul>
                            </li>    
                            <?php
                        } elseif ($loginarray == "employer") {
                            $where = array("id" => $_SESSION["loggedinid"]);
                            $user = $db->select("employers", "*", $where);
//                       
                            $one = $user->fetch_assoc();
                            ?>
                            <script>
                                $(document).ready(function () {
                                    $('.link-list').append("<li><a href='Employee_page.php'>Candidates</a></li>");
                                });
                            </script>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #00bff3;"></span> <?php echo $one["Organization_Name"]; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="EmployerManagement/Recruiter_page.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Recruiter's Dashboard</a></li>
                                    <li><a href="controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                </ul>
                            </li>    
                            <?php
                        } elseif ($loginarray == "branch") {
                            $where = array("id" => $_SESSION["loggedinid"]);
                            $user = $db->select("branches", "*", $where);
                            $one = $user->fetch_assoc();
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #00bff3;"></span> <?php echo $one["name"]; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Branch/BranchAdmin_page.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Branch Admin's Dashboard</a></li>
                                    <li><a href="controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                </ul>
                            </li>    
                            <?php
                        } else if ($loginarray == "mainbranch") {
                            $where = array("id" => $_SESSION["loggedinid"]);
                            $user = $db->select("mainbranch", "*", $where);
                            $one = $user->fetch_assoc();
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #00bff3;"></span> <?php echo $one["name"]; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="RootAdminpanel/RootAdmin_page.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Root Admin's Dashboard</a></li>
                                    <li><a href="controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>

                                </ul>
                            </li>    
                            <?php
                        }
                    }
                } else {
                    ?>
                    <li>
                        <a href="Login_User.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<script type="text/javascript">
            jQuery("body").prepend('<div class="loader"></div>');

    jQuery(document).ready(function () {
        jQuery(".loader").remove();

    });
</script>