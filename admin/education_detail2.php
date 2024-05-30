<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN coopperative_education_report_form
 ON login_student.email = coopperative_education_report_form
.email 
WHERE login_student.role = 'cooperative_student' 
AND login_student.email = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


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

    <?php
    include('./nav_admin.php');
    ?>

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">
        <!-- ส่วนของข้อมูล -->
       
        <div class="content container-fluid mt-5">
             <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item ">แบบฟอร์มสหกิจ</li>
                        <li class="breadcrumb-item ">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                        <li class="breadcrumb-item ">รายละเอียด</li>
                       
                       

                        </li>
                <li class="breadcrumb-item active" aria-current="page">ลายละเอียดวันที่แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</li>
            </ol>
        </nav>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- <button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg>&nbsp;Print</button> -->
                <!-- <button class="btn btn-warning" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>&nbsp;<a href="./coopperative_education_edit.php" class="text-dark">Edit</a></button> -->
                <!-- <button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                    </svg>&nbsp;Print</button> -->
            </div>

            <div class="fw-semibold text-center">
                แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา <br>
                สำหรับนักศึกษา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
            </div><br>
            <hr>

            <form class="row g-3" action="./coopperative_education_insert.php" method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="col-md-6">
                        <!-- 1 -->
                        <label for="inputState" class="form-label">เทอม</label>
                        <select id="inputState" class="form-select" name="coop_report_term" disabled>
                            <option><?php echo isset($row['coop_report_term']) ? $row['coop_report_term'] : ''; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <!-- 2 -->
                        <label for="inputState" class="form-label">ปีการศึกษา</label>
                        <select id="inputState" class="form-select" name="coop_report_year" disabled>
                            <option><?php echo isset($row['coop_report_year']) ? $row['coop_report_year'] : ''; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <!-- 3 -->
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="coop_report_prefix" disabled>
                            <option selected><?php echo isset($row['coop_report_prefix']) ? $row['coop_report_prefix'] : ''; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <!-- 4 -->
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="coop_report_fname" value="<?php echo isset($row['coop_report_fname']) ? $row['coop_report_fname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-5">
                        <!-- 5 -->
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_lname" value="<?php echo isset($row['std_lname']) ? $row['std_lname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 6 -->
                        <label class="require" for="studentIdInput" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="6xxxxxxxx-x" name="std_id" value="<?php echo isset($row['std_id']) ? $row['std_id'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 7 -->
                        <label class="require" for="inputState" class="form-label">ชั้นปี</label>
                        <select id="inputState" class="form-select" name="coop_report_year_of_study" disabled>
                            <option selected><?php echo isset($row['coop_report_year_of_study']) ? $row['coop_report_year_of_study'] : ''; ?></option>
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
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อหน่วยงาน" name="coop_report_company_name" value="<?php echo isset($row['coop_report_company_name']) ? $row['coop_report_company_name'] : ''; ?> " disabled>
                    </div>

                    <div class="col-12">
                        <!-- 9 -->
                        <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="coop_report_address" value="<?php echo isset($row['coop_report_address']) ? $row['coop_report_address'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="coop_report_subdistrict" value="<?php echo isset($row['coop_report_subdistrict']) ? $row['coop_report_subdistrict'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="coop_report_district" value="<?php echo isset($row['coop_report_district']) ? $row['coop_report_district'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="coop_report_protrict" value="<?php echo isset($row['coop_report_protrict']) ? $row['coop_report_protrict'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="coopreportzip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="coopreportzip" placeholder="รหัสไปรษณีย์" name="coop_report_zip" pattern="[0-9]{5}" value="<?php echo isset($row['coop_report_zip']) ? $row['coop_report_zip'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 14 -->
                        <label class="require" for="inputtext" class="form-label">ชื่อพนักงานที่ปรึกษา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อพนักงานที่ปรึกษา" name="coop_report_staff_name" value="<?php echo isset($row['coop_report_staff_name']) ? $row['coop_report_staff_name'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 15 -->
                        <label class="require" for="inputtext" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="coop_report_position" value="<?php echo isset($row['coop_report_position']) ? $row['coop_report_position'] : ''; ?> " disabled>
                    </div>

                    <!-- 16 -->
                    <div class="col-md-6">
                        <label for="coop_report_date_start" class="form-lable">วันที่เริ่ม</label>
                        <input type="date" class="form-control" id="coop_report_date_start" name="coop_report_date_start" value="<?php echo isset($row['coop_report_date_start']) ? $row['coop_report_date_start'] : ''; ?>" disabled>
                    </div>
                    <!-- 17 -->
                    <div class="col-md-6">
                        <label for="coop_report_date_end" class="form-lable">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="coop_report_date_end" name="coop_report_date_end" value="<?php echo isset($row['coop_report_date_end']) ? $row['coop_report_date_end'] : ''; ?>" disabled>
                    </div>
                    <hr>

                    <div class="col-md-12">
                        <!-- 18 coop_report_job_description -->
                        <label for="exampleFormControlTextarea1" class="form-label">ลักษณะงานของนักศึกษา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ลักษณะงานของนักศึกษา" name="coop_report_job_description" disabled><?php echo isset($row['coop_report_job_description']) ? $row['coop_report_job_description'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 19 coop_report_what_received -->
                        <label for="exampleFormControlTextarea1" class="form-label">สิ่งที่ได้รับจากการปฏิบัติสหกิจศึกษา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="สิ่งที่ได้รับจากการปฏิบัติสหกิจศึกษา" name="coop_report_what_received" disabled><?php echo isset($row['coop_report_what_received']) ? $row['coop_report_what_received'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 20 coop_report_knowledge -->
                        <label for="exampleFormControlTextarea1" class="form-label">ความรู้ ความสามารถที่ได้เรียนมา ได้สนับสนุนกับงานที่ได้รับมอบหมายหรือไม่</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความรู้ ความสามารถที่ได้เรียนมา ได้สนับสนุนกับงานที่ได้รับมอบหมายหรือไม่" name="coop_report_knowledge" disabled><?php echo isset($row['coop_report_knowledge']) ? $row['coop_report_knowledge'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 21 coop_report_participation -->
                        <label for="exampleFormControlTextarea1" class="form-label">การมีส่วนร่วมกับองค์กร</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การมีส่วนร่วมกับองค์กร" name="coop_report_participation" disabled><?php echo isset($row['coop_report_participation']) ? $row['coop_report_participation'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 22 coop_report_satisfaction -->
                        <label for="exampleFormControlTextarea1" class="form-label">ความพึงพอใจของนักศึกษา ต่อสวัสดิการที่ได้รับ เช่น สถานที่พัก</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ความพึงพอใจของนักศึกษา ต่อสวัสดิการที่ได้รับ เช่น สถานที่พัก" name="coop_report_satisfaction" disabled><?php echo isset($row['coop_report_satisfaction']) ? $row['coop_report_satisfaction'] : ''; ?> </textarea>
                    </div>

                    <hr>
                    <div>
                        <p class="require fw-semibold">การประเมินสถานประกอบการ</p>
                        <!-- 23 coop_report_assessment_type -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coop_report_assessment_type" id="flexRadioDefault1" value="แนะนำให้นักศึกษารุ่นต่อไปมาอีก" <?php echo (isset($row['coop_report_assessment_type']) && $row['coop_report_assessment_type'] == 'แนะนำให้นักศึกษารุ่นต่อไปมาอีก') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                แนะนำให้นักศึกษารุ่นต่อไปมาอีก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coop_report_assessment_type" id="flexRadioDefault2" value="ไม่แนะนำให้นักศึกษามาอีก" <?php echo (isset($row['coop_report_assessment_type']) && $row['coop_report_assessment_type'] == 'ไม่แนะนำให้นักศึกษามาอีก') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                ไม่แนะนำให้นักศึกษามาอีก
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- 24 coop_report_reson -->
                        <label for="exampleFormControlTextarea1" class="form-label">เหตุผล</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="เหตุผล" name="coop_report_reson" disabled><?php echo isset($row['coop_report_reson']) ? $row['coop_report_reson'] : ''; ?> </textarea>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>&nbsp;ที่พักนักศึกษา</div>

                    <div>
                        <p class="require fw-semibold">นักศึกษาพักที่</p>
                        <!-- 25 coop_report_rest_house_type  -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coop_report_rest_house_type" id="flexRadioDefault1" value="โรงแรม" <?php echo (isset($row['coop_report_rest_house_type']) && $row['coop_report_rest_house_type'] == 'โรงแรม') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                โรงแรม
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coop_report_rest_house_type" id="flexRadioDefault2" value="อพาร์ทเม้นท์" <?php echo (isset($row['coop_report_rest_house_type']) && $row['coop_report_rest_house_type'] == 'อพาร์ทเม้นท์') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                อพาร์ทเม้นท์
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 26 coop_report_accommodation_name -->
                        <label for="inputtext" class="form-label">ชื่อที่พัก</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อที่พัก" name="coop_report_accommodation_name" value="<?php echo isset($row['coop_report_accommodation_name']) ? $row['coop_report_accommodation_name'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 27 coop_report_expenses -->
                        <label for="inputtext" class="form-label">ค่าใช้จ่ายค่าที่พัก (บาท / เดือน)</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="xxxx" name="coop_report_expenses" value="<?php echo isset($row['coop_report_expenses']) ? $row['coop_report_expenses'] : ''; ?> " disabled>
                    </div>

                    <div class="col-12">
                        <!-- 28 coop_report_accommodation_address -->
                        <label for="inputAddress" class="form-label">ที่พักเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="coop_report_accommodation_address" value="<?php echo isset($row['coop_report_accommodation_address']) ? $row['coop_report_accommodation_address'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 29 coop_report_accommodation_subdistrict -->
                        <label for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="coop_report_accommodation_subdistrict" value="<?php echo isset($row['coop_report_accommodation_subdistrict']) ? $row['coop_report_accommodation_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 30 coop_report_accommodation_district -->
                        <label for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="coop_report_accommodation_district" value="<?php echo isset($row['coop_report_accommodation_district']) ? $row['coop_report_accommodation_district'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 31 coop_report_accommodation_province -->
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="coop_report_accommodation_province" value="<?php echo isset($row['coop_report_accommodation_province']) ? $row['coop_report_accommodation_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 32 coop_report_accommodation_zip -->
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="coop_report_accommodation_zip" value="<?php echo isset($row['coop_report_accommodation_zip']) ? $row['coop_report_accommodation_zip'] : ''; ?> " disabled>
                    </div>

                    <div>
                        <p class="require fw-semibold">การประเมินที่พัก</p>
                        <!-- 33 coop_report_accommodation_assessmont_type -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coop_report_accommodation_assessmont_type" id="flexRadioDefault1" value="ควรให้นักศึกษาพักที่นี่อีก" <?php echo (isset($row['coop_report_accommodation_assessmont_type']) && $row['coop_report_accommodation_assessmont_type'] == 'ควรให้นักศึกษาพักที่นี่อีก') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                ควรให้นักศึกษาพักที่นี่อีก
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coop_report_accommodation_assessmont_type" id="flexRadioDefault2" value="ไม่ควรให้นักศึกษามาพักที่นี่อีก" <?php echo (isset($row['coop_report_accommodation_assessmont_type']) && $row['coop_report_accommodation_assessmont_type'] == 'ไม่ควรให้นักศึกษามาพักที่นี่อีก') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                ไม่ควรให้นักศึกษามาพักที่นี่อีก
                            </label>
                        </div>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                        </svg>&nbsp;ปัญหาและข้อเสนอแนะในเรื่องต่างๆ</div>

                    <div class="col-md-12">
                        <!-- 34 coop_report_choose -->
                        <label for="exampleFormControlTextarea1" class="form-label">การเลือกสถานประกอบการ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การเลือสถานประกอบการ" name="coop_report_choose" disabled><?php echo isset($row['coop_report_choose']) ? $row['coop_report_choose'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 35 coop_report_working -->
                        <label for="exampleFormControlTextarea1" class="form-label">การทำงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การทำงาน" name="coop_report_working" disabled><?php echo isset($row['coop_report_working']) ? $row['coop_report_working'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 36 coop_report_colleage -->
                        <label for="exampleFormControlTextarea1" class="form-label">เพื่อนร่วมง่าน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="เพื่อนร่วมง่าน" name="coop_report_colleage" disabled><?php echo isset($row['coop_report_colleage']) ? $row['coop_report_colleage'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 37 coop_report_travel -->
                        <label for="exampleFormControlTextarea1" class="form-label">การเดินทางไปที่ทำงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="การเดินทางไปที่ทำงาน" name="coop_report_travel" disabled><?php echo isset($row['coop_report_travel']) ? $row['coop_report_travel'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 38 coop_report_safaty -->
                        <label for="exampleFormControlTextarea1" class="form-label">ที่พักและความปลอดภัย</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ที่พักและความปลอดภัย" name="coop_report_safaty" disabled><?php echo isset($row['coop_report_safaty']) ? $row['coop_report_safaty'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 39 coop_report_other -->
                        <label for="exampleFormControlTextarea1" class="form-label">อื่นๆ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="อื่นๆ" name="coop_report_other" disabled><?php echo isset($row['coop_report_other']) ? $row['coop_report_other'] : ''; ?> </textarea>
                    </div>

                    <div class="col-md-12">
                        <!-- 40 coop_report_other_suggestions -->
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อเสนอแนะอื่นๆ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ข้อเสนอแนะอื่นๆ" name="coop_report_other_suggestions" disabled><?php echo isset($row['coop_report_other_suggestions']) ? $row['coop_report_other_suggestions'] : ''; ?> </textarea>
                    </div>
            </form>
            <!-- </div> -->
        </div>
        <!-- /ส่วนของข้อมูล -->
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




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./script.js"></script>

</body>