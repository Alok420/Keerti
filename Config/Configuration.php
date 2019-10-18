<?php

class Configuration {

    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function tablesdata() {
        $tables = array(
            "candidates" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "fname" => "varchar:20", "lname" => "varchar:20", "dob" => "date", "caddress" => "varchar:1000", "paddress" => "varchar:1000", "pcode" => "varchar:10", "city" => "varchar:30", "state" => "varchar:50", "country" => "varchar:50", "mnumber" => "varchar:11", "lnumber" => "varchar:12", "email" => "varchar:50", "gender" => "varchar:10", "mstatus" => "int:10", "passportno" => "varchar:20", "passportvalidtill" => "date", "workpermitforothercountries" => "int:10", "permittedcountrynames" => "text", "phychallenged" => "int:10", "phychallengeddetail" => "varchar:500", "dp" => "varchar:500", "resume_approval" => "int:1"),
            "login_credentials" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "user_name" => "varchar:20:unique", "password" => "text", "creation_date" => "date", "status" => "int:1", "bapproval" => "int", "mbapproval" => "int"),
            "employers" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "Organization_Name" => "varchar:50", "Type_of_organization" => "varchar:20", "Date_of_incorporation" => "date", "Employee_Strength" => "int", "branches_in_India" => "int", "branches_abroad" => "int", "Male_Female_employee_ratio" => "varchar:6", "contact_person" => "varchar:50", "Contact_number" => "varchar:12", "Alternate_contact_number1" => "varchar:12", "Alternate_contact_number2" => "varchar:12", "Email_ID" => "varchar:50", "Fax" => "varchar:100", "Address_office" => "varchar:500", "company_logo" => "varchar:1000"),
            "branches" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:50", "pcontact" => "varchar:12", "scontact" => "varchar:12", "email" => "varchar:50"),
            "mainbranch" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:50", "pcontact" => "varchar:12", "email" => "varchar:50"),
            "jobpost" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "postedby" => "varchar:30", "no_of_posting_vacancy" => "int:8", "job_posted_on" => "date", "vacancy_valid_till" => "date", "package_range_offered" => "10", "experience_required" => "2", "jobdescription" => "text", "desired_skill_set" => "text", "job_title" => "varchar:200", "Package_Ranged_Offered" => "int"),
            "education" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "basic_qualification" => "varchar:30", "fulltime_parttime" => "varchar:30", "specialization" => "varchar:50", "university_board_institute" => "varchar:50", "year_of_passing" => "varchar:5"),
            "professional_details" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "industry_you_belong_to" => "varchar:10", "designation" => "varchar:50"),
            "skill_Set" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "skill" => "varchar:10", "year_experience" => "int:5", "skill_last_used_year_month" => "int:10"),
            "professional_experience_detail" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "employer_name" => "varchar:10", "employment_type" => "varchar:20", "tenor" => "varchar:30", "designation" => "varchar:50", "jobprofile_role" => "varchar:50", "status_previous_current_employer" => "varchar:30"),
            "project_detail" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "project_name" => "varchar:10", "client_name" => "varchar:10", "project_duration" => "varchar:10", "role" => "varchar:20", "team_size" => "int:10", "short_description" => "varchar:50"),
            "language_known" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "user_language" => "varchar:20", "user_read" => "int:1", "user_write" => "int:1", "user_speak" => "int:1"),
            "job_preference" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "job_type" => "varchar:20", "employment_type" => "varchar:50", "will_to_work_in_shifts" => "varchar:20", "relocate" => "varchar:20", "prefered_location" => "varchar:500"),
            "upload_other_data" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "upload_letter" => "text:500", "upload_resume" => "text:500", "self_introduction" => "text:500", "profiletitle" => "varchar:100", "video_approval" => "int:1"),
            "remuneration_details" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "current_ctc" => "int:10", "expected_ctc" => "int:10"),
            "references_" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "ref_name" => "varchar:20", "contact_no" => "int:12", "ref_email" => "varchar:20", "organization" => "varchar:20", "refdesignation" => "varchar:20"),
            "hiring" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "date_" => "date", "branchapproval" => "int", "employerapproval" => "int", "requestedBy" => "varchar:20"),
            "appointment" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "appontment_creating_date" => "datetime", "candidates_appointment_date" => "date", "candidates_appointment_time" => "time", "candidates_approval" => "int", "description" => "text", "appointment_status" => "varchar:50"),
            "feedback" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "reason" => "varchar:60", "description" => "text"),
            "chat" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "sender_id" => "int", "receiver_id" => "int", "mesaage" => "text", "mdate" => "date", "senderuseretype" => "varchar:30", "receiveruseretype" => "varchar:30", "mtime" => "time", "seen" => "varchar:30"),
            "subscription" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "email" => "varchar:50", "joindatae" => "date"),
            "notification" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "date_" => "DATETIME", "notification_text" => "varchar:500", "user_id" => "int", "user_type" => "int"),
            "notification_seen" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "date_" => "DATETIME"),
            "privacy_policy" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "title" => "varchar:1000","description"=>"text"),
            "faq" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "title" => "varchar:1000","description"=>"text"),
            "news" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "title" => "varchar:1000","description"=>"text"),
            "notification_source_mail" => array("id" => "int:10:PRIMARY KEY AUTO_INCREMENT", "mail" => "varchar:100","password"=>"varchar:100")
        );
        return $tables;
    }

    function tableRelation() {
        $rtable = array(
//            "appointment" => "feedback:cascade:cascade",
//            "mainbranch" => "branches:cascade:cascade",
//            "hiring" => "appointment:cascade:cascade",
//            "notification" => "notification_seen:cascade:cascade",
//            "employers" => "notification_seen:cascade:cascade",
//            "mainbranch" => "notification_seen:cascade:cascade",
//            "branches" => "notification_seen:cascade:cascade",
//            "candidates" => "notification_seen:cascade:cascade",
//            "employers" => "notification:cascade:cascade",
//            "mainbranch" => "notification:cascade:cascade",
//            "branches" => "notification:cascade:cascade",
//            "candidates" => "notification:cascade:cascade",
//            "candidates" => "hiring:cascade:cascade",
//            "jobpost" => "hiring:cascade:cascade",
//            "employers" => "hiring:cascade:cascade",
//            "candidates" => "education:cascade:cascade",
//            "candidates" => "professional_details:cascade:cascade",
//            "candidates" => "skill_Set:cascade:cascade",
//            "candidates" => "professional_experience_detail:cascade:cascade",
//            "candidates" => "project_detail:cascade:cascade",
//            "candidates" => "language_known:cascade:cascade",
//            "candidates" => "job_preference:cascade:cascade",
//            "candidates" => "upload_other_data:cascade:cascade",
//            "candidates" => "remuneration_details:cascade:cascade",
//            "candidates" => "references_:cascade:cascade",
//            "employers" => "jobpost:cascade:cascade",
//            "branches" => "candidates:cascade:cascade",
//            "candidates" => "login_credentials:cascade:cascade"
//            "employers" => "login_credentials:cascade:cascade",
//            "branches" => "login_credentials:cascade:cascade",
            "mainbranch" => "login_credentials:cascade:cascade",
        );
        return $rtable;
    }

    function configure($create_relate = "creation", $operation = "create") {
        $db = new DB($this->conn);
        ini_set('max_execution_time', 300);
        if ($create_relate == "creation") {
            $info = $db->loadTables($this->tablesdata(), $operation);
        } else if ($create_relate == "relation") {
            $info = $db->relateTable($this->tableRelation());
        }
        return $info;
    }

}
