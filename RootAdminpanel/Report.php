<?php session_start();?>
<?php include './LoginCheck.php';?> 
<!DOCTYPE html>

<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        $db = new DB($conn);
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            <?php include './RootAdmin_page.css';?>
        </style>
    </head>
    <body>
<?php include './RootAdmin_page_header.php';?>
        <?php
        if ((isset($_GET["sdate"]) && !empty($_GET["sdate"])) && (isset($_GET["sdate"]) && !empty($_GET["sdate"]))) {
            $_GET["sdate"]=$db->jqToSqlDate($_GET, "sdate");
            $_GET["edate"]=$db->jqToSqlDate($_GET, "edate");
            $startdate = $_GET["sdate"];
            $enddate = $_GET["edate"];
            ?>
            <div class="container">
                <div class="row">
                    <button class="btn btn-default" onclick="window.print()">Print this page</button>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover">
                        <caption style="text-align: center;"><h3>(Total <?php
                                $query = "select count(id) as cnt from branches";
                                $data = $conn->query($query);
                                $one = $data->fetch_assoc();
                                echo $one["cnt"];
                                ?>) Branches report from [  <?php echo $startdate; ?> to <?php echo $enddate; ?> ] </h3></caption>
                        <tr class="success">
                            <th>Branch ID</th>
                            <th>Branch name/location</th>
                            <th>Total candidates</th>
                            <th>Candidates Applied for job</th>
                            <th>Companies requested to candidates</th>
                            <th>All hired</th>
                            <th>All rejected</th>
                            <th>Total feedbacks</th>
                        </tr>
                        <?php
                        $query = "select * from branches";
                        $data = $conn->query($query);
                        while ($one = $data->fetch_Assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $one["id"]; ?></td>
                                <td><?php echo $one["name"]; ?></td>
                                <td>
                                    <?php
                                    $query2 = "select count(id) as cnt from candidates where branches_id=" . $one['id'] . " and id in (select candidates_id from login_credentials where creation_date between '$startdate' and '$enddate')";
                                    $candidates = $conn->query($query2);
                                    $candicount = $candidates->fetch_assoc();
                                    echo $candicount['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from hiring where candidates_id in(select id from candidates where branches_id=" . $one['id'] . ") and requestedBy='employers' and date_ between '$startdate' and '$enddate'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from hiring where candidates_id in(select id from candidates where branches_id=" . $one['id'] . ") and requestedBy='candidates' and date_ between '$startdate' and '$enddate'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from appointment where hiring_id in(select id from hiring where candidates_id in(select id from candidates where branches_id=" . $one['id'] . ")) and appointment_status='selected' and candidates_appointment_date between '$startdate' and '$enddate'";
//                                    echo $query;
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from appointment where hiring_id in(select id from hiring where candidates_id in(select id from candidates where branches_id=" . $one['id'] . ")) and appointment_status='rejected' and candidates_appointment_date between '$startdate' and '$enddate'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from feedback where appointment_id in (select id from appointment where candidates_appointment_date between '$startdate' and '$enddate' and hiring_id in(select id from hiring where candidates_id in(select id from candidates where branches_id=" . $one['id'] . ")))";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>

                            </tr>

                            <?php
                        }
                        ?>

                    </table>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover">
                        <caption style="text-align: center;"><h3>(Total <?php
                                $query = "select count(id) as cnt from employers";
                                $data = $conn->query($query);
                                $one = $data->fetch_assoc();
                                echo $one["cnt"];
                                ?>) Recruiter's report from [  <?php echo $startdate; ?> to <?php echo $enddate; ?> ] </h3></caption>
                        <tr class="success">
                            <th>Recruiters ID</th>
                            <th>Company name</th>
                            <th>Total job posted</th>
                            <th>Candidates Applied for job</th>
                            <th>Companies requested to candidates</th>
                            <th>All hired</th>
                            <th>All rejected</th>
                            <th>Total feedbacks</th>
                        </tr>
                        <?php
                        $query = "select * from employers";
                        $data = $conn->query($query);
                        while ($one = $data->fetch_Assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $one["id"]; ?></td>
                                <td><?php echo $one["Organization_Name"]; ?></td>

                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from jobpost where employers_id=" . $one['id'] . " and job_posted_on between '$startdate' and '$enddate'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from hiring where date_ between '$startdate' and '$enddate' and employers_id=" . $one['id'] . " and requestedBy='candidates'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from hiring where date_ between '$startdate' and '$enddate' and employers_id=" . $one['id'] . " and requestedBy='employers'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from appointment where hiring_id in(select id from hiring where employers_id =" . $one["id"] . ") and appointment_status='selected' and candidates_appointment_date between '$startdate' and '$enddate'";
//                                    echo $query;
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from appointment where hiring_id in(select id from hiring where employers_id =" . $one["id"] . ") and appointment_status='rejected' and candidates_appointment_date between '$startdate' and '$enddate'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from feedback where appointment_id in (select id from appointment where candidates_appointment_date between '$startdate' and '$enddate' and hiring_id in(select id from hiring where employers_id=" . $one['id'] . "))";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>

                            </tr>

        <?php
    }
    ?>
                    </table>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover">
                        <caption style="text-align: center;"><h3>(Total <?php
    $query = "select count(id) as cnt from candidates";
    $data = $conn->query($query);
    $one = $data->fetch_assoc();
    echo $one["cnt"];
    ?>) Candidate's report from [  <?php echo $startdate; ?> to <?php echo $enddate; ?> ] </h3></caption>
                        <tr class="success">
                            <th>Candidates ID</th>
                            <th>Candidates name</th>
                            <th>Number of times candidates applied for job</th>
                            <th>Number of times companies requested to candidates</th>
                            <th>Number of times hired</th>
                            <th>Number of times rejected</th>
                            <th>Total feedbacks</th>
                        </tr>
    <?php
    $query = "select * from candidates";
    $data = $conn->query($query);
    while ($one = $data->fetch_Assoc()) {
        ?>
                            <tr>
                                <td><?php echo $one["id"]; ?></td>
                                <td><?php echo $one["fname"] . " ";
                            echo $one["lname"];
        ?></td>


                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from hiring where date_ between '$startdate' and '$enddate' and candidates_id=" . $one['id'] . " and requestedBy='candidates'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from hiring where date_ between '$startdate' and '$enddate' and candidates_id=" . $one['id'] . " and requestedBy='employers'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
        <?php
        $query = "select count(id) as cnt from appointment where hiring_id in(select id from hiring where candidates_id =" . $one["id"] . ") and appointment_status='selected' and candidates_appointment_date between '$startdate' and '$enddate'";
//                                    echo $query;
        $hirings = $conn->query($query);
        $hire = $hirings->fetch_assoc();
        echo $hire['cnt'];
        ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "select count(id) as cnt from appointment where hiring_id in(select id from hiring where candidates_id =" . $one["id"] . ") and appointment_status='rejected' and candidates_appointment_date between '$startdate' and '$enddate'";
                                    $hirings = $conn->query($query);
                                    $hire = $hirings->fetch_assoc();
                                    echo $hire['cnt'];
                                    ?>
                                </td>
                                <td>
        <?php
        $query = "select count(id) as cnt from feedback where appointment_id in (select id from appointment where candidates_appointment_date between '$startdate' and '$enddate' and hiring_id in(select id from hiring where candidates_id=" . $one['id'] . "))";
        $hirings = $conn->query($query);
        $hire = $hirings->fetch_assoc();
        echo $hire['cnt'];
        ?>
                                </td>

                            </tr>

        <?php
    }
} else {
    echo '<h1>please select the date</h1>';
}
?>

                </table>
            </div>
        </div>
    </body>
</html>
