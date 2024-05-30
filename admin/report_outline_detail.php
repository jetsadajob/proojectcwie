<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}



$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN cooperative_report_outline ON login_student.email = cooperative_report_outline.email 
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
    <title>แบบแจ้งโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา (Proposal)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../cooperative/assets/css/index.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../cooperative/assets/css/style.css">
    <link rel="stylesheet" href="../cooperative/assets/css/cooperative.css">

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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        แบบแจ้งโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา (Proposal)
                    </li>
                </ol>
            </nav>
            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-warning" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>&nbsp;<a href="./cooperative_report_outline_edit.php">Edit</a></button>
                    <button class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg>&nbsp;Print</button>
                </div>

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="fw-semibold text-center">แบบแจ้งโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา (Proposal)
                            </p>
                            <hr>
                            <p class="fw-bold">ผู้ให้ข้อมูล : นักศึกษา ร่วมกับ พนักงานที่ปรึกษา</p>
                            <p class="fw-bold text-decoration-underline">คำชี้แจง</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายงานถือเป็นส่วนหนึ่งของการปฏิบัติงานสหกิจศึกษา
                                มีวัตถุประสงค์เพื่อฝึกฝนทักษะการสื่อสาร
                                (Communication Skill) ของนักศึกษา และจัดทำข้อมูลที่เป็นประโยชน์สำหรับสถานประกอบการ
                                นักศึกษาจะต้องขอรับคำปรึกษาจากพนักงานที่ปรึกษา (Job Supervisor)
                                เพื่อกำหนดหัวข้อรายงานที่เหมาะสม โดยคำนึงถึงความต้องการของสถานประกอบการเป็นหลัก
                                ตัวอย่างของรายงาน ได้แก่ ผลงานวิจัยที่นักศึกษาปฏิบัติ รายงานวิชาการที่น่าสนใจ
                                การสรุปข้อมูลหรือสถิติบางประการ การวิเคราะห์ และประเมินผลข้อมูล เป็นต้น
                                ทั้งนี้รายงานอาจจะจัดทำเป็นกลุ่มของนักศึกษาสหกิจศึกษามากกว่า 1 คนก็ได้
                            </p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ในกรณีที่สถานประกอบการไม่ต้องการรายงานในหัวข้อข้างต้น
                                นักศึกษาจะต้องพิจารณาเรื่องที่ตนสนใจและหยิบยกมาทำรายงาน
                                โดยปรึกษากับพนักงานที่ปรึกษาเสียก่อน ตัวอย่างหัวข้อที่จะใช้เขียนรายงาน ได้แก่
                                รายงานวิชาการที่นักศึกษาสนใจ รายงานการปฏิบัติงานที่ได้รับมอบหมาย
                                หรือแผนและวิธีการปฏิบัติงานที่จะทำให้บรรลุถึงวัตถุประสงค์ของการเรียนรู้ที่นักศึกษาวางเป้าหมายไว้จากการปฏิบัติงานสหกิจศึกษาครั้งนี้
                                (Learning Objectives) เมื่อกำหนดหัวข้อได้แล้ว
                                ให้นักศึกษาจัดทำโครงร่างของเนื้อหารายงานพอสังเขปตามแบบฟอร์ม ทั้งนี้
                                ให้ปรึกษากับพนักงานที่ปรึกษาเสียก่อน แล้วจึงส่งกลับมายังงานสหกิจศึกษา
                                วิทยาลัยการคอมพิวเตอร์ ซึ่งจะรวบรวมเสนออาจารย์ที่ปรึกษาสหกิจศึกษาต่อไป
                                หากอาจารย์มีข้อเสนอแนะเพิ่มเติม จะแจ้งให้นักศึกษาทราบภายใน 2 สัปดาห์
                                และเพื่อมิให้เป็นการเสียเวลานักศึกษาควรดำเนินการเขียนรายงานโดยทันที
                            </p>

                        </div>
                    </div>
                </div>

                <form class="row g-3" action="./cooperative_report_outline_insert.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <p class="fw-bold">เรียน หัวหน้าโครงการสหกิจศึกษา</p>

                    <div class="col-md-2">
                        <label class="require" class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="outline_prefix" disabled>
                            <option><?php echo isset($row['outline_prefix']) ? $row['outline_prefix'] : ''; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">ชื่อ
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="outline_fname" value="<?php echo isset($row['outline_fname']) ? $row['outline_fname'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-5">
                        <label class="require" for="inputtext" class="form-label">นามสกุล
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="outline_lname" value="<?php echo isset($row['outline_lname']) ? $row['outline_lname'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">รหัสประจำตัวนักศึกษา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสประจำตัวนักศึกษา" name="outline_std_id" value="<?php echo isset($row['outline_std_id']) ? $row['outline_std_id'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="outline_field_of_study" disabled>
                            <option><?php echo isset($row['outline_field_of_study']) ? $row['outline_field_of_study'] : ''; ?></option>
                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                            <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                            <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                            <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputAddress" class="form-label">ชื่อสถานประกอบการ</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="outline_company_name" value="<?php echo isset($row['outline_company_name']) ? $row['outline_company_name'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputAddress" class="form-label">ที่อยู่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="outline_address" value="<?php echo isset($row['outline_address']) ? $row['outline_address'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">ตำบล / แขวง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="outline_subdistrict" value="<?php echo isset($row['outline_subdistrict']) ? $row['outline_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">อำเภอ / เขต </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="outline_district" value="<?php echo isset($row['outline_district']) ? $row['outline_district'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="outline_province" value="<?php echo isset($row['outline_province']) ? $row['outline_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="outline_zip" value="<?php echo isset($row['outline_zip']) ? $row['outline_zip'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="outline_phone" value="<?php echo isset($row['outline_phone']) ? $row['outline_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx" name="outline_fax" value="<?php echo isset($row['outline_fax']) ? $row['outline_fax'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com" name="outline_email" value="<?php echo isset($row['outline_email']) ? $row['outline_email'] : ''; ?> " disabled>
                    </div>
                    <hr>

                    <p class="fw-bold">ขอแจ้งรายละเอียดเกี่ยวกับโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา ดังนี้</p>


                    <div>1. หัวข้อรายงาน (Report Title) อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง</div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-lable">ภาษาไทย</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="" name="outline_detail_title_thai" value="<?php echo isset($row['outline_detail_title_thai']) ? $row['outline_detail_title_thai'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-lable">ภาษาอังกฤษ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="" name="outline_detail_title_eng" value="<?php echo isset($row['outline_detail_title_eng']) ? $row['outline_detail_title_eng'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea1" class="form-label">2.
                            วัตถุประสงค์</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="วัตถุประสงค์" name="outline_detail_description" disabled><?php echo isset($row['outline_detail_description']) ? $row['outline_detail_description'] : ''; ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea2" class="form-label">3.
                            ผลที่คาดว่าจะได้รับ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" placeholder="ผลที่คาดว่าจะได้รับ" name="outline_detail_expected_results" disabled><?php echo isset($row['outline_detail_expected_results']) ? $row['outline_detail_expected_results'] : ''; ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea3" class="form-label">4. ความสำคัญ
                            และที่มา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="4" placeholder="ความสำคัญ และที่มา" name="outline_detail_significance" disabled><?php echo isset($row['outline_detail_significance']) ? $row['outline_detail_significance'] : ''; ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea4" class="form-label">5.
                            เอกสารอ้างอิง:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="4" placeholder="เอกสารอ้างอิง:" name="outline_detail_reference" disabled><?php echo isset($row['outline_detail_reference']) ? $row['outline_detail_reference'] : ''; ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea5" class="form-label">6.
                            ระเบียบวิธีดำเนินโครงงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea5" rows="4" placeholder="ระเบียบวิธีดำเนินโครงงาน" name="outline_detail_pjmethodology" disabled><?php echo isset($row['outline_detail_pjmethodology']) ? $row['outline_detail_pjmethodology'] : ''; ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea6" class="form-label">7.
                            ขอบเขตของโครงงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea6" rows="4" placeholder="ขอบเขตของโครงงาน" name="outline_detail_scope" disabled><?php echo isset($row['outline_detail_scope']) ? $row['outline_detail_scope'] : ''; ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea7" class="form-label">8.
                            ข้อเสนอแนะอื่นๆ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea7" rows="4" placeholder="ข้อเสนอแนะอื่นๆ" name="outline_detail_other" disabled><?php echo isset($row['outline_detail_other']) ? $row['outline_detail_other'] : ''; ?> </textarea>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="uploaded-documents">
                            <?php if (!empty($row['outline_work_plan_file'])) : ?>
                                <label class="require" for="formFile" class="form-label">ไฟล์แผนปฏิบัติงานสหกิจศึกษา</label>
                                <a href="../uploads/<?php echo htmlspecialchars($row['outline_work_plan_file']); ?>" target="_blank">ดูไฟล์แผนปฏิบัติงานสหกิจศึกษา</a>
                            <?php else : ?>
                                <p>ไม่พบไฟล์แผนปฏิบัติงานสหกิจศึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-6">
                        <div class="uploaded-documents">
                            <?php if (!empty($row['outline_std_signature_img'])) : ?>
                                <label class="require" for="formFile" class="form-label">ลายเซ็นนักศึกษา</label>
                                <a href="../uploads/<?php echo htmlspecialchars($row['outline_std_signature_img']); ?>" target="_blank">ดูลายเซ็นนักศึกษา</a>
                            <?php else : ?>
                                <p>ไม่พบลายเซ็นนักศึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <p class="fw-bold text-danger">* โปรดส่งคืน งานสหกิจศึกษา ภายในสัปดาห์ที่ 3
                        นับตั้งแต่วันที่เข้าปฏิบัติงานของนักศึกษาด้วยจักขอบคุณยิ่ง</p>

                    <br>
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
    <script src="../cooperative/assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../cooperative/assets/js/popper.min.js"></script>
    <script src="../cooperative/assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../cooperative/assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="../cooperative/assets/plugins/morris/morris.min.js"></script>
    <script src="../cooperative/assets/plugins/raphael/raphael.min.js"></script>
    <script src="../cooperative/assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>