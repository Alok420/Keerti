<!DOCTYPE html>
<html>
    <?php
    include './LoginCheck.php';
    include '../Common/CDN.php';
    include '../Config/ConnectionObjectOriented.php';
    include '../Config/DB.php';
    ?>   
    <link rel="stylesheet" type="text/css" href="chatbox.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
<?php include './Student_page.css'; ?>
        .nameid{
            font-size: 18px;
            cursor: pointer;
        }
        .nameid img{
            margin-left: 10px;
            margin-right: 10px;
            height: 50px;
            width: 50px;
            border-radius: 100%;
                
        }
    </style>
    <script>
        $(document).ready(function () {
            $('select').focus();
            var id = $('select').val();
            getSelectedData(id);
            $('select').on('change', function () {
                getSelectedData(this.value);
            });

            $('.refresh').click(function () {
                window.location.reload();
            });
            $('.chatsendbtn').click(function () {
                var today = new Date();
                var date = today.getUTCFullYear() + '-' +
                        ('00' + (today.getUTCMonth() + 1)).slice(-2) + '-' +
                        ('00' + today.getUTCDate()).slice(-2) + '';

                var hour = today.getHours();
                var min = today.getMinutes();
                var sec = today.getSeconds();
                var time = "" + hour + ":" + min + ":" + sec;
                sendMessage(
                        $('.sendernames .sendername #sid').text(),
                        $('.sendernames .sendername #stype').text(),
                        $('.sendernames .sendername #sname').text(),
                        $('.sendernames .receivername #rid').text(),
                        $('.sendernames .receivername #rtype').text(),
                        $('#comment').val(),
                        date,
                        time
                        );

                $('#comment').val("");
            });


        });
        function clickme(thisval) {
            var val = $(thisval).html();
            $('.receivername').html(val);
        }
        function getSelectedData(tbname) {
            $.post("../controller/getTableDataByAjax.php",
                    {
                        tbname: "" + tbname
                    },
                    function (data, status) {
                        $('.list ul').text("");
                        var obj = JSON.parse(data);
                        for (var key in obj) {
                            if (tbname == "mainbranch") {
                                $('.list ul').append("<li onclick='clickme(this)' class='nameid'><small id='rid'>" + obj[key]["id"] + "</small>: " + obj[key]["name"] + " (<small id='rtype'>mainbranch</small>)</li>");

                            } else if (tbname == "branches") {
                                $('.list ul').append("<li onclick='clickme(this)' class='nameid'> <small id='rid'>" + obj[key]["id"] + "</small>: " + obj[key]["name"] + " (<small id='rtype'>branch</small>)</li>");


                            } else if (tbname == "employers") {
                                $('.list ul').append("<li onclick='clickme(this)' class='nameid'><small id='rid'>" + obj[key]["id"] + "</small><img src='../images/CompanyProfile/" + obj[key]["company_logo"] + "' height='30' width='30'> " + obj[key]["Organization_Name"] + " (<small id='rtype'>employer</small>)</li>");

                            } else if (tbname == "candidates") {
                                $('.list ul').append("<li onclick='clickme(this)' class='nameid'><small id='rid'>" + obj[key]["id"] + "</small><img src='../images/profile/" + obj[key]["dp"] + "' height='30' width='30'>" + obj[key]["fname"] + " " + obj[key]["lname"] + " (<small id='rtype'>candidate</small>)</li>");


                            }
                        }

                    });
        }
        function sendMessage(senderid, sendertype, sname, receiverid, receivertype, message, mdate, mtime) {
            if (!(receiverid === undefined || receiverid == null || receiverid == " " || receiverid == "")) {
                $.post("../controller/sendMessage.php",
                        {
                            sender_id: "" + senderid,
                            receiver_id: "" + receiverid,
                            mesaage: "" + message,
                            mdate: "" + mdate,
                            senderuseretype: "" + sendertype,
                            receiveruseretype: "" + receivertype,
                            mtime: "" + mtime

                        },
                        function (data, status) {
                            if (status == "success" && data == 1) {
                                $('.mainbox').append("<div class='sendermsg'>" + message + "<br><small>By:" + sname + "(" + sendertype + ")</small><br> " + mtime + "(" + mdate + ") <span style='color:green;'>&Sqrt;</span></div>");
                                $(".mainbox").scrollTop($(".mainbox")[0].scrollHeight);
                            }
                        });
            } else {
                alert("Please select any user from right side panel.");
            }
        }
    </script>
