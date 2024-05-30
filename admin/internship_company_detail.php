<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}



$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN company_detail ON login_student.email = company_detail.email 
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
    <title>รายละเอียดบริษัท/หน่วยงาน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">แบบฟอร์มฝึกงาน</li>
                        <li class="breadcrumb-item" aria-current="page">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                        <li class="breadcrumb-item" aria-current="page">รายละเอียด</li>
                        <li class="breadcrumb-item" aria-current="page">แบบฟอร์มสหกิจ/หน่วยงาน</li>
                    </ol>
                </nav>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- <button class="btn btn-warning" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>&nbsp;<a href="./coopperative_education_edit.php">Edit</a></button> -->
                    <!-- <button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg>&nbsp;Print</button> -->
                </div>

                <!-- <div class="bordermain"> -->

                <div class="text-center">
                    รายละเอียดบริษัท/หน่วยงาน
                </div>
                <!-- Add an input hidden field to store the 'email' -->



                <form class="row g-3 needs-validation" action="internship_company_detail_update.php" method="post" enctype="multipart/form-data">
                    <!-- <div class="col-md-12">
                        <h1></h1>
                        <label class="require form-label" for="validationCustom01">email</label>
                        <input type="email" class="form-control" id="validationCustom01"
                            placeholder="email" name="email"
                            value=""
                            required>
                    </div> -->

                    <div class="head">

                    </div>

                    <form class="row g-3 needs-validation" novalidate action="./internship_company_detail_update.php" method="post">
                        <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
                            </svg>&nbsp;บริษัท</div>
                        <div class="col-md-12">

                            <label class="require form-label" for="validationCustom01">1. ชื่อบริษัท/หน่วยงาน</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="ชื่อบริษัท/หน่วยงาน" name="company_detail_name" value="<?php echo isset($row['company_detail_name']) ? $row['company_detail_name'] : ''; ?> " readonly>
                        </div>

                        <div class="col-12">
                            <label class="require form-label" for="inputAddress">2. ที่อยู่บริษัท/หน่วยงาน</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="company_detail_address" value="<?php echo isset($row['company_detail_address']) ? $row['company_detail_address'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="require form-label" for="inputtext">3. แขวง / ตำบล</label>
                            <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="company_detail_subdistrict" value="<?php echo isset($row['company_detail_subdistrict']) ? $row['company_detail_subdistrict'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="require form-label" for="inputtext">4. เขต / อำเภอ</label>
                            <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="company_detail_district" value="<?php echo isset($row['company_detail_district']) ? $row['company_detail_district'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="require form-label" for="inputtext">5. จังหวัด</label>
                            <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="company_detail_province" value="<?php echo isset($row['company_detail_province']) ? $row['company_detail_province'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="require form-label" for="inputtext">6. รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="company_detail_zip" value="<?php echo isset($row['company_detail_zip']) ? $row['company_detail_zip'] : ''; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="require form-label" for="exampleFormControlTextarea1">7. รายละเอียดอื่น ๆ
                                (ลักษณะงาน, บริษัท/หน่วยงานเกี่ยวข้องกับด้านใด)</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="รายละเอียดอื่น ๆ" name="company_detail_other_detail" readonly><?php echo isset($row['company_detail_other_detail']) ? $row['company_detail_other_detail'] : ''; ?></textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="require form-label" for="validationCustom01">8.
                                โปรดระบุด้วยว่าหนังสือเรียนถึงใคร
                                (เช่น ผู้อำนวยการ......, ผู้จัดการ..., หัวหน้าส่วนเป็นต้น)</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="ชื่อผู้รับหนังสือ" name="company_detail_specity_who" value="<?php echo isset($row['company_detail_specity_who']) ? $row['company_detail_specity_who'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="require form-label" for="validationCustom01">9. ชื่อผู้ประสานงาน/พี่เลี้ยง
                                (กรณีที่ทราบ หากไม่ทราบไม่เป็นไร)</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="ชื่อผู้ประสานงาน/พี่เลี้ยง" name="company_detail_coordinator_name" value="<?php echo isset($row['company_detail_coordinator_name']) ? $row['company_detail_coordinator_name'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="require form-label" for="validationCustom01">10. เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="0xxxxxxxxx" name="company_detail_phone" value="<?php echo isset($row['company_detail_phone']) ? $row['company_detail_phone'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="require form-label" for="validationCustom01">11.
                                กำหนดการส่งเอกสารของทางบริษัท/หน่วยงาน (หากมี)</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กำหนดการส่งเอกสารของทางบริษัท" name="company_detail_submit_document" value="<?php echo isset($row['company_detail_submit_document']) ? $row['company_detail_submit_document'] : ''; ?>" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="require form-label" for="validationCustom01">12. สิทธิ์การรักษาพยาบาล
                                (บัตรทอง)</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="สิทธิ์การรักษาพยาบาล" name="company_detail_medical_privilege" value="<?php echo isset($row['company_detail_medical_privilege']) ? $row['company_detail_medical_privilege'] : ''; ?>" readonly>
                        </div>

                        <div>
                        <p class="require">13. การส่งเอกสาร</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="company_detail_submit_document_type" id="flexRadioDefault1" value="รับไปส่งเอง" <?php echo (isset($row['company_detail_submit_document_type']) && $row['company_detail_submit_document_type'] == 'รับไปส่งเอง') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1" required>
                                รับไปส่งเอง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="company_detail_submit_document_type" id="flexRadioDefault2" value="สาขาวิชาส่งให้ตามที่อยู่บริษัท/หน่วยงาน ตามที่แจ้งในข้อ 2" <?php echo (isset($row['company_detail_submit_document_type']) && $row['company_detail_submit_document_type'] == 'สาขาวิชาส่งให้ตามที่อยู่บริษัท/หน่วยงาน ตามที่แจ้งในข้อ 2') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2" required>
                                สาขาวิชาส่งให้ตามที่อยู่บริษัท/หน่วยงาน ตามที่แจ้งในข้อ 2
                            </label>
                        </div>
                    </div>

                        <!-- <div class="mb-3">
                            <label class="require form-label" for="comment">นักศึกษาต้องแก้ไข (แอดมิน)</label>
                            <textarea class="form-control" id="comment" rows="3"
                                placeholder="นักศึกษาต้องแก้ไข" name="comment"><?php echo isset($row['comment']) ? $row['comment'] : ''; ?></textarea>
                        </div> -->
                        <!-- Add an input hidden field to store the 'email' -->
                        <input type="hidden" name="email" value="<?php echo $id; ?>">


                        <br>
                        <!-- <div class="button">
                            <button type="submit" id="edit" class="btn btn-warning" data-toggle="button" name="status_admin" value="3" >แก้ไข</button>
                            <button type="submit" id="submit" class="btn btn-success" data-toggle="button" name="status_admin" value="2">อนุมัติ</button>
                            <button type="submit" id="cancel" class="btn btn-danger" data-toggle="button"  name="status_admin" value="4" >ไม่อนุมัติ</button>
                        </div> -->
                    </form>

            </div>

            <!-- ส่วนของข้อมูลทั้งหมด -->
        </div>
        <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->

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


</html>
<?php

mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>