<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include './LoginCheck.php';
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        $db = new DB($conn);
        $allbranches = $db->select("branches");
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
<?php include './RootAdmin_page.css'; ?>
            .allbranchContainer{
                margin-top:-20px;
                /*border: thin solid red;*/
            }
            .allbranchContainer .row .col-sm-3 *{
                margin-top:0px;
            }
            .allbranchContainer .row h1{
                text-align: center;
            }
            
            .cardsforbranch{
                min-width: 100px;
                min-height: 100px;
                background-color: #05728f;
                color: white;
                float: left;
                margin-left: 20px;
            }
            .branchstnumber{
                text-align: center;
                font-size: 35px;
                color:yellowgreen;
                top: 0px;
                margin: 2px;
                padding: 2px;
            }
            .branchname{
                text-align: center;
                position: absolute;
                font-size: 25px;
                color:yellowgreen;
                bottom: 0px;
                margin: 2px;
                padding: 2px;       
            }
        </style>
    </head>
    <body>
        <?php include './RootAdmin_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './RootAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <div class="row">
                        <h1>All feedbacks given to user</h1>
                        <table class="table table-stripped">
                            <tr>
                                <th>ID</th>
                                <th>Reason</th>
                                <th>Description</th>
                                <th>user/ID</th>
                                <th>employer/ID</th>
                            </tr>

                            <?php
                            $sql = "select * from feedback";
                            $data = $conn->query($sql);
                            while ($one = $data->fetch_assoc()) {
                                $sql = "select * from appointment where id=" . $one["appointment_id"];
                                $appointment = $conn->query($sql);
                                $apt = $appointment->fetch_assoc();
                                $hid = $apt["hiring_id"];

                                $sql = "select * from hiring where id=$hid";
                                $data1 = $conn->query($sql);
                                $hiring = $data1->fetch_assoc();
                                $cid = $hiring["candidates_id"];

                                $sql = "select * from hiring where id=$hid";
                                $data2 = $conn->query($sql);
                                $hiring = $data2->fetch_assoc();
                                $eid = $hiring["employers_id"];

                                $sql = "select * from candidates where id=" . $cid;
                                $data3 = $conn->query($sql);
                                $candi = $data3->fetch_assoc();

                                $sql = "select * from employers where id=" . $eid;
                                $data4 = $conn->query($sql);
                                $empl = $data4->fetch_assoc();
                                ?>
                                <tr>
                                    <td><?php echo $one["id"]; ?></td>
                                    <td><?php echo $one["reason"]; ?></td>
                                    <td><?php echo $one["description"]; ?></td>
                                    <td><a href="../resume.php?candidate=<?php echo $candi["id"]; ?>"><?php echo $candi["fname"]; ?> <?php echo $candi["lname"]; ?> </a></td>
                                    <td><a href="../Companyprofile.php?id=<?php echo $empl["id"]; ?>"><?php echo $empl["Organization_Name"]; ?> <?php echo $empl["Type_of_organization"]; ?> </a></td>
                                </tr>
    <?php
}
?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
