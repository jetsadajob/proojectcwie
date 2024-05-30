<?php
include('./connect.php'); 
include('./include_sweetalert.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final_project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("การเชื่อมต่อกับฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    $company_std_name = mysqli_real_escape_string($conn, $_POST['company_std_name']);
    $company_std_id = mysqli_real_escape_string($conn, $_POST['company_std_id']);
    $company_field_of_study = mysqli_real_escape_string($conn, $_POST['company_field_of_study']);
    $company_job_responsibility = mysqli_real_escape_string($conn, $_POST['company_job_responsibility']);
    $company_enthusiasm = mysqli_real_escape_string($conn, $_POST['company_enthusiasm']);
    $company_quality_of_work = mysqli_real_escape_string($conn, $_POST['company_quality_of_work']);
    $company_take_time_to_work = mysqli_real_escape_string($conn, $_POST['company_take_time_to_work']);
    $company_operation = mysqli_real_escape_string($conn, $_POST['company_operation']);
    $company_use_knowledge	 = mysqli_real_escape_string($conn, $_POST['company_use_knowledge']);
    $company_apply_knowledge = mysqli_real_escape_string($conn, $_POST['company_apply_knowledge']);
    $company_expertise_in_operations = mysqli_real_escape_string($conn, $_POST['company_expertise_in_operations']);
    $company_the_ability_to_plan = mysqli_real_escape_string($conn, $_POST['company_the_ability_to_plan']);
    $company_interested_in_studying = mysqli_real_escape_string($conn, $_POST['company_interested_in_studying']);
    $company_work_according_to_the_rules = mysqli_real_escape_string($conn, $_POST['company_work_according_to_the_rules']);
    $company_come_to_work_on_time = mysqli_real_escape_string($conn, $_POST['company_come_to_work_on_time']);
    $company_give_respect = mysqli_real_escape_string($conn, $_POST['company_give_respect']);
    $company_be_diligent = mysqli_real_escape_string($conn, $_POST['company_be_diligent']);
    $company_have_morals = mysqli_real_escape_string($conn, $_POST['company_have_morals']);
    $company_have_initiative = mysqli_real_escape_string($conn, $_POST['company_have_initiative']);
    $company_have_confidence = mysqli_real_escape_string($conn, $_POST['company_have_confidence']);
    $company_behave_appropriately = mysqli_real_escape_string($conn, $_POST['company_behave_appropriately']);
    $company_work_as_a_team = mysqli_real_escape_string($conn, $_POST['company_work_as_a_team']);
    $company_use_organizational_resource = mysqli_real_escape_string($conn, $_POST['company_use_organizational_resource']);
    $company_quality_of_student = mysqli_real_escape_string($conn, $_POST['company_quality_of_student']);
    $company_additional_suggestions = mysqli_real_escape_string($conn, $_POST['company_additional_suggestions']);

    
    $sql = "INSERT INTO coop_supervision_recording_staff_form (company_std_name, company_std_id, company_field_of_study, company_job_responsibility, company_enthusiasm, company_quality_of_work, 
    company_take_time_to_work, company_operation, company_use_knowledge, company_apply_knowledge, company_expertise_in_operations, company_the_ability_to_plan, company_interested_in_studying, 
    company_work_according_to_the_rules, company_come_to_work_on_time, company_give_respect, company_be_diligent, company_have_morals, company_have_initiative, company_have_confidence, company_behave_appropriately, company_work_as_a_team,
    company_use_organizational_resource, company_quality_of_student, company_additional_suggestions ,created_at) 
    
    VALUES ('$company_std_name', '$company_std_id', '$company_field_of_study', '$company_job_responsibility', '$company_enthusiasm', '$company_quality_of_work',
    '$company_take_time_to_work', '$company_operation', '$company_use_knowledge	', '$company_apply_knowledge', '$company_expertise_in_operations', '$company_the_ability_to_plan', '$company_interested_in_studying', 
    '$company_work_according_to_the_rules', '$company_come_to_work_on_time', '$company_give_respect', '$company_be_diligent', '$company_have_morals', '$company_have_initiative', '$company_have_confidence', '$company_behave_appropriately', '$company_work_as_a_team',
    '$company_use_organizational_resource', '$company_quality_of_student', '$company_additional_suggestions', CURRENT_TIMESTAMP)";
 

    
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    // เพิ่มส่วนของ SweetAlert2 ที่แสดงเมื่อเพิ่มข้อมูลสำเร็จ
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>";
    echo "Swal.fire({";
    echo "    icon: 'success',";
    echo "    title: 'แจ้งเตือน',";
    echo "    text: 'เพิ่มข้อมูลสำเร็จ',";
    echo "    showConfirmButton: true"; // แสดงปุ่ม OK เพื่อให้ผู้ใช้คลิกเพื่อปิดหน้าต่าง
    echo "}).then(function () {";
    echo "    window.location ='./coop_supervision_recording_teacher_form.php';";
    echo "});";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
}

?>