<?php
include './work/dbwork.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $coop_report_term = mysqli_real_escape_string($conn, $_POST['coop_report_term']);
    $coop_report_year = mysqli_real_escape_string($conn, $_POST['coop_report_year']);
    $coop_report_prefix = mysqli_real_escape_string($conn, $_POST['coop_report_prefix']);
    $coop_report_fname = mysqli_real_escape_string($conn, $_POST['coop_report_fname']);
    $coop_report_lname = mysqli_real_escape_string($conn, $_POST['coop_report_lname']);
    $coop_report_stdid = mysqli_real_escape_string($conn, $_POST['coop_report_stdid']);
    $coop_report_year_of_study = mysqli_real_escape_string($conn, $_POST['coop_report_year_of_study']);
    $coop_report_company_name = mysqli_real_escape_string($conn, $_POST['coop_report_company_name']);
    $coop_report_address = mysqli_real_escape_string($conn, $_POST['coop_report_address']);
    $coop_report_subdistrict = mysqli_real_escape_string($conn, $_POST['coop_report_subdistrict']);
    $coop_report_district = mysqli_real_escape_string($conn, $_POST['coop_report_district']);
    $coop_report_protrict = mysqli_real_escape_string($conn, $_POST['coop_report_protrict']);
    $coop_report_zip = mysqli_real_escape_string($conn, $_POST['coop_report_zip']);
    $coop_report_staff_name = mysqli_real_escape_string($conn, $_POST['coop_report_staff_name']);
    $coop_report_position = mysqli_real_escape_string($conn, $_POST['coop_report_position']);
    $coop_report_job_description = mysqli_real_escape_string($conn, $_POST['coop_report_job_description']);
    $coop_report_what_received = mysqli_real_escape_string($conn, $_POST['coop_report_what_received']);
    $coop_report_knowledge = mysqli_real_escape_string($conn, $_POST['coop_report_knowledge']);
    $coop_report_participation = mysqli_real_escape_string($conn, $_POST['coop_report_participation']);
    $coop_report_satisfaction = mysqli_real_escape_string($conn, $_POST['coop_report_satisfaction']);
    $coop_report_assessment_type = mysqli_real_escape_string($conn, $_POST['coop_report_assessment_type']);
    $coop_report_reson = mysqli_real_escape_string($conn, $_POST['coop_report_reson']);
    $coop_report_rest_house_type = mysqli_real_escape_string($conn, $_POST['coop_report_rest_house_type']);
    $coop_report_accommodation_name = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_name']);
    $coop_report_expenses = mysqli_real_escape_string($conn, $_POST['coop_report_expenses']);
    $coop_report_accommodation_address = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_address']);
    $coop_report_accommodation_subdistrict = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_subdistrict']);
    $coop_report_accommodation_district = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_district']);
    $coop_report_accommodation_province = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_province']);
    $coop_report_accommodation_zip = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_zip']);
    $coop_report_accommodation_assessmont_type = mysqli_real_escape_string($conn, $_POST['coop_report_accommodation_assessmont_type']);
    $coop_report_choose = mysqli_real_escape_string($conn, $_POST['coop_report_choose']);
    $coop_report_working = mysqli_real_escape_string($conn, $_POST['coop_report_working']);
    $coop_report_colleage = mysqli_real_escape_string($conn, $_POST['coop_report_colleage']);
    $coop_report_travel = mysqli_real_escape_string($conn, $_POST['coop_report_travel']);
    $coop_report_safaty = mysqli_real_escape_string($conn, $_POST['coop_report_safaty']);
    $coop_report_other = mysqli_real_escape_string($conn, $_POST['coop_report_other']);
    $coop_report_other_suggestions = mysqli_real_escape_string($conn, $_POST['coop_report_other_suggestions']);


