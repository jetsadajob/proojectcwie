<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN student_acceptance_form ON login_student.email = student_acceptance_form.email 
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
    <title>แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก
    </title>
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

        <?php
        include('./nav_admin.php');

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">

            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา

                        </li>
                    </ol>
                </nav>
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-warning" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>&nbsp;<a href="./student_acceptance_form_detail_edit.php">Edit</a></button>
                    <button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg>&nbsp;Print</button>
                </div> -->

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="fs-5 fw-bolder text-center mt-3">แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา</p>

                            <form class="row g-3" action="./student_acceptance_form_update.php" method="post"  id="updateform"  class="form-horizontal" enctype="multipart/form-data">

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                    </svg>&nbsp;ข้อมูลแบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">หน่วยงาน</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="acceptance_agency_name" value="<?php echo isset($row['acceptance_agency_name']) ? $row['acceptance_agency_name'] : ''; ?> ">
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">ที่อยู่</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="acceptance_address" value="<?php echo isset($row['acceptance_address']) ? $row['acceptance_address'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำบล / แขวง</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="acceptance_subdistrict" value="<?php echo isset($row['acceptance_subdistrict']) ? $row['acceptance_subdistrict'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">อำเภอ / เขต </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="acceptance_district" value="<?php echo isset($row['acceptance_district']) ? $row['acceptance_district'] : ''; ?> ">
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="acceptance_province" value="<?php echo isset($row['acceptance_province']) ? $row['acceptance_province'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="acceptance_zip" value="<?php echo isset($row['acceptance_zip']) ? $row['acceptance_zip'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="acceptance_phone" value="<?php echo isset($row['acceptance_phone']) ? $row['acceptance_phone'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx" name="acceptance_fax" value="<?php echo isset($row['acceptance_fax']) ? $row['acceptance_fax'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เว็บไซต์หน่วยงาน</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="www.ptt.co.th" name="acceptance_website" value="<?php echo isset($row['acceptance_website']) ? $row['acceptance_website'] : ''; ?> ">
                                </div>

                                <div>
                                    <p class="require fw-bold">หน่วยงานพิจารณาแล้ว</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="ไม่สามารถรับนักศึกษาเข้าปฏิบัติงานได้" name="acceptance_status_type" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1" value="ไม่สามารถรับนักศึกษาเข้าปฏิบัติงานได้" <?php echo (isset($row['acceptance_status_type']) && $row['acceptance_status_type'] == 'ไม่สามารถรับนักศึกษาเข้าปฏิบัติงานได้') ? 'checked' : ''; ?>>
                                            ไม่สามารถรับนักศึกษาเข้าปฏิบัติงานได้
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="ยินดีรับ" name="acceptance_status_type" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2" value="ยินดีรับ" <?php echo (isset($row['acceptance_status_type']) && $row['acceptance_status_type'] == 'ยินดีรับ') ? 'checked' : ''; ?>>
                                            ยินดีรับ
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                    <select id="inputState" class="form-select" name="acceptance_prefix">
                                        <option><?php echo isset($row['acceptance_prefix']) ? $row['acceptance_prefix'] : ''; ?></option>
                                        <option value="mr">นาย</option>
                                        <option value="miss">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="acceptance_fname" value="<?php echo isset($row['acceptance_fname']) ? $row['acceptance_fname'] : ''; ?> ">
                                </div>
                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="acceptance_lname" value="<?php echo isset($row['acceptance_fname']) ? $row['acceptance_fname'] : ''; ?> ">
                                </div>

                                <div class="fw-bold">โดยมีรายละเอียดดังนี้</div>

                                <div class="col-md-12">
                                    <label class="require" for="exampleFormControlTextarea1" class="form-label">
                                        แผนกที่รับนักศึกษา</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="แผนกที่รับนักศึกษา" name="acceptance_receiving_department"><?php echo isset($row['acceptance_receiving_department']) ? $row['acceptance_receiving_department'] : ''; ?></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="require" for="exampleFormControlTextarea2" class="form-label">
                                        ลักษณะงานที่จะมอบหมายให้ทำสหกิจศึกษา</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" placeholder="ลักษณะงานที่จะมอบหมายให้ทำสหกิจศึกษา" name="acceptance_job_description"><?php echo isset($row['acceptance_job_description']) ? $row['acceptance_job_description'] : ''; ?></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อผู้ประสานงาน
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อผู้ประสานงาน" name="acceptance_coordinator_fname" value="<?php echo isset($row['acceptance_coordinator_fname']) ? $row['acceptance_coordinator_fname'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">นามสกุลผู้ประสานงาน
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุลผู้ประสานงาน" name="acceptance_coordinator_lname" value="<?php echo isset($row['acceptance_coordinator_lname']) ? $row['acceptance_coordinator_lname'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำแหน่ง </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="acceptance_coordinator_position" value="<?php echo isset($row['acceptance_coordinator_position']) ? $row['acceptance_coordinator_position'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="acceptance_coordinator_phone" value="<?php echo isset($row['acceptance_coordinator_phone']) ? $row['acceptance_coordinator_phone'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx" name="acceptance_coordinator_fax" value="<?php echo isset($row['acceptance_coordinator_fax']) ? $row['acceptance_coordinator_fax'] : ''; ?> ">
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com" name="acceptance_coordinator_email" value="<?php echo isset($row['acceptance_coordinator_email']) ? $row['acceptance_coordinator_email'] : ''; ?> ">
                                </div>

                                <div>
                                    <p class="require fw-bold">สวัสดิการที่จัดให้นักศึกษา</p>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" value="ไม่มี" name="acceptance_welfare_status" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3" value="ไม่มี" <?php echo (isset($row['acceptance_welfare_status']) && $row['acceptance_welfare_status'] == 'แนะนำให้นักศึกษารุ่นต่อไปมาอีก') ? 'checked' : ''; ?>>
                                            ไม่มี
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="มี" name="acceptance_welfare_status" id="flexRadioDefault4">
                                        <label class="form-check-label" for="flexRadioDefault4" value="มี" <?php echo (isset($row['acceptance_welfare_status']) && $row['acceptance_welfare_status'] == 'แนะนำให้นักศึกษารุ่นต่อไปมาอีก') ? 'checked' : ''; ?>>
                                            มี
                                        </label>
                                    </div>
                                    <ul>

                                        <div class="form-check">
                                            <input class="form-check-input control" type="checkbox" value="เบี้ยเลี้ยง" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                เบี้ยเลี้ยง เป็นจำนวนเงิน <input type="text" > บาท/(วัน,เดือน)
                                            </label>
                                        </div>
                                        </li>
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" value="ที่พัก" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                ที่พัก
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="รถรับ-ส่ง" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                รถรับ-ส่ง
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="อื่นๆ" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                อื่นๆ <input type="text">
                                            </label>
                                        </div>

                                    </ul>
                                </div>

                                <hr>
                                <div class="col-md-6">
                                    <label class="require" for="formFile" class="form-label">ลายเซ็นผู้ตอบรับ</label>
                                    <input class="form-control" type="file" id="formFile" name="acceptance_signature_img">
                                </div>
                                <br>
                                <div class="mb-3 ">
                                    <label class="require form-label" for="comment">นักศึกษาต้องแก้ไข (แอดมิน)</label>
                                    <textarea class="form-control" id="comment" rows="3" placeholder="นักศึกษาต้องแก้ไข" name="comment"><?php echo isset($row['comment']) ? $row['comment'] : ''; ?></textarea>
                                </div>
                                <!-- Add an input hidden field to store the 'email' -->
                                <input type="hidden" name="email" value="<?php echo $id; ?>">

                                <div class="button text-right">
                                    <button type="submit" id="edit" class="btn btn-warning" data-toggle="button" name="status_admin" value="3">แก้ไข</button>
                                    <button type="submit" id="cancel" class="btn btn-danger" data-toggle="button" name="status_admin" value="4">ไม่อนุมัติ</button>
                                    <button type="submit" id="submitButton" class="btn btn-success" data-toggle="button" name="status_admin" value="2">อนุมัติ</button>
                                </div>
                                </d>
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
            <script src="assets/js/jquery-3.5.1.min.js"></script>

            <!-- Bootstrap Core JS -->
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>

            <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
            <script src="assets/js/jquery.slimscroll.min.js"></script>

            <!-- Chart JS ส่วนของกราฟ-->
            <script src="assets/plugins/morris/morris.min.js"></script>
            <script src="assets/plugins/raphael/raphael.min.js"></script>
            <script src="assets/js/chart.js"></script>

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

            <!-- <script>
                // รับอ้างอิงไปยังปุ่มและฟอร์ม
                var submitButton = document.getElementById('submitButton');
                var form = document.getElementById('updateform');

                if (submitButton) {
                    submitButton.addEventListener('click', function(e) {
                        if (e) {
                            e.preventDefault(); // ยกเลิกการส่งฟอร์มโดยอัตโนมัติ
                        }
                        Swal.fire({
                            title: 'ยืนยันการอนุมัติ?',
                            text: 'คุณแน่ใจหรือไม่ว่าต้องการอนุมัติโดยไม่มีข้อมูล?',
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
                    });
                } else {
                    console.error("Submit button with ID 'submitButton' not found."); // หากปุ่มไม่พบ
                }

                if (!form) {
                    console.error("Form with ID 'updateform' not found."); // หากฟอร์มไม่พบ
                }
            </script> -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

            <!-- Custom JS -->
            <script src="assets/js/app.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
            <script src="script.js"></script>
</body>

</html>