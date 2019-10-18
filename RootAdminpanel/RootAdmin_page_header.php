
<script>
    $(document).ready(function () {
        var bool = 0;
        $("#envelopenotification").click(function () {
            if (bool == 0) {
                $(".notification").show();
                bool = 1;
            } else {
                bool = 0;
                $(".notification").hide();

            }
        });
    });
</script>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="../Index.php"><img src="../images/keertiwhite.png" width="100" height="50" style="transform: scale(1.2);"> </a> 
            <a class="navbar-brand" style="font-weight: bold; font-size: 35px; box-sizing: border-box; padding-top: 40px;">Administrator panel</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="RootAdmin_page.php">Dashboard</a></li>
                <li id="envelopenotification"><a class="#" href="chatpage.php">
                        <span class="glyphicon glyphicon-envelope">
                            <!--<div class="envelopenotification">14</div>-->
                        </span>
                    </a>
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
                                    <li><a href="../student/index.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Candidate's Dashboard</a></li>
                                    <li><a href="../controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                                </ul>
                            </li>    
                            <?php
                        } elseif ($loginarray == "employer") {
                            $where = array("id" => $_SESSION["loggedinid"]);
                            $user = $db->select("employers", "*", $where);
//                       
                            $one = $user->fetch_assoc();
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #00bff3;"></span> <?php echo $one["Organization_Name"]; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../EmployerManagement/Recruiter_page.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Recruiter's Dashboard</a></li>
                                    <li><a href="../controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
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
                                    <li><a href="../Branch/BranchAdmin_page.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Branch Admin's Dashboard</a></li>
                                    <li><a href="../controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
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
                                    <li><a href="../RootAdminpanel/RootAdmin_page.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Administrator Dashboard</a></li>
                                    <li><a href="../controller/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>

                                </ul>
                            </li>    
                            <?php
                        }
                    }
                } else {
                    ?>
                    <li>
                        <a href="../Login_User.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>