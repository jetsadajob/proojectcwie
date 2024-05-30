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

    $teacher_company_name = mysqli_real_escape_string($conn, $_POST['teacher_company_name']);
    $teacher_location = mysqli_real_escape_string($conn, $_POST['teacher_location']);
    $teacher_province = mysqli_real_escape_string($conn, $_POST['teacher_province']);
    $teacher_supervision_date = mysqli_real_escape_string($conn, $_POST['teacher_supervision_date']);
    $teacher_student_amount = mysqli_real_escape_string($conn, $_POST['teacher_student_amount']);
    $teacher_list_of_student = mysqli_real_escape_string($conn, $_POST['teacher_list_of_student']);
    // $teacher_signature = mysqli_real_escape_string($conn, $_POST['teacher_signature']);
    $teacher_list = mysqli_real_escape_string($conn, $_POST['teacher_list']);
    $teacher_std_name = mysqli_real_escape_string($conn, $_POST['teacher_std_name']);
    $teacher_std_id = mysqli_real_escape_string($conn, $_POST['teacher_std_id']);
    $teacher_field_of_study = mysqli_real_escape_string($conn, $_POST['teacher_field_of_study']);
    $teacher_adapt_to_the_organization = mysqli_real_escape_string($conn, $_POST['teacher_adapt_to_the_organization']);
    $teacher_learn_from_assigned_tasks = mysqli_real_escape_string($conn, $_POST['teacher_learn_from_assigned_tasks']);
    $teacher_nature_of_assigned_work = mysqli_real_escape_string($conn, $_POST['teacher_nature_of_assigned_work']);
    $teacher_knowledge = mysqli_real_escape_string($conn, $_POST['teacher_knowledge']);
    $teacher_participation_with_the_organization = mysqli_real_escape_string($conn, $_POST['teacher_participation_with_the_organization']);
    $teacher_student_satisfaction = mysqli_real_escape_string($conn, $_POST['teacher_student_satisfaction']);
    $teacher_satisfaction_with_welfare_received = mysqli_real_escape_string($conn, $_POST['teacher_satisfaction_with_welfare_received']);
    $teacher_additional_suggestions = mysqli_real_escape_string($conn, $_POST['teacher_additional_suggestions']);
    $teacher_company_name_two = mysqli_real_escape_string($conn, $_POST['teacher_company_name_two']);
    $teacher_executive = mysqli_real_escape_string($conn, $_POST['teacher_executive']);
    $teacher_human_resources_officer = mysqli_real_escape_string($conn, $_POST['teacher_human_resources_officer']);
    $teacher_job_supervisor = mysqli_real_escape_string($conn, $_POST['teacher_job_supervisor']);
    $teacher_workload = mysqli_real_escape_string($conn, $_POST['teacher_workload']);
    $teacher_quality_of_work = mysqli_real_escape_string($conn, $_POST['teacher_quality_of_work']);
    $teacher_the_work_is_safe = mysqli_real_escape_string($conn, $_POST['teacher_the_work_is_safe']);
    $teacher_coordination = mysqli_real_escape_string($conn, $_POST['teacher_coordination']);
    $teacher_there_is_an_orientation = mysqli_real_escape_string($conn, $_POST['teacher_there_is_an_orientation']);
    $teacher_staff_taking_care_of_students = mysqli_real_escape_string($conn, $_POST['teacher_staff_taking_care_of_students']);
    $teacher_staff_is_knowledgeable = mysqli_real_escape_string($conn, $_POST['teacher_staff_is_knowledgeable']);
    $teacher_staff_have_time_for_students = mysqli_real_escape_string($conn, $_POST['teacher_staff_have_time_for_students']);
    $teacher_staff_assigns_work = mysqli_real_escape_string($conn, $_POST['teacher_staff_assigns_work']);
    $teacher_work_plan_is_prepared = mysqli_real_escape_string($conn, $_POST['teacher_work_plan_is_prepared']);
    $teacher_there_is_compensation = mysqli_real_escape_string($conn, $_POST['teacher_there_is_compensation']);
    $teacher_provide_welfare = mysqli_real_escape_string($conn, $_POST['teacher_provide_welfare']);
    $teacher_there_is_equipment_readiness = mysqli_real_escape_string($conn, $_POST['teacher_there_is_equipment_readiness']);
    $teacher_give_importance_to_evaluation = mysqli_real_escape_string($conn, $_POST['teacher_give_importance_to_evaluation']);
    $teacher_overall_quality = mysqli_real_escape_string($conn, $_POST['teacher_overall_quality']);
    $teacher_additional_suggestions_two = mysqli_real_escape_string($conn, $_POST['teacher_additional_suggestions_two']);

    // ตัวแปรสำหรับเก็บเส้นทางไฟล์
    $teacher_signature_path = '';

    $target_dir = "../uploads/";
    
    if (isset($_FILES["teacher_signature"]) && $_FILES["teacher_signature"]["error"] == 0) {
        $teacher_signature_path = $target_dir . basename($_FILES["teacher_signature"]["name"]);
        move_uploaded_file($_FILES["teacher_signature"]["tmp_name"], $teacher_signature_path);
    }
    
    $sql = "INSERT INTO coop_supervision_recording_teacher_form (teacher_company_name, teacher_location, teacher_province, teacher_supervision_date, teacher_student_amount, teacher_list_of_student, 
    teacher_signature, teacher_list, teacher_std_name, teacher_std_id, teacher_field_of_study, teacher_adapt_to_the_organization, teacher_learn_from_assigned_tasks, teacher_nature_of_assigned_work, 
    teacher_knowledge, teacher_participation_with_the_organization, teacher_student_satisfaction, teacher_satisfaction_with_welfare_received, teacher_additional_suggestions, teacher_company_name_two, teacher_executive, teacher_human_resources_officer, teacher_job_supervisor,
    teacher_workload, teacher_quality_of_work, teacher_the_work_is_safe, teacher_coordination,teacher_there_is_an_orientation, teacher_staff_taking_care_of_students, teacher_staff_is_knowledgeable, teacher_staff_have_time_for_students, 
    teacher_staff_assigns_work, teacher_work_plan_is_prepared, teacher_there_is_compensation, teacher_provide_welfare, teacher_there_is_equipment_readiness, teacher_give_importance_to_evaluation, teacher_overall_quality, 
    teacher_additional_suggestions_two ,created_at) 
    
    VALUES ('$teacher_company_name', '$teacher_location', '$teacher_province', '$teacher_supervision_date', '$teacher_student_amount', '$teacher_list_of_student',
    '$teacher_signature', '$teacher_list', '$teacher_std_name', '$teacher_std_id', '$teacher_field_of_study', '$teacher_adapt_to_the_organization', '$teacher_learn_from_assigned_tasks', '$teacher_nature_of_assigned_work', 
    '$teacher_knowledge', '$teacher_participation_with_the_organization', '$teacher_student_satisfaction', '$teacher_satisfaction_with_welfare_received', '$teacher_additional_suggestions', '$teacher_company_name_two', '$teacher_executive', '$teacher_human_resources_officer', '$teacher_job_supervisor',
    '$teacher_workload', '$teacher_quality_of_work', '$teacher_the_work_is_safe', '$teacher_coordination','$teacher_there_is_an_orientation', '$teacher_staff_taking_care_of_students', '$teacher_staff_is_knowledgeable', '$teacher_staff_have_time_for_students',
    '$teacher_staff_assigns_work', '$teacher_work_plan_is_prepared', '$teacher_there_is_compensation', '$teacher_provide_welfare', '$teacher_there_is_equipment_readiness','$teacher_give_importance_to_evaluation', '$teacher_overall_quality',
    '$teacher_additional_suggestions_two', CURRENT_TIMESTAMP)";
 

    
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