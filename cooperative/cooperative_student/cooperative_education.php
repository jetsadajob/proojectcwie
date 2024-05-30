<?php
include '../server.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($std = mysqli_fetch_assoc($result)) {
    $email = $std['email'];

    $sql = "SELECT *
    FROM login_student
    JOIN coopperative_education_report_form ON login_student.email = coopperative_education_report_form.email
    JOIN job_description_accommodation ON coopperative_education_report_form.email = job_description_accommodation.email
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
    <title>แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <title>แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/cooperative.css">

    <style>
        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            padding-left: 30px;
            padding-top: 45px;
        }
    </style>

</head>

<body>
    <div class="mail-wrapper">
        <?php
        include('./navbar_menu.php');
        ?>


        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <!-- ส่วนของข้อมูล -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../cooperative_student/cooperative_student_home.php">แบบฟอร์มสหกิจศึกษา</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</li>
                </ol>
            </nav>
            <div class="content container-fluid">
                <div class="fw-semibold text-center">
                    แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา <br>
                    สำหรับนักศึกษา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
                </div><br>
                <hr>

                <form class="row g-3" action="./cooperative_education_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="col-md-6">
                        <!-- 1 -->
                        <label class="require" for="inputState" class="form-label">เทอม</label>
                        <select id="inputState" class="form-select" name="coop_report_term" required>
                            <option selected>-- เลือก --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <!-- 2 -->
                        <label class="require" for="inputState" class="form-label">ปีการศึกษา</label>
                        <select id="inputState" class="form-select" name="coop_report_year" required>
                            <option selected>-- เลือก --</option>
                            <option value="2563">2563</option>
                            <option value="2564">2564</option>
                            <option value="2565">2565</option>
                            <option value="2566">2566</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <!-- 3 -->
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="coop_report_prefix" >
                            <option selected><?php echo isset($std['std_prefix']) ? $std['std_prefix'] : ''; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <!-- 4 -->
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="coop_report_fname" value="<?php echo isset($std['std_fname']) ? $std['std_fname'] : ''; ?> " >
                    </div>

                    <div class="col-md-5">
                        <!-- 5 -->
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="coop_report_lname" value="<?php echo isset($std['std_lname']) ? $std['std_lname'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <!-- 6 -->
                        <label class="require" for="studentIdInput" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="6xxxxxxxx-x" name="coop_report_stdid" value="<?php echo isset($std['std_id']) ? $std['std_id'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <!-- 7 -->
                        <label class="require" for="inputState" class="form-label">ชั้นปี</label>
                        <select id="inputState" class="form-select" name="coop_report_year_of_study" >
                            <option selected><?php echo isset($std['year_of_study']) ? $std['year_of_study'] : ''; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>



                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>&nbsp;ที่อยู่สถานประกอบการ</div>

                    <div class="col-md-12">
                        <!-- 8 -->
                        <label class="require" for="inputtext" class="form-label">ชื่อสถานประกอบการ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อหน่วยงาน" name="coop_report_company_name" value="<?php echo isset($row['accommodation_employer_thai']) ? $row['accommodation_employer_thai'] : ''; ?> " >
                    </div>

                    <div class="col-12">
                        <!-- 9 -->
                        <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="coop_report_address" value="<?php echo isset($row['accommodation_address']) ? $row['accommodation_address'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="coop_report_subdistrict" value="<?php echo isset($row['accommodation_subdistrict']) ? $row['accommodation_subdistrict'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="coop_report_district" value="<?php echo isset($row['accommodation_district']) ? $row['accommodation_district'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="coop_report_protrict" value="<?php echo isset($row['accommodation_province']) ? $row['accommodation_province'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="coopreportzip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="coopreportzip" placeholder="รหัสไปรษณีย์" name="coop_report_zip" pattern="[0-9]{5}" value="<?php echo isset($row['accommodation_zip']) ? $row['accommodation_zip'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <!-- 14 -->
                        <label class="require" for="inputtext" class="form-label">ชื่อพนักงานที่ปรึกษา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อพนักงานที่ปรึกษา" name="coop_report_staff_name" value="<?php echo isset($row['accommodation_supervisor_fname']) ? $row['accommodation_supervisor_fname'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <!-- 15 -->
                        <label class="require" for="inputtext" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="coop_report_position" value="<?php echo isset($row['accommodation_supervisor_position']) ? $row['accommodation_supervisor_position'] : ''; ?> " >
                    </div>

                    <!-- 16 -->
                    <div class="col-md-6">
                        <label class="require" for="male" class="form-lable">วันที่เริ่ม</label>
                        <input type="date" class="form-control" id="male" name="coop_report_date_start" required>
                    </div>
                    <!-- 17 -->
                    <div class="col-md-6">
                        <label class="require" for="male" class="form-lable">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="male" name="coop_report_date_end" required>
                    </div>
                    <hr>

                    <div class="col-md-12">
                        <!-- 18 coop_report_job_description -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ลักษณะงานของนักศึกษา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ลักษณะงานของนักศึกษา" name="coop_report_job_description" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 19 coop_report_what_received -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">สิ่งที่ได้รับจากการปฏิบัติสหกิจศึกษา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="สิ่งที่ได้รับจากการปฏิบัติสหกิจศึกษา" name="coop_report_what_received" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 20 coop_report_knowledge -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ความรู้ ความสามารถที่ได้เรียนมา ได้สนับสนุนกับงานที่ได้รับมอบหมายหรือไม่</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความรู้ ความสามารถที่ได้เรียนมา ได้สนับสนุนกับงานที่ได้รับมอบหมายหรือไม่" name="coop_report_knowledge" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 21 coop_report_participation -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">การมีส่วนร่วมกับองค์กร</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การมีส่วนร่วมกับองค์กร" name="coop_report_participation" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 22 coop_report_satisfaction -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ความพึงพอใจของนักศึกษา ต่อสวัสดิการที่ได้รับ เช่น สถานที่พัก</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความพึงพอใจของนักศึกษา ต่อสวัสดิการที่ได้รับ เช่น สถานที่พัก" name="coop_report_satisfaction" require></textarea>
                    </div>

                    <hr>
                    <div>
                        <p class="require fw-semibold">การประเมินสถานประกอบการ</p>
                        <!-- 23 coop_report_assessment_type -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="แนะนำให้นักศึกษารุ่นต่อไปมาอีก" name="coop_report_assessment_type" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" required>
                                แนะนำให้นักศึกษารุ่นต่อไปมาอีก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="ไม่แนะนำให้นักศึกษามาอีก" name="coop_report_assessment_type" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2" required>
                                ไม่แนะนำให้นักศึกษามาอีก
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- 24 coop_report_reson -->
                        <label for="exampleFormControlTextarea1" class="form-label">เหตุผล</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="เหตุผล" name="coop_report_reson"></textarea>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>&nbsp;ที่พักนักศึกษา</div>

                    <div>
                        <p class="require fw-semibold">นักศึกษาพักที่</p>
                        <!-- 25 coop_report_rest_house_type  -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="โรงแรม" name="coop_report_rest_house_type" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" required>
                                โรงแรม
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="อพาร์ทเม้นท์" name="coop_report_rest_house_type" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2" required>
                                อพาร์ทเม้นท์
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 26 coop_report_accommodation_name -->
                        <label class="require" for="inputtext" class="form-label">ชื่อที่พัก</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อที่พัก" name="coop_report_accommodation_name" require>
                    </div>
                    <div class="col-md-6">
                        <!-- 27 coop_report_expenses -->
                        <label class="require" for="inputtext" class="form-label">ค่าใช้จ่ายค่าที่พัก (บาท / เดือน)</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="xxxx" name="coop_report_expenses" require>
                    </div>

                    <div class="col-12">
                        <!-- 28 coop_report_accommodation_address -->
                        <label class="require" for="inputAddress" class="form-label">ที่พักเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="coop_report_accommodation_address" value="<?php echo isset($row['accommodation_accommodation_address']) ? $row['accommodation_accommodation_address'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <!-- 29 coop_report_accommodation_subdistrict -->
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="coop_report_accommodation_subdistrict" value="<?php echo isset($row['accommodation_accommodation_subdistrict']) ? $row['accommodation_accommodation_subdistrict'] : ''; ?> " >
                    </div>
                    <div class="col-md-6">
                        <!-- 30 coop_report_accommodation_district -->
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="coop_report_accommodation_district" value="<?php echo isset($row['accommodation_accommodation_district']) ? $row['accommodation_accommodation_district'] : ''; ?> " >
                    </div>

                    <div class="col-md-6">
                        <!-- 31 coop_report_accommodation_province -->
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="coop_report_accommodation_province" value="<?php echo isset($row['accommodation_accommodation_province']) ? $row['accommodation_accommodation_province'] : ''; ?> " >
                    </div>
                    <div class="col-md-6">
                        <!-- 32 coop_report_accommodation_zip -->
                        <label class="require" for="coopreportaccommodationzip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="coopreportaccommodationzip" placeholder="รหัสไปรษณีย์" name="coop_report_accommodation_zip" pattern="[0-9]{5}" value="<?php echo isset($row['accommodation_accommodation_zip']) ? $row['accommodation_accommodation_zip'] : ''; ?> " >
                        <!-- <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="coop_report_accommodation_zip" require> -->
                    </div>

                    <div>
                        <p class="require fw-semibold">การประเมินที่พัก</p>
                        <!-- 33 coop_report_accommodation_assessmont_type -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="ควรให้นักศึกษาพักที่นี่อีก" name="coop_report_accommodation_assessmont_type" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" required>
                                ควรให้นักศึกษาพักที่นี่อีก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="ไม่ควรให้นักศึกษามาพักที่นี่อีก" name="coop_report_accommodation_assessmont_type" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2" required>
                                ไม่ควรให้นักศึกษามาพักที่นี่อีก
                            </label>
                        </div>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                        </svg>&nbsp;ปัญหาและข้อเสนอแนะในเรื่องต่างๆ</div>

                    <div class="col-md-12">
                        <!-- 34 coop_report_choose -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">การเลือกสถานประกอบการ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การเลือสถานประกอบการ" name="coop_report_choose" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 35 coop_report_working -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">การทำงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การทำงาน" name="coop_report_working" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 36 coop_report_colleage -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">เพื่อนร่วมง่าน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="เพื่อนร่วมง่าน" name="coop_report_colleage" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 37 coop_report_travel -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">การเดินทางไปที่ทำงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การเดินทางไปที่ทำงาน" name="coop_report_travel" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 38 coop_report_safaty -->
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ที่พักและความปลอดภัย</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ที่พักและความปลอดภัย" name="coop_report_safaty" require></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 39 coop_report_other -->
                        <label for="exampleFormControlTextarea1" class="form-label">อื่นๆ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="อื่นๆ" name="coop_report_other"></textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 40 coop_report_other_suggestions -->
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อเสนอแนะอื่นๆ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ข้อเสนอแนะอื่นๆ" name="coop_report_other_suggestions"></textarea>
                    </div>

                    <div class="button text-right">
                        <button type="button" class="btn btn-danger">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-success">
                            บันทึก
                        </button>
                    </div>
                </form>

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

        <!-- ไม่สามารถแท็บฟอร์มได้ -->

        <!-- ไม่สามารถแท็บฟอร์มได้ -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var inputs = document.querySelectorAll('input[type="text"]');

                inputs.forEach(function(input) {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/\s/g, ''); // ลบช่องว่างทั้งหมด
                    });
                });
            });
        </script>


        <!--เช็ครหัสไปรษณีย์ -->
        <script>
            document.getElementById('coopreportzip').addEventListener('input', function(e) {
                var zip = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
                e.target.value = zip.slice(0, 5); // จำกัดจำนวนตัวเลขไม่เกิน 5 ตัว
            });
            document.getElementById('coopreportaccommodationzip').addEventListener('input', function(e) {
                var zip = e.target.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
                e.target.value = zip.slice(0, 5); // จำกัดจำนวนตัวเลขไม่เกิน 5 ตัว
            });

            document.getElementById('coopreportzip').addEventListener('blur', function(e) {
                var zip = e.target.value;
                if (zip.length !== 5) {
                    alert('กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง (5 หลัก)');
                }
            });
            document.getElementById('coopreportaccommodationzip').addEventListener('blur', function(e) {
                var zip = e.target.value;
                if (zip.length !== 5) {
                    alert('กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง (5 หลัก)');
                }
            });
        </script>

    </div>
    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="./assets/plugins/morris/morris.min.js"></script>
    <script src="./assets/plugins/raphael/raphael.min.js"></script>
    <script src="./assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>