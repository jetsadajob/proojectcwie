<?php
// include('./include_sweetalert.php');
include('../server.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $report_prefix = mysqli_real_escape_string($conn, $_POST['report_prefix']);
    $report_fname = mysqli_real_escape_string($conn, $_POST['report_fname']);
    $report_lname = mysqli_real_escape_string($conn, $_POST['report_lname']);
    $report_std_id = mysqli_real_escape_string($conn, $_POST['report_std_id']);
    $report_field_of_study = mysqli_real_escape_string($conn, $_POST['report_field_of_study']);
    $report_employer = mysqli_real_escape_string($conn, $_POST['report_employer']);
    $report_evaluator_name = mysqli_real_escape_string($conn, $_POST['report_evaluator_name']);
    $report_position = mysqli_real_escape_string($conn, $_POST['report_position']);
    $report_department = mysqli_real_escape_string($conn, $_POST['report_department']);
    $report_acknowledgement_score = mysqli_real_escape_string($conn, $_POST['report_acknowledgement_score']);
    $report_abstract_score = mysqli_real_escape_string($conn, $_POST['report_abstract_score']);
    $report_table_of_contents_score = mysqli_real_escape_string($conn, $_POST['report_table_of_contents_score']);
    $report_objectives_score = mysqli_real_escape_string($conn, $_POST['report_objectives_score']);
    $report_method_of_education_score = mysqli_real_escape_string($conn, $_POST['report_method_of_education_score']);
    $report_result_score = mysqli_real_escape_string($conn, $_POST['report_result_score']);
    $report_analysis_score = mysqli_real_escape_string($conn, $_POST['report_analysis_score']);
    $report_conclusion_score = mysqli_real_escape_string($conn, $_POST['report_conclusion_score']);
    $report_additional_comment_score = mysqli_real_escape_string($conn, $_POST['report_additional_comment_score']);
    $report_idiom_and_meaning_score = mysqli_real_escape_string($conn, $_POST['report_idiom_and_meaning_score']);
    $report_spelling_score = mysqli_real_escape_string($conn, $_POST['report_spelling_score']);
    $report_references_score = mysqli_real_escape_string($conn, $_POST['report_references_score']);
    $report_appendix_score = mysqli_real_escape_string($conn, $_POST['report_appendix_score']);
    $report_presentation_score = mysqli_real_escape_string($conn, $_POST['report_presentation_score']);
    $report_comment = mysqli_real_escape_string($conn, $_POST['report_comment']);
    

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["report_assessor_signature"]["name"]);
    move_uploaded_file($_FILES["report_assessor_signature"]["tmp_name"], $target_file);

    
    $sql = "INSERT INTO report_evaluation_form (report_prefix, report_fname, report_lname, report_std_id, report_field_of_study, 
    report_employer, report_evaluator_name, report_position, report_department, report_acknowledgement_score, report_abstract_score, report_table_of_contents_score, report_objectives_score, report_method_of_education_score, report_result_score, 
    report_analysis_score, report_conclusion_score, report_additional_comment_score, report_idiom_and_meaning_score, report_spelling_score, report_references_score, report_appendix_score, report_presentation_score, report_comment, created_at) 
    
    VALUES ('$report_prefix', '$report_fname', '$report_lname', '$report_std_id', '$report_field_of_study', '$report_employer',
    '$report_evaluator_name', '$report_position', '$report_department', '$report_acknowledgement_score', '$report_abstract_score', '$report_table_of_contents_score', '$report_objectives_score', '$report_method_of_education_score', '$report_result_score', 
    '$report_analysis_score', '$report_conclusion_score', '$report_additional_comment_score', '$report_idiom_and_meaning_score', '$report_spelling_score', '$report_references_score', '$report_appendix_score', '$report_presentation_score', '$report_comment', CURRENT_TIMESTAMP)";
 

    


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
    echo "    window.location ='./report_evaluation_form.php';";
    echo "});";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
}
?>