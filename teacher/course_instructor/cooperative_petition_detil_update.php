<?php

include('../server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าอีเมลและข้อมูลที่ต้องการอัพเดต
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $petition_date = mysqli_real_escape_string($conn, $_POST['petition_date']);
    $petition_semestor = mysqli_real_escape_string($conn, $_POST['petition_semestor']);
    $petition_academic_year = mysqli_real_escape_string($conn, $_POST['petition_academic_year']);
    $petition_opinions_of_professors_type = mysqli_real_escape_string($conn, $_POST['petition_opinions_of_professors_type']);
    $status_admin = mysqli_real_escape_string($conn, $_POST['status_admin']);

    // รับค่าไฟล์แนบและย้ายไฟล์ไปยังโฟลเดอร์ที่ต้องการ
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["petition_signatore_leture_img"]["name"]);
    move_uploaded_file($_FILES["petition_signatore_leture_img"]["tmp_name"], $target_file);

    // สร้างคำสั่ง SQL UPDATE
    $sql = "UPDATE petition_document SET ";
    $sql .= "petition_date = '$petition_date', ";
    $sql .= "petition_semestor = '$petition_semestor', ";
    $sql .= "petition_academic_year = '$petition_academic_year', ";
    $sql .= "petition_opinions_of_professors_type = '$petition_opinions_of_professors_type', ";
    $sql .= "petition_signatore_leture_img = '$target_file', "; // เพิ่มไฟล์แนบลงในฟิลด์ของตาราง
    $sql .= "status_admin = '$status_admin', "; // เพิ่มไฟล์แนบลงในฟิลด์ของตาราง
    $sql .= "updated_at = CURRENT_TIMESTAMP "; // เพิ่มวันที่และเวลาที่อัพเดต

    $sql .= "WHERE email = '$email'";

    // ทำการอัพเดตข้อมูลในฐานข้อมูล
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        // เพิ่มส่วนของ SweetAlert2 ที่แสดงเมื่ออัพเดตข้อมูลสำเร็จ
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>";
        echo "Swal.fire({";
        echo "    icon: 'success',";
        echo "    title: 'แจ้งเตือน',";
        echo "    text: 'อัพเดตข้อมูลสำเร็จ',";
        echo "    showConfirmButton: true"; // แสดงปุ่ม OK เพื่อให้ผู้ใช้คลิกเพื่อปิดหน้าต่าง
        echo "}).then(function () {";
        echo "    window.location ='./detilcoop.php';";
        echo "});";
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
    }
}
?>
