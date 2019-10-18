<?php session_start(); ?>
<?php include './LoginCheck.php'; ?> 
<!DOCTYPE html>
<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
<?php include './recruiter_page.css'; ?>
        </style>
        <script>
//            $(function () {
//                $(".right-value").dblclick(function(){
//                            $(this).attr("contenteditable", 'true');
//                });
//                $("#update").click(function(){
//                    var id=$("#right_id").text();
//                    var organization_name=$("#right_Organization_Name").text();
//                    var type_of_organization=$("#right_Type_of_Organization").text();
//                    var date_of_incorporation=$("#right_Date_of_incorporation").text();
//                    var employee_strenght=$("#right_Employee_Strength").text();
//                    var branch_in_india=$("#right_branches_in_India").text();
//                    var branches_abroad=$("#right_branches_abroad").text();
//                    var male_female_employee_ratio=$("#right_Male_Female_employee_ratio").text();
//                    var contact_person=$("#right_contact_person").text();
//                    var contact_number=$("#right_Contact_number").text();
//                    var Alternate_contact_number1=$("#right_Alternate_contact_number1").text();
//                    var Alternate_contact_number2=$("#right_Alternate_contact_number2").text();
//                    var Email_ID=$("#right_Email_ID").text();
//                    var Fax=$("#right_Fax").text();
//                    var Address_office=$("#right_Address_office").text();
//                    var company_logo=$("#right_company_logo").text();
//                    $.post("../controller/update.php",
//                        {
//                            id: "" + id,
//                            organization_name: "" + organization_name,
//                            type_of_organization: "" + type_of_organization,
//                            date_of_incorporation: "" + date_of_incorporation,
//                            employee_strenght: "" + employee_strenght,
//                            branch_in_india: "" + branch_in_india,
//                            branches_abroad: "" + branches_abroad,
//                            male_female_employee_ratio: "" + male_female_employee_ratio,
//                            contact_person: "" + contact_person,
//                            contact_number: "" + contact_number,
//                            Alternate_contact_number1: "" + Alternate_contact_number1,
//                            Alternate_contact_number2: "" + Alternate_contact_number2,
//                            Email_ID: "" + Email_ID,
//                            Fax: "" + Fax,
//                            Address_office: "" + Address_office,
//                            company_logo: "" + company_logo,
//                            tbname:"employers"
//                        },
//                        function (data, status) {
//                            if (status == "success") {
//                                document.location.reload();
//                                alert();
//                            }
//                        });
//                });
//            });

        </script>
    </head>
    <body>
        <?php include './recruiter_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './recruiter_sidebar.php'; ?>
                </div>

                <div class="col-sm-9 maincolumn">
                    <?php
                    $updatelink = "UpdateProfile.php";
                    $deletelink = "UpdateProfile.php";
                    $db = new DB($conn);
                    $id = $_SESSION["loggedinid"];
                    $where = array("id" => $id);
                    $db->myProfile("employers", "*", $where);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
