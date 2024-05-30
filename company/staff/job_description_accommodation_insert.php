<?php
include('../server.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accommodation_employer_thai = mysqli_real_escape_string($conn, $_POST['accommodation_employer_thai']);
    $accommodation_employer_eng = mysqli_real_escape_string($conn, $_POST['accommodation_employer_eng']);
    $accommodation_address = mysqli_real_escape_string($conn, $_POST['accommodation_address']);
    $accommodation_subdistrict = mysqli_real_escape_string($conn, $_POST['accommodation_subdistrict']);
    $accommodation_district = mysqli_real_escape_string($conn, $_POST['accommodation_district']);
    $accommodation_province = mysqli_real_escape_string($conn, $_POST['accommodation_province']);
    $accommodation_zip = mysqli_real_escape_string($conn, $_POST['accommodation_zip']);
    $accommodation_phone = mysqli_real_escape_string($conn, $_POST['accommodation_phone']);
    $accommodation_fax = mysqli_real_escape_string($conn, $_POST['accommodation_fax']);
    $accommodation_email = mysqli_real_escape_string($conn, $_POST['accommodation_email']);
    $accommodation_manager_employer = mysqli_real_escape_string($conn, $_POST['accommodation_manager_employer']);
    $accommodation_maneger_position = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_position']);
    $accommodation_maneger_phone = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_phone']);
    $accommodation_maneger_fax = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_fax']);
    $accommodation_maneger_email = mysqli_real_escape_string($conn, $_POST['accommodation_maneger_email']);
    $accommodation_liaise_type = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_type']);
    $accommodation_liaise_fname = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_fname']);
    $accommodation_liaise_lname = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_lname']);
    $accommodation_liaise_position = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_position']);
    $accommodation_liaise_department = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_department']);
    $accommodation_liaise_phone = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_phone']);
    $accommodation_liaise_fax = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_fax']);
    $accommodation_liaise_email = mysqli_real_escape_string($conn, $_POST['accommodation_liaise_email']);
    $accommodation_supervisor_fname = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_fname']);
    $accommodation_supervisor_lname = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_lname']);
    $accommodation_supervisor_position = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_position']);
    $accommodation_supervisor_department = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_department']);
    $accommodation_supervisor_phone = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_phone']);
    $accommodation_supervisor_fax = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_fax']);
    $accommodation_supervisor_email = mysqli_real_escape_string($conn, $_POST['accommodation_supervisor_email']);
    $accommodation_assignment_std_prefix = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_std_prefix']);
    $accommodation_assignment_std_fname = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_std_fname']);
    $accommodation_assignment_std_lname = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_std_lname']);
    $accommodation_assignment_position = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_position']);
    $accommodation_assignment_description = mysqli_real_escape_string($conn, $_POST['accommodation_assignment_description']);
    $accommodation_accommodation_address = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_address']);
    $accommodation_accommodation_subdistrict = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_subdistrict']);
    $accommodation_accommodation_district = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_district']);
    $accommodation_accommodation_province = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_province']);
    $accommodation_accommodation_zip = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_zip']);
    $accommodation_accommodationl_phone = mysqli_real_escape_string($conn, $_POST['accommodation_accommodationl_phone']);
    $accommodation_accommodation_email = mysqli_real_escape_string($conn, $_POST['accommodation_accommodation_email']);
    $accommodation_emergency_fname = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_fname']);
    $accommodation_emergency_lname = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_lname']);
    $accommodation_emergency_address = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_address']);
    $accommodation_emergency_subdistrict = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_subdistrict']);
    $accommodation_emergency_district = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_district']);
    $accommodation_emergency_province = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_province']);
    $accommodation_emergency_zip = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_zip']);
    $accommodation_emergency_phone = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_phone']);
    $accommodation_emergency_email = mysqli_real_escape_string($conn, $_POST['accommodation_emergency_email']);

    
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["map"]["name"]);
    move_uploaded_file($_FILES["map"]["tmp_name"], $target_file);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["accommodation_std_signature_img"]["name"]);
    move_uploaded_file($_FILES["accommodation_std_signature_img"]["tmp_name"], $target_file);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["accommodation_staff_signature_img"]["name"]);
    move_uploaded_file($_FILES["accommodation_staff_signature_img"]["tmp_name"], $target_file);

    
    $sql = "INSERT INTO job_description_accommodation (accommodation_employer_thai, accommodation_employer_eng, accommodation_address, accommodation_subdistrict, accommodation_district, accommodation_province, 
    accommodation_zip, accommodation_phone, accommodation_fax, accommodation_email, accommodation_manager_employer, accommodation_maneger_position, accommodation_maneger_phone, accommodation_maneger_fax, 
    accommodation_maneger_email, accommodation_liaise_type, accommodation_liaise_fname, accommodation_liaise_lname, accommodation_liaise_position, accommodation_liaise_department, accommodation_liaise_phone, accommodation_liaise_fax, accommodation_liaise_email,
    accommodation_supervisor_fname, accommodation_supervisor_lname, accommodation_supervisor_position, accommodation_supervisor_department,accommodation_supervisor_phone, accommodation_supervisor_fax, accommodation_supervisor_email, accommodation_assignment_std_prefix, 
    accommodation_assignment_std_fname, accommodation_assignment_std_lname, accommodation_assignment_position, accommodation_assignment_description, accommodation_accommodation_address, accommodation_accommodation_subdistrict, accommodation_accommodation_district, 
    accommodation_accommodation_province, accommodation_accommodation_zip, accommodation_accommodationl_phone, accommodation_accommodation_email, accommodation_emergency_fname, accommodation_emergency_lname, accommodation_emergency_address, accommodation_emergency_subdistrict, 
    accommodation_emergency_district,  accommodation_emergency_province,  accommodation_emergency_zip, accommodation_emergency_phone, accommodation_emergency_email  ,created_at) 
    
    VALUES ('$accommodation_employer_thai', '$accommodation_employer_eng', '$accommodation_address', '$accommodation_subdistrict', '$accommodation_district', '$accommodation_province',
    '$accommodation_zip', '$accommodation_phone', '$accommodation_fax', '$accommodation_email', '$accommodation_manager_employer', '$accommodation_maneger_position', '$accommodation_maneger_phone', '$accommodation_maneger_fax', 
    '$accommodation_maneger_email', '$accommodation_liaise_type', '$accommodation_liaise_fname', '$accommodation_liaise_lname', '$accommodation_liaise_position', '$accommodation_liaise_department', '$accommodation_liaise_phone', '$accommodation_liaise_fax', '$accommodation_liaise_email',
    '$accommodation_supervisor_fname', '$accommodation_supervisor_lname', '$accommodation_supervisor_position', '$accommodation_supervisor_department','$accommodation_supervisor_phone', '$accommodation_supervisor_fax', '$accommodation_supervisor_email', '$accommodation_assignment_std_prefix',
    '$accommodation_assignment_std_fname', '$accommodation_assignment_std_lname', '$accommodation_assignment_position', '$accommodation_assignment_description', '$accommodation_accommodation_address','$accommodation_accommodation_subdistrict', '$accommodation_accommodation_district',
    '$accommodation_accommodation_province', '$accommodation_accommodation_zip', '$accommodation_accommodationl_phone', '$accommodation_accommodation_email', '$accommodation_emergency_fname', '$accommodation_emergency_lname', '$accommodation_emergency_address', '$accommodation_emergency_subdistrict',
    '$accommodation_emergency_district', '$accommodation_emergency_province', '$accommodation_emergency_zip', '$accommodation_emergency_phone', '$accommodation_emergency_email',  CURRENT_TIMESTAMP)";
 

    
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
    echo "    window.location ='./cooperative_petition.php';";
    echo "});";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    mysqli_close($conn);
}
}
?>