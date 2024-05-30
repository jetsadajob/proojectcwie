<?php
include('./include_sweetalert.php');
include('../server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!isset($_SESSION['internship_student_login'])) {
        echo "<script>Swal.fire('Error', 'Session not set', 'error');</script>";
        exit;
    }
    $email = $_SESSION['internship_student_login'];

    // อัปเดตโค้ดที่นี่เพื่อละเว้นการอัปเดต std_history_profile_img

    // คำสั่ง SQL สำหรับอัปเดตข้อมูลโดยไม่รวม std_history_profile_img
    $sql = "UPDATE student_history SET 
                std_history_prefix = ?,
                std_history_fname = ?,
                std_history_lname = ?,
                std_history_std_id = ?,
                std_history_field_of_study = ?,
                std_history_faculty = ?,
                std_history_birthday = ?,
                std_history_age = ?,
                std_history_race = ?,
                std_history_nationality = ?,
                std_history_religion = ?,
                std_history_address = ?,
                std_history_subdistrict = ?,
                std_history_district = ?,
                std_history_province = ?,
                std_history_zip = ?,
                std_history_original_address = ?,
                std_history_original_subdistrict = ?,
                std_history_original_district = ?,
                std_history_original_province = ?,
                std_history_original_zip = ?,
                std_history_fax = ?, 
                std_history_email = ?,
                std_history_father_fname = ?,
                std_history_father_lname = ?,
                std_history_father_occupation = ?,
                std_history_father_phone = ?,
                std_history_father_office = ?,
                std_history_mother_fname = ?,
                std_history_mother_lname = ?,
                std_history_mother_occupation = ?,
                std_history_mother_phone = ?,
                std_history_mother_office = ?,
                student_history_parent_address = ?,
                student_history_parent_subdistrict = ?,
                student_history_parent_district = ?,
                student_history_parent_province = ?,
                student_history_parent_zip = ?,
                student_history_apprentice = ?,
                std_history_start_date = ?,
                std_history_end_date = ?,
                std_history_talent = ?,
                std_history_computer_proficiency = ?,
                std_history_awards = ?,
                std_history_job_interest = ?,
                std_history_head_prefix = ?,
                std_history_head_fname = ?,
                std_history_head_lname = ?,
                std_history_head_phone = ?,
                std_history_acting_dean_prefix = ?,
                std_history_acting_dean_fname = ?,
                std_history_acting_dean_lname = ?,
                std_history_acting_dean_phone = ?,
                status_admin = 1 
            WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        echo "Error preparing statement: " . mysqli_error($conn);
        exit;
    }

    // ลดจำนวนพารามิเตอร์ที่ผูกกับ stmt ลงหนึ่งตัวเพื่อตรงกับการลบ std_history_profile_img
    mysqli_stmt_bind_param($stmt, 'sssssssssssssssssssssssssssssssssssssssssssss', 
        $_POST['std_history_prefix'], $_POST['std_history_fname'], $_POST['std_history_lname'], 
        $_POST['std_history_std_id'], $_POST['std_history_field_of_study'], $_POST['std_history_faculty'], 
        $_POST['std_history_birthday'], $_POST['std_history_age'], $_POST['std_history_race'], 
        $_POST['std_history_nationality'], $_POST['std_history_religion'], $_POST['std_history_address'], 
        $_POST['std_history_subdistrict'], $_POST['std_history_district'], $_POST['std_history_province'], 
        $_POST['std_history_zip'], $_POST['std_history_original_address'], $_POST['std_history_original_subdistrict'], 
        $_POST['std_history_original_district'], $_POST['std_history_original_province'], $_POST['std_history_original_zip'], 
        $_POST['std_history_fax'], $_POST['std_history_email'], $_POST['std_history_father_fname'], 
        $_POST['std_history_father_lname'], $_POST['std_history_father_occupation'], $_POST['std_history_father_phone'], 
        $_POST['std_history_father_office'], $_POST['std_history_mother_fname'], $_POST['std_history_mother_lname'], 
        $_POST['std_history_mother_occupation'], $_POST['std_history_mother_phone'], $_POST['std_history_mother_office'], 
        $_POST['student_history_parent_address'], $_POST['student_history_parent_subdistrict'], 
        $_POST['student_history_parent_district'], $_POST['student_history_parent_province'], 
        $_POST['student_history_parent_zip'], $_POST['student_history_apprentice'], $_POST['std_history_start_date'], 
        $_POST['std_history_end_date'], $_POST['std_history_talent'], $_POST['std_history_computer_proficiency'], 
        $_POST['std_history_awards'], $_POST['std_history_job_interest'], $_POST['std_history_head_prefix'], 
        $_POST['std_history_head_fname'], $_POST['std_history_head_lname'], $_POST['std_history_head_phone'], 
        $_POST['std_history_acting_dean_prefix'], $_POST['std_history_acting_dean_fname'], 
        $_POST['std_history_acting_dean_lname'], $_POST['std_history_acting_dean_phone'], $email);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>Swal.fire('แจ้งเตือน', 'อัปเดตข้อมูลสำเร็จ', 'success').then(function () {
            window.location ='./history_detail.php';
        });</script>";
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
