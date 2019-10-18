<?php session_start();?>
<?php include './LoginCheck.php';?> 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
    
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        $db = new DB($conn);
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function updateRecord(id, table) {
                var a = $("#updateinfo").text();
                $(".modal-body").css("background-color", "red");
                selectRecordById(id, table);
            }
            function selectRecordById(id, table) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var obj = jQuery.parseJSON(xhttp.responseText);
                        var array = new Array();
                        var array2 = new Array();

                        array = Object.keys(obj);
                        array2 = Object.values(obj);
                        for (var i = 0; i < Object.keys(obj).length; i++) {
                            $("#updatemodel .modal-body").append("<br><input type="text" value="" + array2[i] + "" name="" + array[i] + "" class="form-control">");

                        }
                        $("#updatemodel .modal-body").append("<br><button class="btn btn-default btnsub" onclick="getData()">Update</button>");
                    }
                };
                xhttp.open("GET", "../controller/UpdateFormSelection.php?id=" + id + "&table_name=" + table, true);
                xhttp.send();
            }
            function getData() {
                var data = "", keys = "";
                for (var i = 0; i < $("#updatemodel .modal-body input").length; i++) {
                    var single = $("#updatemodel .modal-body input:eq(" + i + ")").val();
                    var key = $("#updatemodel .modal-body input:eq(" + i + ")").attr("name");
                    if (i == $("#updatemodel .modal-body input").length - 1) {
                        data += key + "=" + single;

                    } else {
                        data += key + "=" + single + "&";

                    }

                }
                $.get("../controller/UpdateData.php?" + data, function (rdata, status) {
                    alert(rdata);
                    location.reload();
                });
            }
        </script>
        <style>
<?php include './recruiter_page.css'; ?>
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
        <?php include './recruiter_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './recruiter_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                        <h1>Update profile page</h1>
                        <div style="overflow-x: scroll;">
                                

                        <?php
                        $id=$_SESSION["loggedinid"];
                        $where = array("id" => $id);
                        $db->showInTable("employers", "*", $where);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
