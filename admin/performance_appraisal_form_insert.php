<?php
include('../server.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appraisal_prefix = mysqli_real_escape_string($conn, $_POST['appraisal_prefix']);
    $appraisal_fname = mysqli_real_escape_string($conn, $_POST['appraisal_fname']);
    $appraisal_lname = mysqli_real_escape_string($conn, $_POST['appraisal_lname']);
    $appraisal_std_id = mysqli_real_escape_string($conn, $_POST['appraisal_std_id']);
    $appraisal_field_of_study = mysqli_real_escape_string($conn, $_POST['appraisal_field_of_study']);
    $appraisal_employer = mysqli_real_escape_string($conn, $_POST['appraisal_employer']);
    $appraisal_evaluator_name = mysqli_real_escape_string($conn, $_POST['appraisal_evaluator_name']);
    $appraisal_position = mysqli_real_escape_string($conn, $_POST['appraisal_position']);
    $appraisal_department = mysqli_real_escape_string($conn, $_POST['appraisal_department']);
    $appraisal_report_title_thai = mysqli_real_escape_string($conn, $_POST['appraisal_report_title_thai']);
    $appraisal_report_title_eng = mysqli_real_escape_string($conn, $_POST['appraisal_report_title_eng']);
    $quantity_of_work_score = mysqli_real_escape_string($conn, $_POST['quantity_of_work_score']);
    $quality_of_work_score = mysqli_real_escape_string($conn, $_POST['quality_of_work_score']);
    $ability_to_learn_score = mysqli_real_escape_string($conn, $_POST['ability_to_learn_score']);
    $practical_ability_score = mysqli_real_escape_string($conn, $_POST['practical_ability_score']);
    $judgment_score = mysqli_real_escape_string($conn, $_POST['judgment_score']);
    $communication_skills_score = mysqli_real_escape_string($conn, $_POST['communication_skills_score']);
    $responsibility_score = mysqli_real_escape_string($conn, $_POST['responsibility_score']);
    $interest_in_work_score = mysqli_real_escape_string($conn, $_POST['interest_in_work_score']);
    $initiative_score = mysqli_real_escape_string($conn, $_POST['initiative_score']);
    $response_to_supervision_score = mysqli_real_escape_string($conn, $_POST['response_to_supervision_score']);
    $personality_score = mysqli_real_escape_string($conn, $_POST['personality_score']);
    $interpersonal_skills_score = mysqli_real_escape_string($conn, $_POST['interpersonal_skills_score']);
    $discipline_score = mysqli_real_escape_string($conn, $_POST['discipline_score']);
    $ethics_score = mysqli_real_escape_string($conn, $_POST['ethics_score']);
    $appraisal_strength = mysqli_real_escape_string($conn, $_POST['appraisal_strength']);
    $appraisal_improvement = mysqli_real_escape_string($conn, $_POST['appraisal_improvement']);
    $appraisal_status_std = mysqli_real_escape_string($conn, $_POST['appraisal_status_std']);
    $appraisal_comment = mysqli_real_escape_string($conn, $_POST['appraisal_comment']);


    
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["appraisal_file"]["name"]);
    move_uploaded_file($_FILES["appraisal_file"]["tmp_name"], $target_file);


    $sql = "INSERT INTO performance_appraisal_form (appraisal_prefix, appraisal_fname, appraisal_lname, appraisal_std_id, appraisal_field_of_study, appraisal_employer, 
    appraisal_evaluator_name, appraisal_position, appraisal_department, appraisal_report_title_thai, appraisal_report_title_eng, quantity_of_work_score, quality_of_work_score, 
    ability_to_learn_score, practical_ability_score, judgment_score, communication_skills_score, responsibility_score, interest_in_work_score, initiative_score, response_to_supervision_score, personality_score,
    interpersonal_skills_score, discipline_score, ethics_score, appraisal_strength,appraisal_improvement, appraisal_status_std, appraisal_comment ,created_at) 
    
    VALUES ('$appraisal_prefix', '$appraisal_fname', '$appraisal_lname', '$appraisal_std_id', '$appraisal_field_of_study', '$appraisal_employer',
    '$appraisal_evaluator_name', '$appraisal_position', '$appraisal_department', '$appraisal_report_title_thai', '$appraisal_report_title_eng', '$quantity_of_work_score', '$quality_of_work_score', 
    '$ability_to_learn_score', '$practical_ability_score', '$judgment_score', '$communication_skills_score', '$responsibility_score', '$interest_in_work_score', '$initiative_score', '$response_to_supervision_score', '$personality_score',
    '$interpersonal_skills_score', '$discipline_score', '$ethics_score', '$appraisal_strength','$appraisal_improvement', '$appraisal_status_std', '$appraisal_comment',  CURRENT_TIMESTAMP)";
 

    
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
    echo "    window.location ='./performance_appraisal_form.php';";
    echo "});";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
}
?>