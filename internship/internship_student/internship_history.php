<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "itwebsit_itweb126_projectcwie"; // or your database username
$password = "Kt85gLyHOzgzEKosNw6s"; // or your database password
$dbname = "itwebsit_itweb126_projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($std = mysqli_fetch_assoc($result)) {
    $email = $std['email'];

    $sql = "SELECT *
    FROM login_student
    JOIN student_history ON login_student.email = student_history.email
    WHERE login_student.email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
} else {
    echo "ไม่พบผู้ใช้";
}


$sql2 = "SELECT * FROM login_student WHERE id = '$user_id'";
$result2 = mysqli_query($conn, $sql2);
$std = mysqli_fetch_array($result2);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัตินักศึกษา</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <title>ประวัตินักศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/internship.css">

    <style>
        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            margin-left: 25px;
            padding-top: 65px;
        }
    </style>

</head>

<body>
    <div class="main-wrapper">
        <?php
        include('./navbar_menu.php');

        ?>

        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../internship_student/internship_student_home.php">แบบฟอร์มฝึกงาน</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ประวัตินักศึกษา</li>
                </ol>
            </nav>
            <div class="content container-fluid">

                <div class="fw-semibold text-center">
                    ประวัตินักศึกษา
                </div><br>

                <!-- form -->
                <form class="row g-3" action="./internship_history_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                            <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z" />
                        </svg>&nbsp;รูปภาพ</div>
                    <div class="col-md-12">
                        <label class="require" for="formFile" class="form-label">เลือกรูปภาพ</label>
                        <input class="form-control" type="file" id="formFile" name="std_history_profile_img" required>
                    </div>

                    <div class="col-md-2">
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="std_history_prefix" >
                            <option selected><?php echo isset($std['std_prefix']) ? $std['std_prefix'] : ''; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_fname" value="<?php echo isset($std['std_fname']) ? $std['std_fname'] : ''; ?> " >
                    </div>

                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_lname" value="<?php echo isset($std['std_lname']) ? $std['std_lname'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="studentIdInput" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="6xxxxxxxx-x" name="std_history_std_id" value="<?php echo isset($std['std_id']) ? $std['std_id'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="std_history_field_of_study" >
                            <option selected><?php echo isset($std['major']) ? $std['major'] : ''; ?></option>
                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                            <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                            <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                            <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputState" class="form-label">คณะ</label>
                        <select id="inputState" class="form-select" name="std_history_faculty" >
                            <option value="cpkku">วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="male" class="form-lable">วัน/เดือน/ปีเกิด</label>
                        <input type="date" class="form-control" id="birthdate" name="std_history_birthday" value="<?php echo isset($std['std_birthday']) ? $std['std_birthday'] : ''; ?>"  onchange="validateBirthdate()">
                        <div id="birthdateError" class="text-danger"></div>
                    </div>
                    <!-- <div class="col-md-6">
                        <label class="require" for="male" class="form-lable">วัน/เดือน/ปีเกิด</label>
                        <input type="date" class="form-control" id="birthdate" name="std_history_birthday" required>
                    </div> -->
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">อายุ</label>
                        <input type="text" class="form-control" id="age" name="std_history_age" readonly value="<?php echo isset($std['std_age']) ? $std['std_age'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เชื้อชาติ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="เชื้อชาติ" name="std_history_race" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">สัญชาติ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สัญชาติ" name="std_history_nationality" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">ศาสนา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ศาสนา" name="std_history_religion" required>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 bg-secondary text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg>&nbsp;ที่อยู่ปัจจุบัน</div>

                    <div class="col-12">
                        <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="std_history_address" required>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="std_history_subdistrict" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="std_history_district" required>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="std_history_province" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="รหัสไปรษณีย์" name="std_history_zip" required pattern="[0-9]{5}">
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg>&nbsp;ภูมิลำเนาเดิม</div>

                    <div class="col-6">
                        <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="std_history_original_address" required>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="std_history_original_subdistrict" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="std_history_original_district" required>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="std_history_original_province" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputoriginalZip" placeholder="รหัสไปรษณีย์" name="std_history_original_zip" required pattern="[0-9]{5}">
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="phoneoriginalInput" class="form-label">เบอร์โทรที่สามารถติดต่อได้</label>
                        <input type="tel" class="form-control" id="phoneoriginalInput" placeholder="กรอกเบอร์เลขโทร" name="std_history_original_phone" pattern="[0-9]{10}">
                    </div>

                    <!-- <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-lable">เบอร์โทรที่สามารถติดต่อได้</label>
                        <input type="tel" class="form-control" id="phone" name="std_history_phone" required placeholder="กรอกเบอร์โทรสาร">
                    </div> -->
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="std_history_email" placeholder="xxxxxxxx@gmail.com">
                    </div>


                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>&nbsp;ข้อมูลบิดา</div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_father_fname" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_father_lname" required>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">อาชีพ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อาชีพ" name="std_history_father_occupation">
                    </div>
                    <div class="col-md-6">
                        <label for="phonefatherInput" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phonefatherInput" placeholder="กรอกหมายเลขโทรศัพท์" name="std_history_father_phone" pattern="[0-9]{10}">
                    </div>

                    <div class="col-md-12">
                        <label for="inputtext" class="form-label">สถานที่ทำงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานที่ทำงาน" name="std_history_father_office">
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>&nbsp;ข้อมูลมารดา</div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_mother_fname" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_mother_lname" required>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">อาชีพ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อาชีพ" name="std_history_mother_occupation">
                    </div>
                    <div class="col-md-6">
                        <label for="phonemotherInput" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phonemotherInput" placeholder="กรอกหมายเลขโทรศัพท์" name="std_history_mother_phone" pattern="[0-9]{10}">
                    </div>

                    <div class="col-md-12">
                        <label for="inputtext" class="form-label">สถานที่ทำงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานที่ทำงาน" name="std_history_mother_office">
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg>&nbsp;ที่อยู่ที่สามารถติดต่อได้</div>

                    <div class="col-12">
                        <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="student_history_parent_address" required>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="student_history_parent_subdistrict" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="student_history_parent_district" required>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="student_history_parent_province" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputZip1" placeholder="รหัสไปรษณีย์" name="student_history_parent_zip" required pattern="[0-9]{5}">
                    </div>

                    

                    <div class="title" class="p-2 mb-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5" />
                        </svg>&nbsp;ระยะเวลาฝึกงาน</div>

                    <div class="col-md-6">
                        <label class="require" for="male" class="form-lable">จาก</label>
                        <input type="date" class="form-control" id="male" name="std_history_start_date" required>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="male" class="form-lable">ถึง</label>
                        <input type="date" class="form-control" id="male" name="std_history_end_date" required>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="require" for="inputtext" class="form-label">เข้าฝึกงานทางด้านใด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="เข้าฝึกงานทางด้านใด" name="student_history_apprentice" required>
                    </div>
                    <div class="mb-3">
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ความสามารถพิเศษ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความสามารถพิเศษ" name="std_history_talent" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ความสามารถทางคอมพิวเตอร์</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความสามารถทางคอมพิวเตอร์" name="std_history_computer_proficiency" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">กิจกรรมระหว่างศึกษา/ประสบการณ์การททำงานอย่างอื่น/รางวัลที่ได้รับ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="กิจกรรมระหว่างศึกษา/ประสบการณ์การททำงานอย่างอื่น/รางวัลที่ได้รับ" name="std_history_awards" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ลักษณะงานที่สนใจ/โครงการอาชีพในอนาคต</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ลักษณะงานที่สนใจ/โครงการอาชีพในอนาคต" name="std_history_job_interest" required></textarea>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>&nbsp;หัวหน้าสาขาวิชาวิทยาการคอมพิวเตอร์</div>

                    <div class="col-md-2">
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="std_history_head_prefix" required>
                            <option selected>-- เลือก --</option>
                            <option value="ศ. ดร.">ศ. ดร.</option>
                            <option value="รศ. ดร.">รศ. ดร.</option>
                            <option value="ผศ. ดร.">ผศ. ดร.</option>
                            <option value="อ. ดร.">อ. ดร.</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_head_fname" required>
                    </div>

                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_head_lname" required>
                    </div>

                    <div class="col-md-6">
                        <label for="phoneheadInput" class="form-label">เบอร์โทรติดต่อ (หัวหน้า)</label>
                        <input type="tel" class="form-control" id="phoneheadInput" placeholder="กรอกหมายเลขโทรศัพท์" name="std_history_head_phone" pattern="[0-9]{10}">
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>&nbsp;รักษาการแทนคณบดีวิทยาลัยการคอมพิวเตอร์</div>

                    <div class="col-md-2">
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="std_history_acting_dean_prefix" required>
                            <option selected>-- เลือก --</option>
                            <option value="ศ. ดร.">ศ. ดร.</option>
                            <option value="รศ. ดร.">รศ. ดร.</option>
                            <option value="ผศ. ดร.">ผศ. ดร.</option>
                            <option value="อ. ดร.">อ. ดร.</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_acting_dean_fname" required>
                    </div>

                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_acting_dean_lname" required>
                    </div>

                    <div class="col-md-6">
                        <label for="phonedeanInput" class="form-label">เบอร์โทรติดต่อ (คณบดี)</label>
                        <input type="tel" class="form-control" id="phonedeanInput" placeholder="กรอกหมายเลขโทรศัพท์" name="std_history_acting_dean_phone" pattern="[0-9]{10}">
                    </div>


                    <br>
                    <div class="button text-right">
                        <button type="button" class="btn btn-danger" data-toggle="button" aria-pressed="false">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-success" data-toggle="button" aria-pressed="false">
                            บันทึก
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- เช็ครหัสนักศึกษา -->
    <script>
        document.getElementById('studentIdInput').addEventListener('input', function(e) {
            var input = e.target.value.replace(/\D/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            if (input.length > 9) {
                input = input.substring(0, 9) + "-" + input.substring(9);
            }
            e.target.value = input.slice(0, 11); // จำกัดความยาวที่ 11 รวมกับ '-'
        });
    </script>

    <!-- เช็คปีที่กรอก -->
    <script>
        function validateBirthdate() {
            var birthdateInput = document.getElementById('birthdate');
            var birthdateError = document.getElementById('birthdateError');

            var selectedDate = new Date(birthdateInput.value);
            var maxDate = new Date('2018-12-31'); // ปี 2018-12-31 แทนค่าที่คุณต้องการ

            if (selectedDate > maxDate) {
                birthdateError.innerHTML = 'ปีเกิดต้องไม่มากกว่า 2018';
                birthdateInput.value = ''; // ล้างค่า input
            } else {
                birthdateError.innerHTML = '';
            }
        }
    </script>

    <!--เช็ครหัสไปรษณีย์ -->
    <script>
        document.getElementById('inputZip').addEventListener('input', function(e) {
            var zip = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = zip.slice(0, 5); // จำกัดจำนวนตัวเลขไม่เกิน 5 ตัว
        });
        document.getElementById('inputZip1').addEventListener('input', function(e) {
            var zip = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = zip.slice(0, 5); // จำกัดจำนวนตัวเลขไม่เกิน 5 ตัว
        });
        document.getElementById('inputoriginalZip').addEventListener('input', function(e) {
            var zip = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = zip.slice(0, 5); // จำกัดจำนวนตัวเลขไม่เกิน 5 ตัว
        });

        document.getElementById('inputoriginalZip').addEventListener('blur', function(e) {
            var zip = e.target.value;
            if (zip.length !== 5) {
                alert('กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง (5 หลัก)');
            }
        });
        document.getElementById('inputZip').addEventListener('blur', function(e) {
            var zip = e.target.value;
            if (zip.length !== 5) {
                alert('กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง (5 หลัก)');
            }
        });
        document.getElementById('inputZip1').addEventListener('blur', function(e) {
            var zip = e.target.value;
            if (zip.length !== 5) {
                alert('กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง (5 หลัก)');
            }
        });
    </script>

    <!-- เช็คหมายเลขโทรศัพท์ -->

    <script>
        var phoneoriginalInput = document.getElementById('phoneoriginalInput');
        var phonefatherInput = document.getElementById('phonefatherInput');
        var phonemotherInput = document.getElementById('phonemotherInput');
        var phoneheadInput = document.getElementById('phoneheadInput');
        var phonedeanInput = document.getElementById('phonedeanInput');

        phoneoriginalInput.addEventListener('input', function(e) {
            var phone = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = phone.slice(0, 10); // จำกัดจำนวนตัวเลขไม่เกิน 10 ตัว
        });

        phonefatherInput.addEventListener('input', function(e) {
            var phone = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = phone.slice(0, 10); // จำกัดจำนวนตัวเลขไม่เกิน 10 ตัว
        });
        phonemotherInput.addEventListener('input', function(e) {
            var phone = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = phone.slice(0, 10); // จำกัดจำนวนตัวเลขไม่เกิน 10 ตัว
        });
        phoneheadInput.addEventListener('input', function(e) {
            var phone = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = phone.slice(0, 10); // จำกัดจำนวนตัวเลขไม่เกิน 10 ตัว
        });
        phonedeanInput.addEventListener('input', function(e) {
            var phone = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            e.target.value = phone.slice(0, 10); // จำกัดจำนวนตัวเลขไม่เกิน 10 ตัว
        });

        phoneoriginalInput.addEventListener('blur', function(e) {
            var phone = e.target.value;
            if (phone.length !== 10) {
                alert('กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง (10 หลัก)');
            }
        });

        phonefatherInput.addEventListener('blur', function(e) {
            var phone = e.target.value;
            if (phone.length !== 10) {
                alert('กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง (10 หลัก)');
            }
        });
        phonemotherInput.addEventListener('blur', function(e) {
            var phone = e.target.value;
            if (phone.length !== 10) {
                alert('กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง (10 หลัก)');
            }
        });
        phoneheadInput.addEventListener('blur', function(e) {
            var phone = e.target.value;
            if (phone.length !== 10) {
                alert('กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง (10 หลัก)');
            }
        });
        phonedeanInput.addEventListener('blur', function(e) {
            var phone = e.target.value;
            if (phone.length !== 10) {
                alert('กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง (10 หลัก)');
            }
        });
    </script>

    <script>
        // ฟังก์ชันคำนวณอายุ
        function calculateAge() {
            var today = new Date();
            var birthDate = new Date(document.getElementById("birthdate").value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById("age").value = age;
        }

        // เมื่อมีการเปลี่ยนค่าใน input วันเกิด
        document.getElementById("birthdate").addEventListener("change", calculateAge);
    </script>

    <!-- ไม่สามารถแท็บฟอร์มได้ -->
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputs = document.querySelectorAll('input[type="text"]');

            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/\s/g, '');
                });
            });
        });
    </script> -->

    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>


    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>