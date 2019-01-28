<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db=new DB($conn);
$tbname=$_POST["tbname"];
$data=$db->select($tbname);
$all=array();
while ($one=$data->fetch_assoc()){
    array_push($all, $one);
}
echo json_encode($all);