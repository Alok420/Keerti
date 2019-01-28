<?php
$conn = new mysqli('localhost','root', '', 'keerti');
if ($conn->connect_error){
    die("not connected") . $connect_error;
}
?>