<?php
include './server.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก
    </title>
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
    <link rel="stylesheet" href="../assets/css/cooperative.css">

    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <?php
        include('./navbar_form_staff.php');

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก

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
                            <p class="fw-semibold text-center">KKU CP-T002 CO-OPERATIVE EDUCATION</p>
                            <p class="fw-semibold text-center">แบบแจ้งรายละเอียดงานและรายละเอียดที่พัก
                            </p>
                            <hr>
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
                            <form class="row g-3" action="./job_description_accommodation_insert.php" method="post"
                                class="form-horizontal" enctype="multipart/form-data">

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-house-door-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                    </svg>&nbsp;ชื่อ-ที่อยู่ สถานประกอบการ</div>

                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">ชื่อสถานประกอบการ
                                        (ภาษาไทย) </label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="accommodation_employer_thai"
                                        require>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อสถานประกอบการ
                                        (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="PTT Public Company Limited" name="accommodation_employer_eng"
                                        require>
                                </div>
                                <p class="fw-bold">ที่อยู่ (เพื่อประกอบการเดินทางไปนิเทศงานนักศึกษาที่ถูกต้อง
                                    โปรดระบุที่อยู่ตามสถานที่ที่นักศึกษาไปปฏิบัติงาน)</p>
                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">เลขที่</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                        name="accommodation_address" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำบล / แขวง</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำบล"
                                        name="accommodation_subdistrict" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">อำเภอ / เขต </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ"
                                        name="accommodation_district" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด"
                                        name="accommodation_province" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์"
                                        name="accommodation_zip" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx"
                                        name="accommodation_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx"
                                        name="accommodation_fax" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="xxxxxxxx@gmail.com" name="accommodation_email" required>
                                </div>

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>&nbsp;ผู้จัดการทั่วไป / ผู้จัดการโรงงาน และผู้ได้รับมอบหมายให้ประสานงาน</div>


                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อผู้จัดการสถานประกอบการ
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ"
                                        name="accommodation_manager_employer" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำแหน่ง </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง"
                                        name="accommodation_maneger_position" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx"
                                        name="accommodation_maneger_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx"
                                        name="accommodation_maneger_fax" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="xxxxxxxx@gmail.com" name="accommodation_maneger_gmail" required>
                                </div>
                                <div>
                                    <p class="require">การติดต่อประสานงานกับวิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
                                        (การนิเทศงานนักศึกษา และอื่น ๆ) ขอมอบให้</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="ติดต่อกับผู้จัดการโดยตรง"
                                            name="accommodation_liaise_type" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            ติดต่อกับผู้จัดการโดยตรง
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            value="ขอมอบหมายให้บุคคลต่อไปนี้ประสานงานแทน"
                                            name="accommodation_liaise_type" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            ขอมอบหมายให้บุคคลต่อไปนี้ประสานงานแทน
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ"
                                        name="accommodation_liaise_fname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                                        name="accommodation_liaise_lname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำแหน่ง </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง "
                                        name="accommodation_liaise_position" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">แผนก </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง "
                                        name="accommodation_liaise_department" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx"
                                        name="accommodation_liaise_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx"
                                        name="accommodation_liaise_fax" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="xxxxxxxx@gmail.com" name="accommodation_liaise_email" required>
                                </div>

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>&nbsp;พนักงานที่ปรึกษา (Job Supervisor)</div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ"
                                        name="accommodation_supervisor_fname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                                        name="accommodation_supervisor_lname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำแหน่ง </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง"
                                        name="accommodation_supervisor_position" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">แผนก </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="แผนก"
                                        name="accommodation_supervisor_department" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx"
                                        name="accommodation_supervisor_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="043-xxx-xxx"
                                        name="accommodation_supervisor_fax" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="xxxxxxxx@gmail.com" name="accommodation_supervisor_email" required>
                                </div>

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                    </svg>&nbsp;งานที่มอบหมายนักศึกษา
                                </div>
                                <div class="col-md-2">
                                    <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                    <select id="inputState" class="form-select"
                                        name="accommodation_assignmentstd_prefix" required>
                                        <option selected>-- เลือก --</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ"
                                        name="accommodation_assignment_std_fname" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล
                                    </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                                        name="accommodation_assignment_std_lname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext"
                                        class="form-label">ตำแหน่งงานที่นักศึกษาปฏิบัติ (Job Position) </label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="ตำแหน่งงานที่นักศึกษาปฏิบัติ"
                                        name="accommodation_assignment_position" required>
                                </div>
                                <div class="mb-3">
                                    <label class="require" for="exampleFormControlTextarea1"
                                        class="form-label">ลักษณะงานที่นักศึกษาปฏิบัติ (Job Description)</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="accommodation_assignment_description"></textarea>
                                </div>

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-house-door-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                    </svg>&nbsp;ข้อมูลที่พัก</div>
                                <p class="fw-bold">ขอแจ้งรายละเอียดเกี่ยวกับที่พักระหว่างปฏิบัติงานสหกิจศึกษา ดังนี้</p>
                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">ที่อยู่เลขที่</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                        name="accommodation_accommodation_address" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำบล / แขวง</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำบล"
                                        name="accommodation_accommodation_subdistrict" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">อำเภอ / เขต </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ"
                                        name="accommodation_accommodation_district" require>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด"
                                        name="accommodation_accommodation_province" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์"
                                        name="accommodation_accommodation_zip" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx"
                                        name="accommodation_accommodationl_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="xxxxxxxx@gmail.com" name="accommodation_accommodation_email"
                                        required>
                                </div>

                                <p class="fw-bold">ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้ในกรณีฉุกเฉิน</p>

                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ชื่อ"
                                        name="accommodation_emergency_fname" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="นามสกุล"
                                        name="accommodation_emergency_lname" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputAddress" class="form-label">เลขที่</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                        name="accommodation_emergency_address" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำบล / แขวง</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำบล"
                                        name="accommodation_emergency_subdistrict" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">อำเภอ / เขต </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ"
                                        name="accommodation_emergency_district" require>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด"
                                        name="accommodation_emergency_province" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์"
                                        name="accommodation_emergency_zip" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="094xxxxxxx"
                                        name="accommodation_emergency_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputEmail4" class="form-lable">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="xxxxxxxx@gmail.com" name="accommodation_emergency_email" required>
                                </div>

                                <div class="fw-bold text-decoration-underline">แผนที่แสดงตำแหน่งที่นักศึกษาไปปฏิบัติงาน
                                </div>
                                <div>เพื่อความสะดวกในการนิเทศงานของคณาจารย์
                                    โปรดระบุชื่อถนนและสถานที่สำคัญใกล้เคียงที่สามารถเข้าใจโดยง่าย</div>
                                <div class="col-md-6">
                                    <label class="require" for="formFile" class="form-label">ไฟล์แผนที่</label>
                                    <input class="form-control" type="file" id="formFile" name="map" required>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <label class="require" for="formFile" class="form-label">ลายเซ็นนักศึกษา</label>
                                    <input class="form-control" type="file" id="formFile"
                                        name="accommodation_std_signature_img" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="formFile"
                                        class="form-label">ลายเซ็นพนักงานที่ปรึกษา</label>
                                    <input class="form-control" type="file" id="formFile"
                                        name="accommodation_staff_signature_img" required>
                                </div>
                                <br>
                                <div class="button">
                                    <button type="button" class="btn btn-danger">
                                        ยกเลิก
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        บันทึก
                                    </button>
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