<?php
session_start();
include '../server.php';


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
    JOIN job_description_accommodation ON login_student.email = job_description_accommodation.email
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
    <title>แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก
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
    <div class="content container-fluid">
        <div class="content-page">
            <div class="col-sm-12">
                <p class="fw-semibold text-center">แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก
                </p>
                <!-- <hr> -->
                <p class="fw-bold">ผู้ให้ข้อมูล : ผู้จัดการฝ่ายบุคคล หรือพนักงานที่ปรึกษา</p>
                <p class="fw-bold text-decoration-underline">คำชี้แจง</p>
                <p>เพื่อให้การประสานงานระหว่างงานสหกิจศึกษา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
                    และสถานประกอบการเป็นไปโดยความเรียบร้อยและมีประสิทธิภาพ
                    จึงใคร่ขอความกรุณาผู้จัดการฝ่ายบุคคลหรือผู้ที่รับผิดชอบดูแลการปฏิบัติงานสหกิจศึกษาของนักศึกษาได้โปรดประสานงานกับพนักงานที่ปรึกษา
                    (Job Supervisor) เพื่อจัดทำข้อมูลตำแหน่งงาน ลักษณะงาน และผู้ทำหน้าที่พนักงานที่ปรึกษา
                    แบบฟอร์ม (KKU CP-T002) ฉบับนี้</p>
                <p class="fw-bold text-decoration-underline">และโปรดส่งกลับคืนงานสหกิจศึกษา
                    วิทยาลัยการคอมพิวเตอร์ ภายในสัปดาห์แรกตามปฏิทินการปฏิบัติงานสหกิจศึกษาด้วยจักขอบคุณยิ่ง
                </p>
            </div>
            <form class="row g-3" action="./job_description_accommodation_detail.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcol Color" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                    </svg>&nbsp;ที่อยู่สถานประกอบการ</div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputAddress" class="form-label">ชื่อสถานประกอบการ
                            (ภาษาไทย) </label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="accommodation_employer_thai" value="<?php echo isset($row['accommodation_employer_thai']) ? $row['accommodation_employer_thai'] : ''; ?> " disabled>
                    </div>

                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ชื่อสถานประกอบการ
                            (ภาษาอังกฤษ)</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="PTT Public Company Limited" name="accommodation_employer_eng" value="<?php echo isset($row['accommodation_employer_eng']) ? $row['accommodation_employer_eng'] : ''; ?> " disabled>
                    </div>
                </div>

                <p class="fw-bold">ที่อยู่ (เพื่อประกอบการเดินทางไปนิเทศงานนักศึกษาที่ถูกต้อง
                    โปรดระบุที่อยู่ตามสถานที่ที่นักศึกษาไปปฏิบัติงาน)</p>
                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputAddress" class="form-label">เลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="accommodation_address" value="<?php echo isset($row['accommodation_address']) ? $row['accommodation_address'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ตำบล / แขวง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="accommodation_subdistrict" value="<?php echo isset($row['accommodation_subdistrict']) ? $row['accommodation_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">อำเภอ / เขต </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="accommodation_district" value="<?php echo isset($row['accommodation_district']) ? $row['accommodation_district'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="accommodation_province" value="<?php echo isset($row['accommodation_province']) ? $row['accommodation_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="accommodation_zip" value="<?php echo isset($row['accommodation_zip']) ? $row['accommodation_zip'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx" name="accommodation_phone" value="<?php echo isset($row['accommodation_phone']) ? $row['accommodation_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx" name="accommodation_fax" value="<?php echo isset($row['accommodation_fax']) ? $row['accommodation_fax'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com" name="accommodation_email" value="<?php echo isset($row['accommodation_email']) ? $row['accommodation_email'] : ''; ?> " disabled>
                    </div>
                </div>




                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcol Color" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>&nbsp;ผู้จัดการทั่วไป / ผู้จัดการโรงงาน และผู้ได้รับมอบหมายให้ประสานงาน</div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ชื่อผู้จัดการสถานประกอบการ
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="accommodation_manager_employer" value="<?php echo isset($row['accommodation_manager_employer']) ? $row['accommodation_manager_employer'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ตำแหน่ง </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="accommodation_maneger_position" value="<?php echo isset($row['accommodation_maneger_position']) ? $row['accommodation_maneger_position'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_maneger_phone" value="<?php echo isset($row['accommodation_maneger_phone']) ? $row['accommodation_maneger_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_maneger_fax" value="<?php echo isset($row['accommodation_maneger_fax']) ? $row['accommodation_maneger_fax'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com" name="accommodation_maneger_email" value="<?php echo isset($row['accommodation_maneger_email']) ? $row['accommodation_maneger_email'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div><br>
                        <p>การติดต่อประสานงานกับวิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
                            (การนิเทศงานนักศึกษา และอื่น ๆ) ขอมอบให้</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accommodation_liaise_type" id="flexRadioDefault1" value="ติดต่อกับผู้จัดการโดยตรง" <?php echo (isset($row['accommodation_liaise_type']) && $row['accommodation_liaise_type'] == 'ติดต่อกับผู้จัดการโดยตรง') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                ติดต่อกับผู้จัดการโดยตรง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accommodation_liaise_type" id="flexRadioDefault2" value="ขอมอบหมายให้บุคคลต่อไปนี้ประสานงานแทน" <?php echo (isset($row['accommodation_liaise_type']) && $row['accommodation_liaise_type'] == 'ขอมอบหมายให้บุคคลต่อไปนี้ประสานงานแทน') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                ขอมอบหมายให้บุคคลต่อไปนี้ประสานงานแทน
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ชื่อ
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="-" name="accommodation_liaise_fname" value="<?php echo isset($row['accommodation_liaise_fname']) ? $row['accommodation_liaise_fname'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">นามสกุล
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="-" name="accommodation_liaise_lname" value="<?php echo isset($row['accommodation_liaise_lname']) ? $row['accommodation_liaise_lname'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ตำแหน่ง </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="- " name="accommodation_liaise_position" value="<?php echo isset($row['accommodation_liaise_position']) ? $row['accommodation_liaise_position'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">แผนก </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="- " name="accommodation_liaise_department" value="<?php echo isset($row['accommodation_liaise_department']) ? $row['accommodation_liaise_department'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_liaise_phone" value="<?php echo isset($row['accommodation_liaise_phone']) ? $row['accommodation_liaise_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_liaise_fax" value="<?php echo isset($row['accommodation_liaise_fax']) ? $row['accommodation_liaise_fax'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="-" name="accommodation_liaise_email" value="<?php echo isset($row['accommodation_liaise_email']) ? $row['accommodation_liaise_email'] : ''; ?> " disabled>
                    </div>
                </div>


                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcol Color" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>&nbsp;พนักงานที่ปรึกษา (Job Supervisor)</div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ชื่อ
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="accommodation_supervisor_fname" value="<?php echo isset($row['accommodation_supervisor_fname']) ? $row['accommodation_supervisor_fname'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">นามสกุล
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="accommodation_supervisor_lname" value="<?php echo isset($row['accommodation_supervisor_lname']) ? $row['accommodation_supervisor_lname'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ตำแหน่ง </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง" name="accommodation_supervisor_position" value="<?php echo isset($row['accommodation_supervisor_position']) ? $row['accommodation_supervisor_position'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">แผนก </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="แผนก" name="accommodation_supervisor_department" value="<?php echo isset($row['accommodation_supervisor_department']) ? $row['accommodation_supervisor_department'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_supervisor_phone" value="<?php echo isset($row['accommodation_supervisor_phone']) ? $row['accommodation_supervisor_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_supervisor_fax" value="<?php echo isset($row['accommodation_supervisor_fax']) ? $row['accommodation_supervisor_fax'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="xxxxxxxx@gmail.com" name="accommodation_supervisor_email" value="<?php echo isset($row['accommodation_supervisor_email']) ? $row['accommodation_supervisor_email'] : ''; ?> " disabled>
                    </div>
                </div>


                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcol Color" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                    </svg>&nbsp;งานที่มอบหมายนักศึกษา
                </div>

                <div class="row">
                    <div class="col col-md-2">
                        <label for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="accommodation_assignment_std_prefix" disabled>
                            <option><?php echo isset($std['std_prefix']) ? $std['std_prefix'] : ''; ?></option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col col-md-5">
                        <label for="inputtext" class="form-label">ชื่อ
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_fname" value="<?php echo isset($std['std_fname']) ? $std['std_fname'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-5">
                        <label for="inputtext" class="form-label">นามสกุล
                        </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_lname" value="<?php echo isset($std['std_lname']) ? $std['std_lname'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="col col-md-6">
                    <label for="inputtext" class="form-label">ตำแหน่งงานที่นักศึกษาปฏิบัติ (Job Position) </label>
                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่งงานที่นักศึกษาปฏิบัติ" name="accommodation_assignment_position" value="<?php echo isset($row['accommodation_assignment_position']) ? $row['accommodation_assignment_position'] : ''; ?> " disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ลักษณะงานที่นักศึกษาปฏิบัติ (Job Description)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ลักษณะงานที่นักศึกษาปฏิบัติ" name="accommodation_assignment_description" disabled><?php echo isset($row['accommodation_assignment_description']) ? $row['accommodation_assignment_description'] : ''; ?> </textarea>
                </div>

                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcol Color" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                    </svg>&nbsp;ข้อมูลที่พัก</div>

                <p class="fw-bold">ขอแจ้งรายละเอียดเกี่ยวกับที่พักระหว่างปฏิบัติงานสหกิจศึกษา ดังนี้</p>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputAddress" class="form-label">ที่อยู่เลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="-" name="accommodation_accommodation_address" value="<?php echo isset($row['accommodation_accommodation_address']) ? $row['accommodation_accommodation_address'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ตำบล / แขวง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="-" name="accommodation_accommodation_subdistrict" value="<?php echo isset($row['accommodation_accommodation_subdistrict']) ? $row['accommodation_accommodation_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">อำเภอ / เขต </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="-" name="accommodation_accommodation_district" value="<?php echo isset($row['accommodation_accommodation_district']) ? $row['accommodation_accommodation_district'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="-" name="accommodation_accommodation_province" value="<?php echo isset($row['accommodation_accommodation_province']) ? $row['accommodation_accommodation_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="-" name="accommodation_accommodation_zip" value="<?php echo isset($row['accommodation_accommodation_zip']) ? $row['accommodation_accommodation_zip'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_accommodationl_phone" value="<?php echo isset($row['accommodation_accommodationl_phone']) ? $row['accommodation_accommodationl_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="-" name="accommodation_accommodation_email" value="<?php echo isset($row['accommodation_accommodation_email']) ? $row['accommodation_accommodation_email'] : ''; ?> " disabled>
                    </div>
                </div>


                <p class="fw-bold">ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้ในกรณีฉุกเฉิน</p>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputAddress" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="ชื่อ" name="accommodation_emergency_fname" value="<?php echo isset($row['accommodation_emergency_fname']) ? $row['accommodation_emergency_fname'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputAddress" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="นามสกุล" name="accommodation_emergency_lname" value="<?php echo isset($row['accommodation_emergency_lname']) ? $row['accommodation_emergency_lname'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputAddress" class="form-label">เลขที่</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="accommodation_emergency_address" value="<?php echo isset($row['accommodation_emergency_address']) ? $row['accommodation_emergency_address'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">ตำบล / แขวง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="accommodation_emergency_subdistrict" value="<?php echo isset($row['accommodation_emergency_subdistrict']) ? $row['accommodation_emergency_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">อำเภอ / เขต </label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="accommodation_emergency_district" value="<?php echo isset($row['accommodation_emergency_district']) ? $row['accommodation_emergency_district'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="accommodation_emergency_province" value="<?php echo isset($row['accommodation_emergency_province']) ? $row['accommodation_emergency_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="accommodation_emergency_zip" value="<?php echo isset($row['accommodation_emergency_zip']) ? $row['accommodation_emergency_zip'] : ''; ?> " disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <label for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" class="form-control" id="phone" placeholder="-" name="accommodation_emergency_phone" value="<?php echo isset($row['accommodation_emergency_phone']) ? $row['accommodation_emergency_phone'] : ''; ?> " disabled>
                    </div>
                    <div class="col col-md-6">
                        <label for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="-" name="accommodation_emergency_email" value="<?php echo isset($row['accommodation_emergency_email']) ? $row['accommodation_emergency_email'] : ''; ?> " disabled>
                    </div>
                </div>


                <div class="fw-bold text-decoration-underline">แผนที่แสดงตำแหน่งที่นักศึกษาไปปฏิบัติงาน
                </div>
                <div>เพื่อความสะดวกในการนิเทศงานของคณาจารย์
                    โปรดระบุชื่อถนนและสถานที่สำคัญใกล้เคียงที่สามารถเข้าใจโดยง่าย</div>
                <div class="col-md-6">
                    <div class="uploaded-documents">
                        <p>- แผนที่</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <div class="uploaded-documents text-left"> <!-- เพิ่ม class text-center เพื่อจัดให้อยู่ตรงกลาง -->
                            <?php if (!empty($row['accommodation_std_signature_img'])) : ?>
                                <label for="formFile" class="form-label">ลายเซ็นนักศึกษา</label>
                                <a href="../uploads/<?php echo htmlspecialchars($row['accommodation_std_signature_img']); ?>" target="_blank">
                                    <img src="../uploads/<?php echo htmlspecialchars($row['accommodation_std_signature_img']); ?>" alt="รูปภาพ" style="width: 20%; "> <!-- กำหนดขนาดของรูปภาพเป็น 1 นิ้ว -->
                                </a>
                            <?php else : ?>
                                <p>ไม่พบลายเซ็นนักศึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="uploaded-documents text-left"> <!-- เพิ่ม class text-center เพื่อจัดให้อยู่ตรงกลาง -->
                            <?php if (!empty($row['accommodation_staff_signature_img'])) : ?>
                                <label for="formFile" class="form-label">ลายเซ็นพนักงานที่ปรึกษา</label>
                                <a href="../uploads/<?php echo htmlspecialchars($row['accommodation_staff_signature_img']); ?>" target="_blank">
                                    <img src="../uploads/<?php echo htmlspecialchars($row['accommodation_staff_signature_img']); ?>" alt="รูปภาพ" style="width: 20%; "> <!-- กำหนดขนาดของรูปภาพเป็น 1 นิ้ว -->
                                </a>
                            <?php else : ?>
                                <p>ไม่พบลายเซ็นพนักงานที่ปรึกษา</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <?php
            for ($i = 0; $i < 18; $i++) {
            ?>
                <div class="col-4">
                    <svg id="barcode_<?= $i ?>"></svg>
                    <script>
                        JsBarcode("#barcode_<?= $i ?>", "<?= $_GET['barcode'] ?>");
                    </script>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function printDocument() {
            window.print(); // Open print dialog
        }

        // Call the printDocument function when the document is ready
        document.addEventListener('DOMContentLoaded', function() {
            printDocument();
        });
    </script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>