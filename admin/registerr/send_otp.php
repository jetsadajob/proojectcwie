<?php
include('./server.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $otp = rand(100000, 999999);
    $timestamp = date('Y-m-d H:i:s'); // เวลาปัจจุบัน

    // เชื่อมต่อฐานข้อมูล

    // ตรวจสอบว่าอีเมลนี้มีอยู่ในฐานข้อมูลหรือไม่
    $checkStmt = $conn->prepare("SELECT * FROM user_otp WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    $checkStmt->close();

    // ถ้ามีอีเมลนี้ในฐานข้อมูล ให้ลบรหัส OTP เก่าออกจากฐานข้อมูล
    if ($checkResult->num_rows > 0) {
        $deleteStmt = $conn->prepare("DELETE FROM user_otp WHERE email = ?");
        $deleteStmt->bind_param("s", $email);
        $deleteStmt->execute();
        $deleteStmt->close();
    }

    // เพิ่มรหัส OTP ใหม่ลงในฐานข้อมูล
    $stmt = $conn->prepare("INSERT INTO user_otp (email, otp, timestamp) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $email, $otp, $timestamp);
    $stmt->execute();
    $stmt->close();

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;
        $mail->Username = 'ratanathida.mark@gmail.com'; // Your Gmail email address
        $mail->Password = 'bvvh urik lvdi umuw'; // Your Gmail password             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('ratanathida.mark@gmail.com', 'cwie cp kku');            
        $mail->addAddress($email); // ผู้รับ

        $mail->isHTML(true); // ตั้งค่าเนื้อหาเป็น HTML
        $mail->Subject = 'Reset Password OTP';
        $mail->Body    = 'Your OTP for password reset is ' . $otp;

        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    // Redirect หลังจากส่ง OTP สำเร็จ
    header("Location: reset_password.php?email=" . urlencode($email));
    exit;
} else {
    // ไม่ได้ส่งข้อมูลอีเมลมา ให้เปลี่ยนเส้นทางไปยังหน้า forgot_password.php หรือแสดงข้อผิดพลาด
    header("Location: ./forgot_password.php");
    exit;
}
?>
