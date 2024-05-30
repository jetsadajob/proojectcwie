<?php
include "../internship/server.php";


$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN petition_document ON login_student.email = petition_document.email 
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
    <title>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
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
    <title>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../internship/assets/css/internship.css">


</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <?php
        include('navbar_menu_instructor.php') ;

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ตรวจสอบใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา
                    </li>
                </ol>
            </nav>


            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid">
                <!-- <div class="bordermain"> -->
                <div class="text-center">
                    ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา <br><br>
                    <!-- CO-OPERATIVE EDUCATION <br>
                สหกิจศึกษา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น -->
                </div>

                <form class="row g-3" action="cooperative_petition_detil_update.php" method="post"
                    class="form-horizontal" enctype="multipart/form-data">
                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>&nbsp;ข้อมูลนักศึกษา</div>

                    <div class="col-md-2">
                        <!-- 2	petition_prefix -->
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="petition_prefix" disabled>
                            <option><?php echo isset($row['petition_prefix']) ? $row['petition_prefix'] : ''; ?>
                            </option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <!-- 3	petition_fname -->
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="petition_fname"
                            value="<?php echo isset($row['petition_fname']) ? $row['petition_fname'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-5">
                        <!-- 4	petition_lname -->
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                            name="petition_lname"
                            value="<?php echo isset($row['petition_lname']) ? $row['petition_lname'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 5	petition_year_of_study -->
                        <label class="require" for="inputState" class="form-label">ชั้นปี</label>
                        <select id="inputState" class="form-select" name="petition_year_of_study" disabled>
                            <option selected>
                                <?php echo isset($row['petition_year_of_study']) ? $row['petition_year_of_study'] : ''; ?>
                            </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <!-- 	6	petition_field_of_study -->
                        <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="petition_field_of_study" disabled>
                            <option selected>
                                <?php echo isset($row['petition_field_of_study']) ? $row['petition_field_of_study'] : ''; ?>
                            </option>
                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                            <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                            <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                            <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <!-- 7	petition_project -->
                        <label class="require" for="inputState" class="form-label">โครงการ</label>
                        <select id="inputState" class="form-select" name="petition_project" disabled>
                            <option selected>
                                <?php echo isset($row['petition_project']) ? $row['petition_project'] : ''; ?> </option>
                            <option value="โครงการปกติ">โครงการปกติ</option>
                            <option value="โครงการพิเศษ">โครงการพิเศษ</option>
                        </select>
                    </div>

                    <br>
                    <div class="col-md-6">
                        <!-- 8	petition_organiztion_name -->
                        <label class="require" for="inputtext" class="form-label">ชื่อหน่วยงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อหน่วยงาน"
                            name="petition_organiztion_name"
                            value="<?php echo isset($row['petition_organiztion_name']) ? $row['petition_organiztion_name'] : ''; ?> "
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 9	petition_name_of_coordinator -->
                        <label class="require" for="inputtext" class="form-label">ชื่อผู้ประสานงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อผู้ประสานงาน"
                            name="petition_name_of_coordinator"
                            value="<?php echo isset($row['petition_name_of_coordinator']) ? $row['petition_name_of_coordinator'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 10	petition_position -->
                        <label class="require" for="inputtext" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง"
                            name="petition_position"
                            value="<?php echo isset($row['petition_position']) ? $row['petition_position'] : ''; ?> "
                            disabled>
                    </div>


                    <div class="col-md-6">
                        <!-- 11	petition_phone -->
                        <label class="require" for="inputtext" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="petition_phone"
                            value="<?php echo isset($row['petition_phone']) ? $row['petition_phone'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 	12	petition_email -->
                        <label class="require" for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com"
                            name="petition_email"
                            value="<?php echo isset($row['petition_email']) ? $row['petition_email'] : ''; ?> "
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 13	petition_fax -->
                        <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094-xxx-xxxx" name="petition_fax"
                            value="<?php echo isset($row['petition_fax']) ? $row['petition_fax'] : ''; ?> " disabled>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path
                                d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>&nbsp;ที่อยู่</div>

                    <div class="col-12">
                        <!-- 14	petition_address -->
                        <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                            name="petition_address"
                            value="<?php echo isset($row['petition_address']) ? $row['petition_address'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 15	petition_subdistrict -->
                        <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล"
                            name="petition_subdistrict"
                            value="<?php echo isset($row['petition_subdistrict']) ? $row['petition_subdistrict'] : ''; ?> "
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 16	petition_district -->
                        <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ"
                            name="petition_district"
                            value="<?php echo isset($row['petition_district']) ? $row['petition_district'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 17	petition_province -->
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด"
                            name="petition_province"
                            value="<?php echo isset($row['petition_province']) ? $row['petition_province'] : ''; ?> "
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 18	petition_zip -->
                        <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์"
                            name="petition_zip"
                            value="<?php echo isset($row['petition_zip']) ? $row['petition_zip'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-12">
                        <!-- 19	petition_website -->
                        <label class="require" for="inputtext" class="form-label">เว็บไซต์ (ถ้ามี)</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="เว็บไซต์ (ถ้ามี)"
                            name="petition_website"
                            value="<?php echo isset($row['petition_website']) ? $row['petition_website'] : ''; ?> "
                            disabled>
                    </div>
                    <div class="col-md-12">
                        <!-- 20	petition_wishes_to_prectice -->
                        <label class="require" for="exampleFormControlTextarea1"
                            class="form-label">ความประสงค์ฝึกสหกิจศึกษา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="ความประสงค์ฝึกสหกิจศึกษา" name="petition_wishes_to_prectice"
                            disabled><?php echo isset($row['petition_wishes_to_prectice']) ? $row['petition_wishes_to_prectice'] : ''; ?> </textarea>
                    </div>

                    <br>
                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                        </svg>&nbsp;เอกสารแนบ</div>

                    <div class="col-md-6">
                        <!-- 21	petition_graduation_document_file -->
                        <label class="require" for="formFile" class="form-label">เอกสารตรวจสอบการสำเร็จการศึกษา</label>
                        <!-- <input class="form-control" type="file" id="formFile" name="petition_graduation_document_file" > -->
                        <div class="kv-attribute"><a
                                href="../internship/internship_student/<?php echo $row['petition_graduation_document_file']; ?>"
                                target="_blank"
                                style=" color: #0d6efd;"><?php echo basename($row['petition_graduation_document_file']); ?></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- 22	petition_book -->
                        <label class="require" for="formFile" class="form-label">หนังสือยินยอมของผู้ปกครอง</label>
                        <!-- <input class="form-control" type="file" id="formFile" name="petition_book" > -->
                        <div class="kv-attribute"><a
                                href="../internship/internship_student/<?php echo $row['petition_book']; ?>"
                                target="_blank"
                                style=" color: #0d6efd;"><?php echo basename($row['petition_book']); ?></a></div>

                    </div>

                    <div class="col-md-6">
                        <!-- 23	petition_applicant_sinature_file -->
                        <label class="require" for="formFile" class="form-label">ลายเซ็นผู้ยื่นคำร้อง</label>
                        <!-- <input class="form-control" type="file" id="formFile" name="petition_applicant_sinature_file" > -->
                        <div class="kv-attribute"><a
                                href="../cooperative/uploads/<?php echo $row['petition_applicant_signature_file']; ?>"
                                target="_blank"
                                style=" color: #0d6efd;"><?php echo basename($row['petition_applicant_sinature_file']); ?></a>
                        </div>
                    </div>


                    <form class="row g-3" action="cooperative_petition_detil_update.php" method="post"
                        class="form-horizontal" enctype="multipart/form-data">
                        <div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">

                            <div class="title" class="p-2 mb-2  text-white"
                                class="p-3 mb-2 bg-primary-subtle text-emphasis-primary"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                </svg>&nbsp;สำหรับอาจารย์ประจำรายวิชาสหกิจศึกษา
                            </div>
                            <br>

                            <div class="col-md-6">
                                <label class="require" for="date" class="form-label">วันที่</label>
                                <input type="date" class="form-control" id="date" name="petition_date" value="">
                            </div>

                            <br>
                            <div class="information">
                                <p class="require">เงื่อนไขในการตรวจสอบคุณสมบัติ
                                <ol>
                                    <li>ผ่านรายวิชา 300202/SC002001 การเตรียมความพร้อมสหกิจศึกษา ในภาคการศึกษา
                                        <!-- 25	petition_semestor -->
                                        <select class="option" id="exampleFormControlSelect1" name="petition_semestor">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        ปีการศึกษา
                                        <!-- 26	petition_academic_year -->
                                        <select class="option" id="exampleFormControlSelect1"
                                            name="petition_academic_year">
                                            <option value="2565">2565</option>
                                            <option value="2566">2566</option>
                                            <option value="2567">2567</option>
                                        </select>
                                    </li>
                                    <li>เกรดเฉลี่ยสะสม (ตามเงื่อนไขของหลักสูตร) </li>
                                    <li>เกรดเฉลี่ยวิชาแกน (ตามเงื่อนไขของหลักสูตร) </li>
                                    <li>จำนวนหน่วยกิจกรรมครบ 60 หน่วยตามข้อกำหนดของมหาวิทยาลัย </li>
                                    <li>ผ่านการสอบวัดความรู้ภาษาอังกฤษ</li>
                                    <li>ผ่านการสอบมาตรฐานทางคอมพิวเตอร์ของสำนักนวัตกรรมการเรียนการสอน
                                        (ยกเว้นสาขาวิชาวิทยาการคอมพิวเตอร์) </li>

                                </ol>
                                </p>
                            </div>

                            <hr>
                            <div>
                                <p class="require">ความเห็นของอาจารย์ประจำรายวิชาสหกิจศึกษา</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="ผ่านเงื่อนไข"
                                        name="petition_opinions_of_professors_type" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        ผ่านเงื่อนไข
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="ไม่ผ่านเงื่อนไข"
                                        name="petition_opinions_of_professors_type" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        ไม่ผ่านเงื่อนไข
                                    </label>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="col-md-6 mb-3">
                                <!-- 28	petition_signatore_leture_img -->
                                <label class="require" for="formFile" class="form-label">ลายเซ็นอาจารย์ประจำวิชา</label>
                                <input class="form-control" type="file" id="formFile"
                                    name="petition_signatore_leture_img">
                            </div>

                            <!-- Add an input hidden field to store the 'email' -->
                            <input type="hidden" name="email" value="<?php echo $id; ?>">

                            <div class="button text-right">
                                <!-- <button type="submit" id="edit" class="btn btn-warning" data-toggle="button"
                                name="status_admin" value="3">แก้ไข</button> -->
                                <button type="submit" id="submit" class="btn btn-success" data-toggle="button"
                                    name="status_admin" value="2">อนุมัติ</button>
                                <button type="submit" id="cancel" class="btn btn-danger" data-toggle="button"
                                    name="status_admin" value="4">ไม่อนุมัติ</button>
                            </div>

                        </div>

                    </form>
                    <!-- </div> -->
            </div>
            <!-- /ส่วนของข้อมูล -->
        </div>
        <!-- /Page Wrapper -->
        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="../assets/plugins/morris/morris.min.js"></script>
    <script src="../assets/plugins/raphael/raphael.min.js"></script>
    <script src="../assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>