// คุณสามารถทำการเดียวกันกับไฟล์อื่นๆ

    // สร้างสตริงสำหรับการอัปเดตฐานข้อมูล
    //$file_updates = [];
    //foreach ($file_paths as $field_name => $file_path) {
        //$file_updates[] = "$field_name = '" . mysqli_real_escape_string($conn, $file_path) . "'";
   // }
   //$file_updates_string = count($file_updates) > 0 ? ', ' . implode(', ', $file_updates) : '';

    // คำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE coopperative_education_report_form SET 
                coop_report_term = '$coop_report_term', 
                coop_report_year = '$coop_report_year', 
                coop_report_prefix = '$coop_report_prefix',
                coop_report_fname = '$coop_report_fname',
                coop_report_lname = '$coop_report_lname',
                coop_report_stdid = '$coop_report_stdid',
                coop_report_year_of_study = '$coop_report_year_of_study',
                coop_report_company_name = '$coop_report_company_name',
                coop_report_address = '$coop_report_address',
                coop_report_subdistrict = '$coop_report_subdistrict',
                coop_report_district = '$coop_report_district',
                coop_report_protrict = '$coop_report_protrict',
                coop_report_zip = '$coop_report_zip',
                coop_report_staff_name = '$coop_report_staff_name',
                coop_report_position = '$coop_report_position',
                coop_report_job_description = '$coop_report_job_description',
                coop_report_what_received = '$coop_report_what_received',
                coop_report_knowledge = '$coop_report_knowledge',
                coop_report_participation = '$coop_report_participation',
                coop_report_satisfaction = '$coop_report_satisfaction',
                coop_report_assessment_type = '$coop_report_assessment_type', 
                coop_report_reson = '$coop_report_reson', 
                coop_report_rest_house_type = '$coop_report_rest_house_type',
                coop_report_accommodation_name = '$coop_report_accommodation_name',
                coop_report_expenses = '$coop_report_expenses',
                coop_report_accommodation_address = '$coop_report_accommodation_address',
                coop_report_accommodation_subdistrict = '$coop_report_accommodation_subdistrict',
                coop_report_accommodation_district = '$coop_report_accommodation_district',
                coop_report_accommodation_province = '$coop_report_accommodation_province',
                coop_report_accommodation_zip = '$coop_report_accommodation_zip',
                coop_report_accommodation_assessmont_type = '$coop_report_accommodation_assessmont_type',
                coop_report_choose = '$coop_report_choose',
                coop_report_working = '$coop_report_working',
                coop_report_colleage = '$coop_report_colleage',
                coop_report_travel = '$coop_report_travel',
                coop_report_safaty = '$coop_report_safaty',
                coop_report_other = '$coop_report_other',
                coop_report_other_suggestions = '$coop_report_other_suggestions'";

    // ตรวจสอบและทำการอัปเดตข้อมูล
    if (mysqli_query($conn, $sql)) {
        // แสดง SweetAlert สำหรับอัปเดตสำเร็จ
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'อัปเดตข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true";
        echo "}).then(function () {";
        echo "    window.location ='./education_detail.php';";
        echo "});";
        echo "</script>";
    } else {
        // แสดงข้อผิดพลาดหากมี
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>


<?php
include '../internship/internship_student/server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า 'email' จากฟอร์ม
    $email = $_POST['email'];

    // รับค่า 'status_admin' จากฟอร์ม
    $status_admin = $_POST['status_admin'];

    // รับค่า 'comment' จากฟอร์ม
    $comment = $_POST['comment'];

    // ใช้คำสั่ง SQL UPDATE เพื่ออัปเดตข้อมูล
    $sql = "UPDATE  SET 
    comment='$comment',
    status_admin='$status_admin'
    WHERE email='$email'";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: detilcoop_success2.php?id=$email"); // ส่งกลับไปยังหน้า detilinterns.php พร้อมกับ id
        exit;
    } else {
        echo "error"; // ส่งข้อความกลับไปยัง JavaScript เพื่อบอกว่าอัปเดตไม่สำเร็จ
    }

}

mysqli_close($conn);
?>
