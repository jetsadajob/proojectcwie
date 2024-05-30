<?php
include('server.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

    // Validate and sanitize input data
    $txt_role = $_POST['txt_role'];
    $txt_std_prefix = $_POST['txt_std_prefix'];
    $txt_std_fname = htmlspecialchars($_POST['txt_std_fname']);
    $txt_std_lname = htmlspecialchars($_POST['txt_std_lname']);
    $txt_std_id = $_POST['txt_std_id'];
    $txt_year_of_study = $_POST['txt_year_of_study'];
    $txt_major = $_POST['txt_major'];
    $txt_std_project = $_POST['txt_std_project'];
    $txt_email = filter_var($_POST['txt_email'], FILTER_SANITIZE_EMAIL);
    $txt_password = $_POST['txt_password'];

    // Create OTP
    $otp = rand(100000, 999999);

    $txt_role = $_POST['txt_role']; // รับค่า role จากฟอร์ม

// กำหนดค่า role ตามเงื่อนไข
if ($txt_role === 'นักศึกษาสหกิจศึกษา') {
    $role = 'cooperative_student';
} elseif ($txt_role === 'นักศึกษาฝึกงาน') {
    $role = 'internship_student';
} else {
    $role = 'other';
}

echo "Assigned role: " . $role; // ตรวจสอบค่า role หลังจากกำหนด

    


        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';  
            $mail->SMTPAuth   = true;
            $mail->Username = 'ratanathida.mark@gmail.com'; // Your Gmail email address
            $mail->Password = 'bvvh urik lvdi umuw'; // Your Gmail password             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->setFrom('ratanathida.mark@gmail.com', 'cwie cp kku');            
            $mail->addAddress($txt_email);
            $mail->isHTML(true);
            $mail->Subject = 'cwie cp kku otp';
            $mail->Body = 'รหัส OTP ของคุณคือ: ' . $otp;
            $mail->send();


            // บันทึกข้อมูลผู้ใช้และ OTP ลงในตารางชั่วคราว
            $stmt = $conn->prepare("INSERT INTO user_otp (role, std_prefix, std_fname, std_lname, std_id, year_of_study, major, std_project, email, password, otp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $role, $txt_std_prefix, $txt_std_fname, $txt_std_lname, $txt_std_id, $txt_year_of_study, $txt_major, $txt_std_project, $txt_email, $txt_password, $otp);

if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $stmt->error;
}


            


            header("Location: confirm_otp.php?email=" . urlencode($txt_email));
        } catch (Exception $e) {
        $alertType = 'error';
        $alertMessage = 'เกิดข้อผิดพลาดในการส่งอีเมล: ' . $mail->ErrorInfo;
    }
?>