<?php
session_start();
include('./include_sweetalert.php');
include('../server.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // ตรวจสอบว่ามีข้อมูลที่ได้จากฐานข้อมูลหรือไม่
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
    } else {
        echo "ไม่พบข้อมูลสำหรับ user_id นี้ในฐานข้อมูล";
    }
} else {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // จัดการกับการอัปโหลดไฟล์
    $target_dir = "../uploads/";
    $file_paths = [];

    if (isset($_FILES["coop_perental_consent_file"]) && $_FILES["coop_perental_consent_file"]["error"] == 0) {
        $filename = basename($_FILES["coop_perental_consent_file"]["name"]);
        $target_file = $target_dir . $filename;

        // ตรวจสอบและย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
        if (move_uploaded_file($_FILES["coop_perental_consent_file"]["tmp_name"], $target_file)) {
            $file_paths['coop_perental_consent_file'] = $filename;
        }
    }

    // ตรวจสอบว่ามีไฟล์ที่อัปโหลดหรือไม่
    if (count($file_paths) > 0) {
        $file_updates = [];
        foreach ($file_paths as $field_name => $file_path) {
            $file_updates[] = "$field_name = '".mysqli_real_escape_string($conn, $file_path)."'";
        }
        $file_updates_string = implode(', ', $file_updates);

        // รับค่าอีเมลจากเซสชัน
        

        // คำสั่ง SQL สำหรับอัปเดตข้อมูล
        $sql = "UPDATE coopperative_perental_consent_form SET 
                    $file_updates_string,
                    status_admin = 1
                WHERE email = '$email'";

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
            echo "    window.location ='./coopbook_detail.php';";
            echo "});";
            echo "</script>";
        } else {
            // แสดงข้อผิดพลาดหากมี
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
}
?>