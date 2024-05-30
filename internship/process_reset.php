<?php
session_start();
include('server.php');

$message = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['otp'], $_POST['password'], $_POST['confirm_password'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $password = $_POST['password']; 
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $_SESSION['message'] = 'รหัสผ่านและรหัสยืนยันไม่ตรงกัน';
    } else {
        // Check database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM user_otp WHERE email = ? AND otp = ?");
        $stmt->bind_param("ss", $email, $otp);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $otpData = $result->fetch_assoc();
            $otpTimestamp = strtotime($otpData['timestamp']);
            $currentTimestamp = time();
            $otpValidityPeriod = 60 * 1;

            if (($currentTimestamp - $otpTimestamp) <= $otpValidityPeriod) {
                $updateStmt = $conn->prepare("UPDATE login_student SET password = ?, updated_at = NOW() WHERE email = ?");
                $updateStmt->bind_param("ss", $password, $email);

                if ($updateStmt->execute()) {
                    $isSuccess = true;
                    $_SESSION['message'] = 'รหัสผ่านของคุณได้รับการตั้งใหม่แล้ว';

                    $deleteStmt = $conn->prepare("DELETE FROM user_otp WHERE email = ?");
                    $deleteStmt->bind_param("s", $email);
                    $deleteStmt->execute();

                    header("Location: login_student.php?password_changed=true");
                    exit;
                } else {
                    $_SESSION['message'] = 'เกิดข้อผิดพลาดในการอัปเดตรหัสผ่าน';
                }
            } else {
                $_SESSION['message'] = 'รหัสยืนยันหมดอายุการใช้งาน';
            }
        } else {
            $_SESSION['message'] = 'OTP ไม่ถูกต้อง';
        }

        $conn->close();
    }
} else {
    $_SESSION['message'] = 'ข้อมูลไม่ครบถ้วนหรือไม่ถูกต้อง';
}

header("Location: login_student.php");
exit;
?>
