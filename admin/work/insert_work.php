<?php
include '../include_sweetalert.php';
include 'dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $recruitment_type_company = $_POST['recruitment_type_company'];
    $recruitment_company_name = $_POST['recruitment_company_name'];
    $recruitment_company_address = $_POST['recruitment_company_address'];
    $recruitment_company_subdistrict = $_POST['recruitment_company_subdistrict'];
    $recruitment_company_district = $_POST['recruitment_company_district'];
    $recruitment_company_province = $_POST['recruitment_company_province'];
    $recruitment_company_phone = $_POST['recruitment_company_phone'];
    $recruitment_company_email = $_POST['recruitment_company_email'];
    $recruitment_company_detail = $_POST['recruitment_company_detail'];
    $recruitment_company_form_of_work = $_POST['recruitment_company_form_of_work'];
    $recruitment_company_role = $_POST['recruitment_company_role'];
    $recruitment_company_amout = $_POST['recruitment_company_amout'];
    $recruitment_company_salary = $_POST['recruitment_company_salary'];
    $recruitment_company_experienc = $_POST['recruitment_company_experienc'];
    $recruitment_company_gender = $_POST['recruitment_company_gender'];
    $recruitment_company_education = $_POST['recruitment_company_education'];
    $recruitment_company_location = $_POST['recruitment_company_location'];
    $recruitment_company_detailjob = $_POST['recruitment_company_detailjob'];
    $recruitment_company_typejob = $_POST['recruitment_company_typejob'];
    $recruitment_company_zip = $_POST['recruitment_company_zip'];

    // ตรวจสอบและอัปโหลดไฟล์รูปภาพ
    $target_dir = "./uploads/";
    $imageFileName = basename($_FILES["recruitment_company_image"]["name"]);
    $fileFileName = basename($_FILES["recruitment_company_file"]["name"]);
    $target_file_image = $target_dir . $imageFileName;
    $target_file_file = $target_dir . $fileFileName;

    // ตรวจสอบไฟล์ที่อัปโหลด
    if ($imageFileName != '' && move_uploaded_file($_FILES["recruitment_company_image"]["tmp_name"], $target_file_image)) {
        // ไฟล์รูปถูกอัปโหลด
    } else {
        // ไฟล์รูปไม่ถูกอัปโหลด
        $target_file_image = ''; // ไม่มีไฟล์รูป
    }

    if ($fileFileName != '' && move_uploaded_file($_FILES["recruitment_company_file"]["tmp_name"], $target_file_file)) {
        // ไฟล์เอกสารถูกอัปโหลด
    } else {
        // ไฟล์เอกสารไม่ถูกอัปโหลด
        $target_file_file = ''; // ไม่มีไฟล์เอกสาร
    }

    // สร้างคำสั่ง SQL
    $sql = "INSERT INTO job_recruitment (
                recruitment_type_company, 
                recruitment_company_name, 
                recruitment_company_address, 
                recruitment_company_phone, 
                recruitment_company_email, 
                recruitment_company_detail, 
                recruitment_company_form_of_work, 
                recruitment_company_role, 
                recruitment_company_amout, 
                recruitment_company_salary, 
                recruitment_company_experienc, 
                recruitment_company_gender, 
                recruitment_company_education, 
                recruitment_company_location, 
                recruitment_company_detailjob, 
                recruitment_company_subdistrict, 
                recruitment_company_district, 
                recruitment_company_province, 
                recruitment_company_typejob, 
                recruitment_company_zip, 
                recruitment_company_image, 
                recruitment_company_file
            ) VALUES (
                '$recruitment_type_company', 
                '$recruitment_company_name', 
                '$recruitment_company_address', 
                '$recruitment_company_phone', 
                '$recruitment_company_email', 
                '$recruitment_company_detail', 
                '$recruitment_company_form_of_work', 
                '$recruitment_company_role', 
                '$recruitment_company_amout', 
                '$recruitment_company_salary', 
                '$recruitment_company_experienc', 
                '$recruitment_company_gender', 
                '$recruitment_company_education', 
                '$recruitment_company_location', 
                '$recruitment_company_detailjob', 
                '$recruitment_company_subdistrict', 
                '$recruitment_company_district', 
                '$recruitment_company_province', 
                '$recruitment_company_typejob', 
                '$recruitment_company_zip', 
                '$imageFileName', 
                '$fileFileName'
            )";

    // ประมวลผลคำสั่ง SQL
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "ประกาศงานสำเร็จ",
                type: "success"
            }, function() {
                window.location = "../hr.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';

        exit;
        
    } else {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาดไม่สามารถเพิ่มข่าวได้
            }, function() {
                window.location = "../hr.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
 
    }
    mysqli_close($conn);
}
?>


