<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา
    </title>
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

</head>

<body>
    <div class="main-wrapper">

        <?php
        include('./navbar_menu.php');
        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา

                    </li>
                </ol>
            </nav>
            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="fs-5 fw-bolder text-center">สหกิจศึกษา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
                            </p>
                            <!-- <p class="fw-semibold text-center">KKU CP-T002 CO-OPERATIVE EDUCATION</p> -->
                            <p class="fw-semibold text-center">แบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา
                            </p>

                            <form class="row g-3" action="./student_acceptance_form_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                    </svg>&nbsp;ข้อมูลแบบตอบรับนักศึกษาเข้าปฏิบัติงานสหกิจศึกษา
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">หน่วยงาน</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="acceptance_agency_name" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">ที่อยู่</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="acceptance_address" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำบล / แขวง</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="acceptance_subdistrict" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">อำเภอ / เขต </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="acceptance_district" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="acceptance_province" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="acceptance_zip" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="acceptance_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx" name="acceptance_fax" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เว็บไซต์หน่วยงาน</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="www.ptt.co.th" name="acceptance_website" required>
                                </div>

                                <div>
                                    <p class="require fw-bold">หน่วยงานพิจารณาแล้ว</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="ไม่สามารถรับนักศึกษาเข้าปฏิบัติงานได้" name="acceptance_status_type" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            ไม่สามารถรับนักศึกษาเข้าปฏิบัติงานได้
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="ยินดีรับ" name="acceptance_status_type" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            ยินดีรับ
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                    <select id="inputState" class="form-select" name="acceptance_prefix" required>
                                        <option selected>-- เลือก --</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="acceptance_fname" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="acceptance_lname" required>
                                </div>

                                <div class="fw-bold">โดยมีรายละเอียดดังนี้</div>

                                <div class="col-md-12">
                                    <label class="require" for="exampleFormControlTextarea1" class="form-label">
                                        แผนกที่รับนักศึกษา</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="แผนกที่รับนักศึกษา" name="acceptance_receiving_department" required></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="require" for="exampleFormControlTextarea2" class="form-label">
                                        ลักษณะงานที่จะมอบหมายให้ทำสหกิจศึกษา</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" placeholder="ลักษณะงานที่จะมอบหมายให้ทำสหกิจศึกษา" name="acceptance_job_description" required></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อผู้ประสานงาน
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อผู้ประสานงาน" name="acceptance_coordinator_fname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">นามสกุลผู้ประสานงาน
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุลผู้ประสานงาน" name="acceptance_coordinator_lname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำแหน่ง </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="acceptance_coordinator_position" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="acceptance_coordinator_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx" name="acceptance_coordinator_fax" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com" name="acceptance_coordinator_email" required>
                                </div>

                                <div>
                                    <p class="require fw-bold">สวัสดิการที่จัดให้นักศึกษา</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="ไม่มี" name="acceptance_welfare_status" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            ไม่มี
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="มี" name="acceptance_welfare_status" id="flexRadioDefault4">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            มี
                                        </label>
                                    </div>
                                    <ul>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="เบี้ยเลี้ยง" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                เบี้ยเลี้ยง เป็นจำนวนเงิน <input type="text"> บาท/(วัน,เดือน)
                                            </label>
                                        </div>
                                        </li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="ที่พัก" id="flexCheckDefault">
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
                                            <input class="form-check-input" type="checkbox" value="อื่นๆ" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                อื่นๆ <input type="text">
                                            </label>
                                        </div>

                                    </ul>
                                </div>

                                <hr>
                                <div class="col-md-6">
                                    <label class="require" for="formFile" class="form-label">ลายเซ็นผู้ตอบรับ</label>
                                    <input class="form-control" type="file" id="formFile" name="acceptance_signature_img" required>
                                </div>
                                <br>
                                <div class="button text-right">
                                    <button type="button" class="btn btn-danger">
                                        ยกเลิก
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        บันทึก
                                    </button>
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