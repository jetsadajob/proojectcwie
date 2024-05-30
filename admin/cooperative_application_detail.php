<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id']; // รับค่า id จาก URL
$sql = "SELECT * FROM login_student 
RIGHT JOIN coop_application_form ON login_student.email = coop_application_form.email 
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
    <title>ใบสมัครงานสหกิจศึกษา</title>
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
        include('nav_admin.php');

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                        <li class="breadcrumb-item ">แบบฟอร์มสหกิจ</li>
                        <li class="breadcrumb-item ">นักศึกษาที่ยื่นคำร้องสหกิจศึกษา</li>
                        <li class="breadcrumb-item ">รายละเอียด</li>
                        <li class="breadcrumb-item ">ใบสมัครงานสหกิจศึกษา</li>
                    </ol>
                </nav>



                <div class="text-center">
                    <h4>ใบสมัครงานสหกิจศึกษา </h4>

                </div><br>
                <form class="row g-3" action="./cooperative_application_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                            <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z" />
                        </svg>&nbsp;รูปถ่าย / Recent Photo of Applicant</div>
                    <div class="col-mb-3">
                        <!-- 2 std_application_profile_img -->
                        <div class="uploaded-documents text-center"> <!-- เพิ่ม class text-center เพื่อจัดให้อยู่ตรงกลาง -->
                            <?php if (!empty($row['std_application_profile_img'])) : ?>
                                <!-- <label for="formFile" class="form-label">รูปภาพ</label> -->
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['std_application_profile_img']); ?>" target="_blank">
                                    <img src="../cooperative/uploads/<?php echo htmlspecialchars($row['std_application_profile_img']); ?>" alt="รูปภาพ" style="width: 10%; "> <!-- กำหนดขนาดของรูปภาพเป็น 1 นิ้ว -->
                                </a>
                            <?php else : ?>
                                <p>ไม่พบรูปภาพ</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 	3	coop_name_of_employer -->
                        <label for="inputtext" class="form-label">ชื่อสถานประกอบการที่ต้องการสมัคร / Name of
                            employer</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อสถานประกอบการ" name="coop_name_of_employer" value="<?php echo isset($row['coop_name_of_employer']) ? $row['coop_name_of_employer'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 4	coop_position -->
                        <label for="inputtext" class="form-label">สมัครงานในตำแหน่ง / Position sought</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="coop_position" value="<?php echo isset($row['coop_position']) ? $row['coop_position'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="coop_working_period_start" class="form-lable">จาก / From</label>
                        <input type="date" class="form-control" id="coop_working_period_start" name="coop_working_period_start" value="<?php echo isset($row['coop_working_period_start']) ? $row['coop_working_period_start'] : ''; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="coop_working_period_end" class="form-lable">ถึง / Until</label>
                        <input type="date" class="form-control" id="coop_working_period_end" name="coop_working_period_end" value="<?php echo isset($row['coop_working_period_end']) ? $row['coop_working_period_end'] : ''; ?>" disabled>
                    </div>


                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>&nbsp;ข้อมูลส่วนตัวนักศึกษา (STUDENT PERSONAL DATA)</div>
                        <div class="col-md-2">
                        <!-- 7	coop_prefix_thai -->
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="coop_prefix_thai" disabled>
                            <option><?php echo isset($row['std_prefix']) ? $row['std_prefix'] : ''; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <!-- 8	coop_fname_thai -->
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="coop_fname_thai" value="<?php echo isset($row['std_fname']) ? $row['std_fname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-5">
                        <!-- 9	coop_lname_thai -->
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="coop_lname_thai" value="<?php echo isset($row['std_lname']) ? $row['std_lname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-2">
                        <!-- 10	coop_prefix_eng -->
                        <label for="inputState" class="form-label">Prefix</label>
                        <select id="inputState" class="form-select" name="coop_prefix_eng" disabled>
                            <option><?php echo isset($row['coop_prefix_eng']) ? $row['coop_prefix_eng'] : ''; ?></option>
                            <option value="mr">mr</option>
                            <option value="miss">miss</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <!-- 11	coop_fname_eng -->
                        <label for="inputtext" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="Name" name="coop_fname_eng" value="<?php echo isset($row['coop_fname_eng']) ? $row['coop_fname_eng'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-5">
                        <!-- 12	coop_lname_eng -->
                        <label for="inputtext" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="Surname" name="coop_lname_eng" value="<?php echo isset($row['coop_lname_eng']) ? $row['coop_lname_eng'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 13	coop_std_id -->
                        <label for="studentIdInput" class="form-label">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="studentIdInput" placeholder="6xxxxxxxx-x" name="coop_std_id" value="<?php echo isset($row['std_id']) ? $row['std_id'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 14	coop_year_of_study -->
                        <label for="inputState" class="form-label">ชั้นปี</label>
                        <select id="inputState" class="form-select" name="coop_year_of_study" disabled>
                            <option selected><?php echo isset($row['year_of_study']) ? $row['year_of_study'] : ''; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <!-- 15 coop_faculty -->
                        <label for="inputState" class="form-label">คณะ</label>
                        <select id="inputState" class="form-select" name="coop_faculty" disabled>
                            <option value="cpkku">วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <!-- 16	coop_field_of_study -->
                        <label for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="coop_field_of_study" disabled>
                            <option selected><?php echo isset($row['major']) ? $row['major'] : ''; ?></option>
                            <!-- <option value="cs">วิทยาการคอมพิวเตอร์</option>
                            <option value="it">เทคโนโลยีสารสนเทศ</option>
                            <option value="gis">ภูมิสารสนเทศศาสตร์</option>
                            <option value="ai">ปัญญาประดิษฐ์</option>
                            <option value="cy">ความมั่นคงปลอดภัยไซเบอร์</option> -->
                        </select>
                    </div>

                    <p class="fw-bold">อาจารย์ที่ปรึกษา</p>
                    <div class="col-md-2">
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="coop_advisor_prefix" disabled>
                            <option selected><?php echo isset($row['teacher_prefix']) ? $row['teacher_prefix'] : ''; ?></option>
                            <option value="ศ. ดร.">ศ. ดร.</option>
                            <option value="รศ. ดร.">รศ. ดร.</option>
                            <option value="ผศ. ดร.">ผศ. ดร.</option>
                            <option value="อ. ดร.">อ. ดร.</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="coop_advisor_fname" value="<?php echo isset($row['teacher_fname']) ? $row['teacher_fname'] : ''; ?>" disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="coop_advisor_lname" value="<?php echo isset($row['teacher_lname']) ? $row['teacher_lname'] : ''; ?>" disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 18	coop_gpa -->
                        <label for="inputtext" class="form-label">เกรดเฉลี่ยรวม / GPA</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="เกรดเฉลี่ย" name="coop_gpa" value="<?php echo isset($row['coop_gpa']) ? $row['coop_gpa'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 19	coop_phone -->
                        <label for="coopPhoneInput" class="form-label">โทรศัพท์</label>
                        <input type="tel" class="form-control" id="coopPhoneInput" placeholder="กรอกหมายเลขโทรศัพท์" name="coop_phone" value="<?php echo isset($row['std_phone']) ? $row['std_phone'] : ''; ?> " disabled pattern="[0-9]{10}">
                    </div>
                    <div class="col-md-6">
                        <!-- 20	coop_email -->
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?> " disabled>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>&nbsp;ที่อยู่ที่ติดต่อได้</div>

                    <div class="col-12">
                        <!-- 	21	coop_std_address -->
                        <label for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="coop_std_address" value="<?php echo isset($row['coop_std_address']) ? $row['coop_std_address'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 22	coop_std_subdistrict -->
                        <label for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="coop_std_subdistrict" value="<?php echo isset($row['coop_std_subdistrict']) ? $row['coop_std_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 23	coop_std_district -->
                        <label for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="coop_std_district" value="<?php echo isset($row['coop_std_district']) ? $row['coop_std_district'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 24	coop_std_province -->
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="coop_std_province" value="<?php echo isset($row['coop_std_province']) ? $row['coop_std_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 25	coop_std_zip -->
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="coop_std_zip" value="<?php echo isset($row['coop_std_zip']) ? $row['coop_std_zip'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 26 coop_std_phone -->
                        <label for="coopStdPhoneInput" class="form-label require">โทรศัพท์</label>
                        <input type="tel" class="form-control" id="coopStdPhoneInput" placeholder="กรอกหมายเลขโทรศัพท์" name="coop_std_phone" value="<?php echo isset($row['std_phone']) ? $row['std_phone'] : ''; ?> " disabled pattern="[0-9]{10}">
                    </div>
                    <div class="col-md-6">
                        <!-- 27 coop_std_email -->
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="กรอกอีเมล" name="coop_std_email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?> " disabled>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>&nbsp;บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน (Emergency case contact to)</div>

                    <div class="col-md-6">
                        <!-- 28	coop_emergency_fname -->
                        <label for="inputtext" class="form-label">ชื่อ / Name</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="coop_emergency_fname" value="<?php echo isset($row['coop_emergency_fname']) ? $row['coop_emergency_fname'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 29	coop_emergency_lname -->
                        <label for="inputtext" class="form-label">นามสกุล / Surname</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="coop_emergency_lname" value="<?php echo isset($row['coop_emergency_lname']) ? $row['coop_emergency_lname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 30	coop_emergency_relation -->
                        <label for="inputtext" class="form-label">ความเกี่ยวข้อง / Relation</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ความเกี่ยวข้อง" name="coop_emergency_relation" value="<?php echo isset($row['coop_emergency_relation']) ? $row['coop_emergency_relation'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 31	coop_emergency_occupation -->
                        <label for="inputtext" class="form-label">อาชีพ / Occupayion</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อาชีพ" name="coop_emergency_occupation" value="<?php echo isset($row['coop_emergency_occupation']) ? $row['coop_emergency_occupation'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-12">
                        <!-- 32	coop_emergency_place_of_work -->
                        <label for="inputtext" class="form-label">สถานที่ทำงาน / Place of Work</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อหน่วยงาน" name="coop_emergency_place_of_work" value="<?php echo isset($row['coop_emergency_place_of_work']) ? $row['coop_emergency_place_of_work'] : ''; ?> " disabled>
                    </div>

                    <!-- <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>&nbsp;ที่อยู่</div> -->

                    <div class="col-12">
                        <!-- 33	coop_emergency_address -->
                        <label for="inputAddress" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="coop_emergency_address" value="<?php echo isset($row['coop_emergency_address']) ? $row['coop_emergency_address'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 34	coop_emergency_subdistrict -->
                        <label for="inputtext" class="form-label">แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="coop_emergency_subdistrict" value="<?php echo isset($row['coop_emergency_subdistrict']) ? $row['coop_emergency_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 35	coop_emergency_district -->
                        <label for="inputtext" class="form-label">เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="coop_emergency_district" value="<?php echo isset($row['coop_emergency_district']) ? $row['coop_emergency_district'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 	36	coop_emergency_province -->
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="coop_emergency_province" value="<?php echo isset($row['coop_emergency_province']) ? $row['coop_emergency_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 37	coop_emergency_zip -->
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="coop_emergency_zip" value="<?php echo isset($row['coop_emergency_zip']) ? $row['coop_emergency_zip'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 	38	coop_emergency_phone -->
                        <label for="inputtext" class="form-lable">โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094-xxx-xxxx" name="coop_emergency_phone" value="<?php echo isset($row['coop_emergency_phone']) ? $row['coop_emergency_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <!-- 39	coop_emergency_email -->
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="coop_emergency_email" value="<?php echo isset($row['coop_emergency_email']) ? $row['coop_emergency_email'] : ''; ?> " disabled>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
                            <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z" />
                            <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                        </svg>&nbsp;จุดมุ่งหมายงานอาชีพ (CAREER OBJECTIVES)</div>

                    <div class="col-md-12">
                        <!-- 40	coop_career_objective -->
                        <label for="exampleFormControlTextarea1" class="form-label">ระบุสายงานและลักษณะงานอาชีพที่นักศึกษาสนใจ / Indicate your career objectives, fields of interest and job preference</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="ลักษณะงานอาชีพที่นักศึกษาสนใจ" name="coop_career_objective" disabled><?php echo isset($row['coop_career_objective']) ? $row['coop_career_objective'] : ''; ?> </textarea>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                        </svg>&nbsp;ข้าพเจ้าขอรับรองว่าข้อความทั้งหมดเป็นความจริงและถูกต้องทุกประการ</div>

                    <!-- <div class="col-md-6">
                        <div class="uploaded-documents">
                            <?php if (!empty($row['coop_applicant_signature'])) : ?>
                                <label for="formFile" class="form-label">ลงชื่อผู้สมัคร</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_applicant_signature']); ?>" target="_blank">ดูชื่อผู้ลงสมัคร</a>
                            <?php else : ?>
                                <p>ไม่ชื่อผู้สมัคร</p>
                            <?php endif; ?>
                        </div>
                    </div> -->

                    <div class="col-md-6">
                         <!-- 41	coop_applicant_signature -->
                        <div class="uploaded-documents text-left"> <!-- เพิ่ม class text-center เพื่อจัดให้อยู่ตรงกลาง -->
                            <?php if (!empty($row['coop_applicant_signature'])) : ?>
                                <label for="formFile" class="form-label">ลงชื่อผู้สมัคร</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_applicant_signature']); ?>" target="_blank">
                                    <img src="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_applicant_signature']); ?>" alt="รูปภาพ" style="width: 150px; "> <!-- กำหนดขนาดของรูปภาพเป็น 1 นิ้ว -->
                                </a>
                            <?php else : ?>
                                <p>ไม่พบลงชื่อผู้สมัคร</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                            <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                            <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                        </svg>&nbsp;นักศึกษาโปรดแนบเอกสารดังต่อไปนี้อย่างละ 1 ชุด</div>

                    <div class="col-md-6">
                        <!-- 42	coop_petition_documennt -->
                        <div class="uploaded-documents">
                            <?php if (!empty($row['coop_petition_documennt'])) : ?>
                                <label for="formFile" class="form-label">ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_petition_documennt']); ?>" target="_blank">ดูใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</a>
                            <?php else : ?>
                                <p>ไม่พบใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 43	coop_copy_std_id_card_file -->
                        <div class="uploaded-documents">
                            <?php if (!empty($row['coop_copy_std_id_card_file'])) : ?>
                                <label for="formFile" class="form-label">สำเนาบัตรประจำตัวนักศึกษา</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_copy_std_id_card_file']); ?>" target="_blank">ดูสำเนาบัตรประจำตัวนักศึกษา</a>
                            <?php else : ?>
                                <p>ไม่พบสำเนาบัตรประจำตัวนักศึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 44	coop_copy_id_card_file -->
                        <div class="uploaded-documents">
                            <?php if (!empty($row['coop_copy_id_card_file'])) : ?>
                                <label for="formFile" class="form-label">สำเนาบัตรประชาชน</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_copy_id_card_file']); ?>" target="_blank">ดูสำเนาบัตรประชาชน</a>
                            <?php else : ?>
                                <p>ไม่พบสำเนาบัตรประชาชน</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 45	coop_copy_acadamic_report_file -->
                        <div class="uploaded-documents">
                            <?php if (!empty($row['coop_copy_acadamic_report_file'])) : ?>
                                <label for="formFile" class="form-label">สำเนาใบรายงานผลการศึกษา</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_copy_acadamic_report_file']); ?>" target="_blank">ดูสำเนาใบรายงานผลการศึกษา</a>
                            <?php else : ?>
                                <p>ไม่พบสำเนาใบรายงานผลการศึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- 46	coop_cv_file -->
                        <div class="uploaded-documents">
                            <?php if (!empty($row['coop_cv_file'])) : ?>
                                <label for="formFile" class="form-label">ประวัติส่วนตัว (CV)</label>
                                <a href="../cooperative/uploads/<?php echo htmlspecialchars($row['coop_cv_file']); ?>" target="_blank">ดูประวัติส่วนตัว (CV)</a>
                            <?php else : ?>
                                <p>ไม่พบประวัติส่วนตัว (CV)</p>
                            <?php endif; ?>
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
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <!-- <script src="../assets/js/jquery.slimscroll.min.js"></script> -->



    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>