</head>
<body>
    <?php include './Student_page_header.php'; ?>
    <div class="container-fluid" style="margin-top: -20px;">
        <div class="row">
            <div class="col-sm-3 leftcol">
                <select class="select">
                    <option value="mainbranch">Root</option>
                    <option value="branches">Branch</option>
                    <!--<option value="employers">Employer</option>-->
                    <!--<option value="candidates">Employee</option>-->
                </select>
                <div class="list">
                    <ul>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row sendernames">
                    <div class="col-sm-12">
                        <div class="chatbox-content">
                            <div class="sendername">
                                <?php
                                $db = new DB($conn);
                                $id = $_SESSION["loggedinid"];
                                if ($_SESSION["loggedintype"] == "mainbranch") {
                                    $data = $db->select("mainbranch", "*", array("id" => $id));
                                    $one = $data->fetch_assoc();
                                    echo "<small id='sid'>" . $one['id'] . "</small> ";
                                    echo "<span id='sname'>" . $one["name"] . "</span>";
                                    echo " (<small id='stype'>mainbranch</small>)";
                                } else if ($_SESSION["loggedintype"] == "branch") {
                                    $data = $db->select("branches", "*", array("id" => $id));
                                    $one = $data->fetch_assoc();
                                    echo "<small id='sid'>" . $one['id'] . "</small> ";
                                    echo "<span id='sname'>" . $one["name"] . "</span>";
                                    echo " (<small id='stype'>branch</small>)";
                                } else if ($_SESSION["loggedintype"] == "employer") {
                                    $data = $db->select("employers", "*", array("id" => $id));
                                    $one = $data->fetch_assoc();
                                    echo "<small id='sid'>" . $one['id'] . "</small> ";
                                    echo "<img src='" . $one["company_logo"] . "' height='50' width='50' style='border-radius:100%;'>";
                                    echo "<span id='sname'>" . $one["Organization_Name"] . "</span>";
                                    echo " (<small id='stype'>employer</small>)";
                                } else if ($_SESSION["loggedintype"] == "candidate") {
                                    $data = $db->select("candidates", "*", array("id" => $id));
                                    $one = $data->fetch_assoc();
                                    echo "<small id='sid'>" . $one['id'] . "</small> ";
                                    echo "<img src='" . $one["dp"] . "' height='50' width='50' style='border-radius:100%;'>";
                                    echo "<span id='sname'>" .$one["fname"];
                                    echo " " . $one["lname"] . "</span>";
                                    echo " (<small id='stype'>candidate</small>)";
                                }
                                ?>
                                <button class="btn btn-default refresh"><span class="glyphicon glyphicon-refresh"></span></button>
                            </div>
                            <div class="receivername nameid">

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                
                $sql = "select * from chat where (sender_id=" . $_SESSION["loggedinid"] . " or receiver_id=" . $_SESSION["loggedinid"] . ") and (senderuseretype='candidate' or receiveruseretype='candidate')";

//                 $sql = "select * from chat";
                $data = $conn->query($sql);
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mainbox">
                            <?php
                            while ($one = $data->fetch_assoc()) {
                                $sql2 = "";
                                $sendername = "";
                                $receivername = "";
                                if ($one["senderuseretype"] == "branch") {
                                    $sql2 = "select * from branches where id=" . $one["sender_id"];
                                    $sendernamedat = $conn->query($sql2);
                                    $onesendername = $sendernamedat->fetch_assoc();
                                    $sendername = $onesendername["name"];
                                } else if ($one["senderuseretype"] == "mainbranch") {
                                    $sql2 = "select * from mainbranch where id=" . $one["sender_id"];
                                    $sendernamedat = $conn->query($sql2);
                                    $onesendername = $sendernamedat->fetch_assoc();
                                    $sendername = $onesendername["name"];
                                } else if ($one["senderuseretype"] == "candidates") {
                                    $sql2 = "select * from candidate where id=" . $one["sender_id"];
                                    $sendernamedat = $conn->query($sql2);
                                    $onesendername = $sendernamedat->fetch_assoc();
                                    $sendername = $onesendername["fname"] . " " . $onesendername["lname"];
                                } else if ($one["senderuseretype"] == "employers") {
                                    $sql2 = "select * from employers where id=" . $one["sender_id"];
                                    $sendernamedat = $conn->query($sql2);
                                    $onesendername = $sendernamedat->fetch_assoc();
                                    $sendername = $onesendername["Organization_Name"];
                                }

                                $sql3 = "";
                                if ($one["senderuseretype"] == "branch") {
                                    $sql3 = "select * from branches where id=" . $one["receiver_id"];
                                    $sendernamedat = $conn->query($sql3);
                                    $onereceivername = $sendernamedat->fetch_assoc();
                                    $receivername = $onesendername["name"];
                                } else if ($one["senderuseretype"] == "mainbranch") {
                                    $sql3 = "select * from mainbranch where id=" . $one["receiver_id"];
                                    $sendernamedat = $conn->query($sql3);
                                    $onereceivername = $sendernamedat->fetch_assoc();
                                    $receivername = $onesendername["name"];
                                } else if ($one["senderuseretype"] == "candidates") {
                                    $sql3 = "select * from candidate where id=" . $one["receiver_id"];
                                    $sendernamedat = $conn->query($sql3);
                                    $onereceivername = $sendernamedat->fetch_assoc();
                                    $receivername = $onesendername["fname"] . " " . $onesendername["lname"];
                                } else if ($one["senderuseretype"] == "employers") {
                                    $sql3 = "select * from employers where id=" . $one["receiver_id"];
                                    $sendernamedat = $conn->query($sql3);
                                    $onereceivername = $sendernamedat->fetch_assoc();
                                    $receivername = $onesendername["Organization_Name"];
                                }
                                if ($one["senderuseretype"] == "candidate") {
                                    ?>
                                    <div class="sendermsg">
                                        <?php
                                        echo $one["mesaage"] . "<br>";
                                        echo 'By:' . $sendername . ' (' . $one["senderuseretype"] . ') To: ' . $receivername . ' (' . $one["receiveruseretype"] . ')<br>';
                                        echo $one["mtime"] . " (" . $one["mdate"] . ")";
                                        ?>
                                    </div>
                                    <?php
                                } else if ($one["receiveruseretype"] == "candidate") {
                                    ?>
                                    <div class="receivermsg">
                                        <?php
                                        echo $one["mesaage"] . "<br>";
                                        echo 'By: ' . $sendername . ' (' . $one["senderuseretype"] . ') To: ' . $receivername . ' (' . $one["receiveruseretype"] . ')<br>';
                                        echo $one["mtime"] . " (" . $one["mdate"] . ")";
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row textareabox">
                    <div class="col-sm-10">     
                        <div class="form-group">
                            <textarea class="form-control" rows="2" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-default chatsendbtn"><span class="glyphicon glyphicon-chevron-right arrowicon"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>