<?php
session_start();

// $servername = "localhost";
// $username = "itwebsit_itweb126_projectcwie"; // or your database username
// $password = "Kt85gLyHOzgzEKosNw6s"; // or your database password
// $dbname = "itwebsit_itweb126_projectcwie";


// $conn = new mysqli($servername, $username, $password, $dbname);

$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าที่ส่งมาจากฟอร์มเข้าสู่ระบบ
    $txt_email = filter_var($_POST['txt_email'], FILTER_SANITIZE_EMAIL);
    $txt_password = $_POST['txt_password'];

    // ค้นหาผู้ใช้งานจากฐานข้อมูล
    $stmt = $conn->prepare("SELECT * FROM login_student WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $txt_email, $txt_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // ดึงข้อมูลผู้ใช้งาน
        $user = $result->fetch_assoc();
        
        // กำหนด session ของผู้ใช้งาน
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

       // ตรวจสอบบทบาทของผู้ใช้งานและเปลี่ยนเส้นทางตามบทบาท
         if ($user['role'] == 'cooperative_student') {
            header("Location: ./cooperative_student/cooperative_student_home.php");
            exit();
        } elseif ($user['role'] == 'internship_student') {
            header("Location: ../internship/internship_student/internship_student_home.php");
            exit();
        }
    } else {
        // ถ้าไม่พบข้อมูลผู้ใช้งาน แสดงป๊อปอัพแจ้งเตือนและกลับไปยังหน้าเข้าสู่ระบบ
        echo "<script>
                alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                window.location.href = 'login_student.php';
            </script>";
        exit();
    }
} else {
    // ถ้าไม่มีการส่งข้อมูลผ่าน POST กลับไปยังหน้าเข้าสู่ระบบ
    header("Location: login_student.php");
    exit();
}
?>
