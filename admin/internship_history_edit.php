<?php

session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN student_history ON login_student.email = student_history.email 
WHERE login_student.role = 'internship_student' 
AND login_student.email = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../internship/assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <title>ประวัตินักศึกษา</title>


    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
    <link rel="stylesheet" href="./assets/css/listastu.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">


    <link rel="stylesheet" href="../internship/assets/css/internship.css">

</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <!-- <div class="main-wrapper"> -->

        <?php
        include('./nav_admin.php');

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">

            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid mt-5">


                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">แบบฟอร์มฝึกงาน</li>
                        <li class="breadcrumb-item" aria-current="page">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                        <li class="breadcrumb-item" aria-current="page">รายละเอียด</li>
                        <li class="breadcrumb-item active" aria-current="page">ประวัตินักศึกษา</li>
                    </ol>
                </nav>

                <div class="text-center ">
                    <h5>ประวัตินักศึกษา</h5>
                </div><br>

                <!-- form -->
                <form class="row g-3" action="./internship_history_update.php" id="updateform" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                            <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z" />
                        </svg>&nbsp;รูปภาพ</div>
                    <div class="mb-3">
                        <!-- 2 std_history_profile_img -->
                        <div class="uploaded-documents text-center"> <!-- เพิ่ม class text-center เพื่อจัดให้อยู่ตรงกลาง -->
                            <?php if (!empty($row['std_history_profile_img'])) : ?>
                                <!-- <label  for="formFile" class="form-label">รูปภาพ</label> -->
                                <a href="../internship/uploads/<?php echo htmlspecialchars($row['std_history_profile_img']); ?>" target="_blank">
                                    <img src="../internship/uploads/<?php echo htmlspecialchars($row['std_history_profile_img']); ?>" alt="รูปภาพ" style="width: 7%;"> <!-- กำหนดขนาดของรูปภาพเป็น 1 นิ้ว -->
                                </a>
                            <?php else : ?>
                                <p>ไม่พบรูปภาพ</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="std_history_prefix" disabled>
                            <option selected>
                                <?php echo isset($row['std_history_prefix']) ? $row['std_history_prefix'] : ''; ?>
                            </option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_fname" value="<?php echo isset($row['std_history_fname']) ? $row['std_history_fname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_lname" value="<?php echo isset($row['std_history_lname']) ? $row['std_history_lname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="6xxxxxxxx-x" name="std_history_std_id" value="<?php echo isset($row['std_history_std_id']) ? $row['std_history_std_id'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="std_history_field_of_study" disabled>
                            <option selected>
                                <?php echo isset($row['std_history_field_of_study']) ? $row['std_history_field_of_study'] : ''; ?>
                            </option>
                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                            <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                            <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                            <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="inputState" class="form-label">คณะ</label>
                        <select id="inputState" class="form-select" name="std_history_faculty" value="<?php echo isset($row['std_history_faculty']) ? $row['std_history_faculty'] : ''; ?>" disabled>
                            <option value="cpkku">วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="male" class="form-lable">วัน/เดือน/ปีเกิด</label>
                        <input type="date" class="form-control" id="male" name="std_history_birthday" value="<?php echo isset($row['std_history_birthday']) ? $row['std_history_birthday'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">อายุ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อายุ" name="std_history_age" value="<?php echo isset($row['std_history_age']) ? $row['std_history_age'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เชื้อชาติ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="เชื้อชาติ" name="std_history_race" value="<?php echo isset($row['std_history_race']) ? $row['std_history_race'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">สัญชาติ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สัญชาติ" name="std_history_nationality" value="<?php echo isset($row['std_history_nationality']) ? $row['std_history_nationality'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">ศาสนา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ศาสนา" name="std_history_religion" value="<?php echo isset($row['std_history_religion']) ? $row['std_history_religion'] : ''; ?>" readonly>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 bg-secondary text-white"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;ที่อยู่ปัจจุบัน</div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="std_history_address" value="<?php echo isset($row['std_history_address']) ? $row['std_history_address'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="std_history_subdistrict" value="<?php echo isset($row['std_history_subdistrict']) ? $row['std_history_subdistrict'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="std_history_district" value="<?php echo isset($row['std_history_district']) ? $row['std_history_district'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="std_history_province" value="<?php echo isset($row['std_history_province']) ? $row['std_history_province'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="std_history_zip" value="<?php echo isset($row['std_history_zip']) ? $row['std_history_zip'] : ''; ?>" readonly>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2  text-white"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;ภูมิลำเนาเดิม</div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="std_history_original_address" value="<?php echo isset($row['std_history_original_address']) ? $row['std_history_original_address'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="std_history_original_subdistrict" value="<?php echo isset($row['std_history_original_subdistrict']) ? $row['std_history_original_subdistrict'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="std_history_original_district" value="<?php echo isset($row['std_history_original_district']) ? $row['std_history_original_district'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="std_history_original_province" value="<?php echo isset($row['std_history_original_province']) ? $row['std_history_original_province'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="std_history_original_zip" value="<?php echo isset($row['std_history_original_zip']) ? $row['std_history_original_zip'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" name="std_history_fax" placeholder="094-xxx-xxxx" value="<?php echo isset($row['std_history_fax']) ? $row['std_history_fax'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="std_history_email" placeholder="xxxxxxxx@gmail.com" value="<?php echo isset($row['std_history_email']) ? $row['std_history_email'] : ''; ?>" readonly>
                    </div>


                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;ข้อมูลบิดา</div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_father_fanme" value="<?php echo isset($row['std_history_father_fanme']) ? $row['std_history_father_fanme'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_father_lname" value="<?php echo isset($row['std_history_father_lname']) ? $row['std_history_father_lname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">อาชีพ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อาชีพ" name="std_history_father_occupation" value="<?php echo isset($row['std_history_father_occupation']) ? $row['std_history_father_occupation'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phone" placeholder="นามสกุล" name="std_history_father_phone" value="<?php echo isset($row['std_history_father_phone']) ? $row['std_history_father_phone'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="inputtext" class="form-label">สถานที่ทำงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานที่ทำงาน" name="std_history_father_office" value="<?php echo isset($row['std_history_father_office']) ? $row['std_history_father_office'] : ''; ?>" readonly>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;ข้อมูลมารดา</div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_mother_fname" value="<?php echo isset($row['std_history_mother_fname']) ? $row['std_history_mother_fname'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_mother_lname" value="<?php echo isset($row['std_history_mother_lname']) ? $row['std_history_mother_lname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">อาชีพ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อาชีพ" name="std_history_mother_occupation" value="<?php echo isset($row['std_history_mother_occupation']) ? $row['std_history_mother_occupation'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phone" placeholder="นามสกุล" name="std_history_mother_phone" value="<?php echo isset($row['std_history_mother_phone']) ? $row['std_history_mother_phone'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="inputtext" class="form-label">สถานที่ทำงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานที่ทำงาน" name="std_history_mother_office" value="<?php echo isset($row['std_history_mother_office']) ? $row['std_history_mother_office'] : ''; ?>" readonly>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;ที่อยู่ที่สามารถติดต่อได้</div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="student_history_parent_address" value="<?php echo isset($row['student_history_parent_address']) ? $row['student_history_parent_address'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="student_history_parent_subdistrict" value="<?php echo isset($row['student_history_parent_subdistrict']) ? $row['student_history_parent_subdistrict'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="student_history_parent_district" value="<?php echo isset($row['student_history_parent_district']) ? $row['student_history_parent_district'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="student_history_parent_province" value="<?php echo isset($row['student_history_parent_province']) ? $row['student_history_parent_province'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="student_history_parent_zip" value="<?php echo isset($row['student_history_parent_zip']) ? $row['student_history_parent_zip'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">เข้าฝึกงานทางด้านใด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="xxxxxxxx" name="student_history_apprentice" value="<?php echo isset($row['student_history_apprentice']) ? $row['student_history_apprentice'] : ''; ?>" readonly>
                    </div>

                    <div class="title" class="p-2 mb-2 text-white"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;ระยะเวลาฝึกงาน</div>

                    <div class="col-md-6">
                        <label for="male" class="form-lable">จาก</label>
                        <input type="date" class="form-control" id="male" name="std_historty_start_date" value="<?php echo isset($row['std_historty_start_date']) ? $row['std_historty_start_date'] : ''; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="male" class="form-lable">ถึง</label>
                        <input type="date" class="form-control" id="male" name="std_historty_end_date" value="<?php echo isset($row['std_historty_end_date']) ? $row['std_historty_end_date'] : ''; ?>" readonly>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ความสามารถพิเศษ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความสามารถพิเศษ" name="std_history_talent" readonly><?php echo isset($row['std_history_talent']) ? htmlspecialchars($row['std_history_talent']) : ''; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea2" class="form-label">ความสามารถทางคอมพิวเตอร์</label>
                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" name="std_history_computer_proficiency" readonly><?php echo isset($row['std_history_computer_proficiency']) ? htmlspecialchars($row['std_history_computer_proficiency']) : ''; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea3" class="form-label">กิจกรรมระหว่างศึกษา/ประสบการณ์การทำงานอย่างอื่น/รางวัลที่ได้รับ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" placeholder="กิจกรรมระหว่างศึกษา/ประสบการณ์การทำงานอย่างอื่น/รางวัลที่ได้รับ" name="std_history_awards" readonly><?php echo isset($row['std_history_awards']) ? htmlspecialchars($row['std_history_awards']) : ''; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea4" class="form-label">ลักษณะงานที่สนใจ/โครงการอาชีพในอนาคต</label>
                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="ลักษณะงานที่สนใจ/โครงการอาชีพในอนาคต" name="std_history_job_interest" readonly><?php echo isset($row['std_history_job_interest']) ? htmlspecialchars($row['std_history_job_interest']) : ''; ?></textarea>
                    </div>


                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;หัวหน้าสาขาวิชาวิทยาการคอมพิวเตอร์</div>

                    <div class="col-md-2">
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="std_history_head_prefix" disabled>
                            <option selected>
                                <?php echo isset($row['std_history_head_prefix']) ? $row['std_history_head_prefix'] : ''; ?>
                            </option>
                            <option value="ศ. ดร.">ศ. ดร.</option>
                            <option value="รศ. ดร.">รศ. ดร.</option>
                            <option value="ผศ. ดร.">ผศ. ดร.</option>
                            <option value="อ. ดร.">อ. ดร.</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_head_fname" value="<?php echo isset($row['std_history_head_fname']) ? $row['std_history_head_fname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_head_lname" value="<?php echo isset($row['std_history_head_lname']) ? $row['std_history_head_lname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="inputtext" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="std_history_head_phone" value="<?php echo isset($row['std_history_head_phone']) ? $row['std_history_head_phone'] : ''; ?>" readonly>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2 text-white"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;รักษาการแทนคณบดีวิทยาลัยการคอมพิวเตอร์</div>

                    <div class="col-md-2">
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="std_history_acting_dean_prefix" disabled>
                            <option selected><?php echo isset($row['std_history_acting_dean_prefix']) ? $row['std_history_acting_dean_prefix'] : ''; ?></option>
                            <option value="ศ. ดร.">ศ. ดร.</option>
                            <option value="รศ. ดร.">รศ. ดร.</option>
                            <option value="ผศ. ดร.">ผศ. ดร.</option>
                            <option value="อ. ดร.">อ. ดร.</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_history_acting_dean_fname" value="<?php echo isset($row['std_history_acting_dean_fname']) ? $row['std_history_acting_dean_fname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_history_acting_dean_lname" value="<?php echo isset($row['std_history_acting_dean_lname']) ? $row['std_history_acting_dean_lname'] : ''; ?>" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="inputtext" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="std_history_acting_dean_phone" value="<?php echo isset($row['std_history_acting_dean_phone']) ? $row['std_history_acting_dean_phone'] : ''; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="require form-label" for="comment">นักศึกษาต้องแก้ไข (แอดมิน)</label>
                        <textarea class="form-control" id="comment" rows="3" placeholder="นักศึกษาต้องแก้ไข" name="comment"><?php echo isset($row['comment']) ? $row['comment'] : ''; ?></textarea>
                    </div>
                    <!-- Add an input hidden field to store the 'email' -->


                    <input type="hidden" name="email" value="<?php echo $id; ?>">


                    <br>
                    <div class="button text-right">
                        <button type="submit" id="edit" class="btn btn-warning" data-toggle="button" name="status_admin" value="3">แก้ไข</button>
                        <button type="submit" id="cancel" class="btn btn-danger" data-toggle="button" name="status_admin" value="4">ไม่อนุมัติ</button>
                        <button type="submit" id="submitButton" class="btn btn-success" data-toggle="button" name="status_admin" value="2">อนุมัติ</button>
                    </div>

                </form>

            </div>


        </div>
    </div>




    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>

    <script>
    // รับอ้างอิงไปยังปุ่มและฟอร์ม
    var submitButton = document.getElementById('submitButton');
    var form = document.getElementById('updateform');

    if (submitButton) {
    submitButton.addEventListener('click', function(e) {
        if (e) {
            e.preventDefault(); // ยกเลิกการส่งฟอร์มโดยอัตโนมัติ
        }

        // ตรวจสอบค่าใน $row["status_admin"]
        var statusAdmin = <?php echo $row["status_admin"]; ?>;
        
        // ตรวจสอบว่าค่าเท่ากับ 0 หรือไม่
        if (statusAdmin === 0) {
            Swal.fire({
                title: 'เตือน!',
                text: 'จะส่งข้อมูลว่างเปล่าหรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ส่งข้อมูลว่างเปล่า',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    var statusInput = document.createElement('input');
                    statusInput.type = 'hidden';
                    statusInput.name = 'status_admin';
                    statusInput.value = '2'; // แสดงการอนุมัติ
                    form.appendChild(statusInput); // เพิ่มในฟอร์ม
                    form.submit(); // ส่งฟอร์มเมื่อผู้ใช้ยืนยัน
                }
            });
        } else {
            // แสดง sweetalert อื่น ๆ หรือดำเนินการต่อได้ตามต้องการ
            Swal.fire({
                title: 'ยืนยันการตรวจสอบ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, อนุมัติ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    var statusInput = document.createElement('input');
                    statusInput.type = 'hidden';
                    statusInput.name = 'status_admin';
                    statusInput.value = '2'; // แสดงการอนุมัติ
                    form.appendChild(statusInput); // เพิ่มในฟอร์ม
                    form.submit(); // ส่งฟอร์มเมื่อผู้ใช้ยืนยัน
                }
            });
        }
    });
} else {
    console.error("Submit button with ID 'submitButton' not found."); // หากปุ่มไม่พบ
}

// เพิ่มการตรวจสอบว่าฟอร์มมีหรือไม่
if (!form) {
    console.error("Form with ID 'updateform' not found."); // หากฟอร์มไม่พบ
}


</script>


    


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>