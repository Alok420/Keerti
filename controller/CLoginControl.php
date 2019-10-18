<?php session_start();
   include '../Config/ConnectionObjectOriented.php';
   include '../Config/DB.php';

   $db = new DB($conn);
   if (isset($_POST["username"]) && isset($_POST["password"])) {
       $message = $db->login($_POST["username"], $_POST["password"], "login_credentials");
       $type = $_SESSION["loggedintype"];
       if ($message != "success") {
           header("location:../Login_User.php?message=$message");
       } else if ($message == "success") {
           if ($type == "candidate") {
               header("location:../student/StudentPage.php");
           } else if ($type == "employer") {
               header("location:../EmployerManagement/Recruiter_page.php");
           } else if ($type == "branch") {
               header("location:../Branch/BranchAdmin_page.php");
           } else if ($type == "mainbranch") {
               header("location:../RootAdminpanel/RootAdmin_page.php");
           }
       }
   }
