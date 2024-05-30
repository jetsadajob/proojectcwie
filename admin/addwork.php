<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">



    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="../internship/assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/addwork.css">
    <link rel="stylesheet" href="assets/css/work.css">


    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item">สถานประกอบการ</li>
                            <li class="breadcrumb-item active">ลงประกาศรับสมัครงาน</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page Header -->

            <div class="head-title">
                <div class="left">
                    <h3 class="topic">ลงประกาศรับสมัครงาน</h3>
                </div>
            </div><br>


            <!-- <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="page-title">ประกาศรับสมัครงาน</p>
                        </div>
                        <a href="./addwork.html" class="btn-download">
                            <i class='bx bxs-file'></i>
                            <span class="text">ลงประกาศรับสมัครงาน</span>
                        </a>
                    </div>
                </div> -->

            <!-- รับสมัครงาน -->
            <div class="information">
                <h5>เงื่อนไขและข้อตกลงในการใช้งาน</h5>
                <p class="content">1. cp-cwie.kku.ac.th อนุญาตให้พื้นที่นี้
                    เป็นสื่อกลางในการประกาศตำแหน่งงานว่างออนไลน์เท่านั้น</p>
                <p class="content">2. ห้ามโฆษณาหรือนำไปใช้ในทางที่ผิดวัตถุประสงค์ทุกประเภท
                    ฝ่าฝืนจะมีความผิดตามกฎหมาย
                </p>
                <p class="content">3. ระบบจะบันทึกรายละเอียดของผู้ที่กรอกข้อมูล เพื่อนำไปฟ้องร้องและเอาผิดตามกฎหมาย
                    ในกรณีใช้งานผิดข้อตกลง</p>
                <p class="content">4. ข้อมูลตำแหน่งงานที่ได้เพิ่มเข้าสู่ระบบทุกตำแหน่ง
                    ต้องผ่านการตรวจสอบจากเจ้าหน้าที่ก่อน จึงจะสามารถแสดงข้อมูลให้เห็นได้</p>
                <p class="content">5. cp-cwie.kku.ac.th ขอสงวนสิทธิ์ในการเพิ่ม ลบ แก้ไข ประกาศ
                    โดยมิต้องแจ้งให้ทราบล่วงหน้า</p>
                <p class="content">6. ตำแหน่งงานที่ได้รับการอนุมัติแล้ว จะแสดงอยู่บนเว็บไซต์ 3 เดือนเท่านั้น</p>
                <p class="content">7. งดให้บริการกับงานประเภท รายได้เสริมบนอินเตอร์เน็ต, แจกใบปลิว/โพสตามเว็บบอร์ด
                    ขายตรง mlm ประกันภัย ทุกชนิด หรืองานที่เข้าข่าย ขายตรง mlm ประกันภัย ทุกชนิด
                    และงานที่สมาชิกแจ้งร้องเรียนมา</p>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        &nbsp;<i class='bx bxs-landmark'></i>
                        <header>ข้อมูลบริษัท/สถานประกอบการ</header>
                    </div>


                    <form onsubmit="return validateAddAddworkForm()" method="post" action="./work/insert_work.php" enctype="multipart/form-data" id="addwork" >

                        <div class="form first">
                            <div class="details personal">
                                <!-- <span class="title">Personal Details</span>  -->
                                <!-- ส่วน HTML สำหรับแสดงรูปภาพ -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            <img class="inline-block" id="uploaded-img" src="./assets/img/img2.svg" alt="รูปภาพ">
                                            <div class="fileupload btn">
                                                <span class="btn-text">เพิ่มรูปภาพ</span>
                                                <input class="upload" type="file" id="file-input" name="recruitment_company_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    const inputElement = document.getElementById('file-input');
                                    const uploadedImgElement = document.getElementById('uploaded-img');

                                    inputElement.addEventListener('change', (event) => {
                                        const file = event.target.files[0];

                                        if (file) {
                                            const reader = new FileReader();

                                            reader.onload = (e) => {
                                                uploadedImgElement.src = e.target.result;
                                            };

                                            reader.readAsDataURL(file);
                                        } else {
                                            uploadedImgElement.src = './assets/img/img2.svg';
                                        }
                                    });
                                </script>





                                <div class="fields">
                                    <?php
                                    // ทำการเชื่อมต่อกับฐานข้อมูล
                                    include './work/dbwork.php';

                                    // ทำการคำสั่ง SQL เพื่อดึงข้อมูลบริษัทจากตาราง job_recruitment
                                    $sql_company = "SELECT * FROM job_recruitment";
                                    $result_company = $conn->query($sql_company);
                                    ?>


                                    <div class="input-field">
                                        <label for="recruitment_company_name">ชื่อบริษัท/สถานประกอบการ</label>
                                        <input type="text" id="recruitment_company_name" name="recruitment_company_name" list="company_names" onchange="inputCompany()" required>
                                        <datalist id="company_names">
                                            <?php
                                            // วนลูปเพื่อแสดงรายชื่อบริษัท
                                            if ($result_company->num_rows > 0) {
                                                while ($row = $result_company->fetch_assoc()) {
                                                    echo "<option value='" . $row['recruitment_company_name'] . "'>";
                                                }
                                            }
                                            ?>
                                        </datalist>
                                    </div>





                                    <div class="input-field">
                                        <label>ประเภท</label>

                                        <select class="typework" id="recruitment_type_company" name="recruitment_type_company" required>
                                            <option value="">--กรุณาเลือก--</option>
                                            <option value="บริษัท/เอกชน">บริษัท/เอกชน</option>
                                            <option value="ร้านค้า">ร้านค้า</option>
                                            <option value="หน่วยงานราชการ">หน่วยงานราชการ</option>
                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>


                                        </select>

                                        <!-- <input type="text" placeholder="Enter your name" required> -->
                                    </div>

                                    <!-- <div class="input-field">
                                        <label>ที่ตั้ง</label>
                                        <input type="text" name="recruitment_company_address" required>
                                    </div>

                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "projectcwie") or die("Error: " . mysqli_error($con));
                                    mysqli_query($con, "SET NAMES 'utf8' ");
                                    error_reporting(error_reporting() & ~E_NOTICE);
                                    date_default_timezone_set('Asia/Bangkok');
                                    ?>
                                    


                                    <div class="input-field">
                                        <label for="sel1">จังหวัด:</label>
                                        <select class="typework" name="recruitment_company_province" id="provinces">
                                            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM provinces");
                                            while ($value = mysqli_fetch_assoc($query)) {
                                                echo '<option  value="' . $value['id'] . '">' . $value['name_th'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>แขวง/อำเภอ</label>
                                        <select class="typework" name="recruitment_company_district" id="amphures" required></select>
                                    </div>


                                    <div class="input-field">
                                        <label>เขต/ตำบล</label>
                                        <select class="typework" name="recruitment_company_subdistrict" id="districts" required></select>
                                    </div>
                                    <div class="input-field">
                                        <label>รหัสไปรษณีย์</label>
                                        <input type="text" name="recruitment_company_zip" id="zip_code" required>
                                    </div> -->
                                    <!-- <script>
                                        function inputCompany() {
                                            var companyName = document.getElementById("recruitment_company_name").value;
                                            var xhr = new XMLHttpRequest();
                                            xhr.open("GET", "get_company_address_work.php?recruitment_company_name=" + encodeURIComponent(companyName), true);
                                            xhr.onreadystatechange = function() {
                                                if (xhr.readyState == 4 && xhr.status == 200) {
                                                    var companyAddress = JSON.parse(xhr.responseText);
                                                    // ตรวจสอบว่ามีข้อมูลที่อยู่ของบริษัทหรือไม่
                                                    if (companyAddress && companyAddress.recruitment_company_address) {
                                                        document.getElementById("recruitment_type_company").value = companyAddress.recruitment_type_company;
                                                        document.getElementById("recruitment_company_address").value = companyAddress.recruitment_company_address;
                                                        document.getElementById("recruitment_company_subdistrict").value = companyAddress.recruitment_company_subdistrict;
                                                        document.getElementById("recruitment_company_district").value = companyAddress.recruitment_company_district;
                                                        document.getElementById("recruitment_company_province").value = companyAddress.recruitment_company_province;
                                                        document.getElementById("recruitment_company_zip").value = companyAddress.recruitment_company_zip;
                                                        document.getElementById("recruitment_company_phone").value = companyAddress.recruitment_company_phone;
                                                        document.getElementById("recruitment_company_email").value = companyAddress.recruitment_company_email;
                                                        document.getElementById("recruitment_company_detail").value = companyAddress.recruitment_company_detail;
                                                        validateAddAddworkForm();

                                                    } else {
                                                        // ถ้าไม่มีข้อมูลบริษัท ให้เคลียร์ค่าใน input field
                                                        document.getElementById("recruitment_type_company").value = "";
                                                        document.getElementById("recruitment_company_address").value = "";
                                                        document.getElementById("recruitment_company_subdistrict").value = "";
                                                        document.getElementById("recruitment_company_district").value = "";
                                                        document.getElementById("recruitment_company_province").value = "";
                                                        document.getElementById("recruitment_company_zip").value = "";
                                                        document.getElementById("recruitment_company_phone").value = "";
                                                        document.getElementById("recruitment_company_email").value = "";
                                                        document.getElementById("recruitment_company_detail").value = "";
                                                    }
                                                }
                                            };
                                            xhr.send();
                                        }
                                    </script> -->


                                    <div class="input-field">
                                        <label for="recruitment_company_address">ที่อยู่</label>
                                        <input type="text" id="recruitment_company_address" name="recruitment_company_address" required>
                                    </div>

                                    <div class="input-field">
                                        <label for="recruitment_company_subdistrict">เขต/ตำบล</label>
                                        <input type="text" id="recruitment_company_subdistrict" name="recruitment_company_subdistrict" required>
                                    </div>

                                    <div class="input-field">
                                        <label for="recruitment_company_district">แขวง/อำเภอ</label>
                                        <input type="text" id="recruitment_company_district" name="recruitment_company_district" required>
                                    </div>

                                    <div class="input-field">
                                        <label for="recruitment_company_province">จังหวัด</label>
                                        <input type="text" id="recruitment_company_province" name="recruitment_company_province" required>
                                    </div>

                                    <div class="input-field">
                                        <label for="recruitment_company_zip">รหัสไปรษณีย์</label>
                                        <input type="text" id="recruitment_company_zip" name="recruitment_company_zip" required>
                                    </div>








                                    <div class="input-field">
                                        <label>เบอร์โทรศัพท์</label>
                                        <input type="text" id="recruitment_company_phone" name="recruitment_company_phone" required>
                                    </div>

                                    <div class="input-field">
                                        <label>อีเมล</label>
                                        <input type="text" id="recruitment_company_email" name="recruitment_company_email" required>
                                    </div>



                                    <div class="input-field1">
                                        <label>เกี่ยวกับบริษัท/สถานประกอบการ</label>
                                        <!-- <input type="text" name="recruitment_company_detail" required> -->
                                        <div class="wrappertext">
                                            <textarea spellcheck="false" id="recruitment_company_detail" name="recruitment_company_detail" placeholder="" required></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div><br>

                            <div class="head">
                                &nbsp;<i class="bx bxs-stopwatch"></i>
                                <header>ข้อมูลลงประกาศตำแหน่งงาน</header>
                            </div>

                            <div class="fields">
                                <div class="input-field">
                                    <label>รูปแบบการรับ</label>
                                    <select class="typework" name="recruitment_company_form_of_work" id="recruitment_company_form_of_work" required>
                                        <option value="">--กรุณาเลือก--</option>
                                        <option value="นักศึกษาฝึกงาน">นักศึกษาฝึกงาน</option>
                                        <option value="นักศึกษาสหกิจศึกษา">นักศึกษาสหกิจศึกษา</option>
                                        <option value="ผู้สำเร็จการศึกษา">ผู้สำเร็จการศึกษา</option>
                                        <option value="พนักงานประจำ">พนักงานประจำ</option>
                                        <option value="นักศึกษาฝึกงานและนักศึกษาสหกิจศึกษา">นักศึกษาฝึกงาน
                                            และนักศึกษาสหกิจศึกษา</option>

                                    </select>

                                </div>

                                <div class="input-field">
                                    <label>ชื่อตำแหน่งงาน</label>
                                    <input type="text" name="recruitment_company_role"  id="recruitment_company_role" required>
                                </div>

                                <div class="input-field">
                                    <label>ประเภทงาน</label>
                                    <select class="typework" name="recruitment_company_typejob" id="recruitment_company_typejob" required>
                                        <option value="">--กรุณาเลือก--</option>
                                        <option value="UX/UI,Mobile DeveloperOne">Data Scientist/Data Engineer/Data Analyst</option>
                                        <option value=" Software Tester"> Software Tester</option>
                                        <option value="Programmer">Programmer</option>
                                        <option value="UX/UI,Mobile DeveloperOne">IT Manager/Senior Programmer</option>
                                        <option value=" Software Tester"> IT Support/Help Desk</option>
                                        <option value="Programmer">Mobile Developer</option>
                                        <option value="UX/UI,Mobile DeveloperOne">UX/UI,Mobile DeveloperOne</option>
                                        <option value=" Software Tester"> QA/Tester/Software Tester</option>
                                        <option value="Programmer">System Admin/IT Network/Network Engineer</option>
                                        <option value="UX/UI,Mobile DeveloperOne">System Analyst</option>
                                        <option value=" Software Tester"> UX/UI Designer</option>
                                        <option value="Programmer">ภูมิศาสตร์/แผนที่/GIS/ผังเมือง</option>
                                        <option value="Programmer">Web Design /Web Developer /Web Content</option>
                                        <option value="Programmer">โปรแกรมเมอร์/IT</option>
                                    </select>

                                </div>

                                <div class="input-field">
                                    <label>อัตราที่รับ</label>
                                    <input type="text" name="recruitment_company_amout"  id="recruitment_company_amout" required>

                                </div>

                                <div class="input-field">
                                    <label>เบี้ยเลี้ยง</label>
                                    <input type="text" name="recruitment_company_salary"  id="recruitment_company_salary" required>
                                </div>

                                <div class="input-field">
                                    <label>ประสบการณ์ทำงาน (ปี)</label>
                                    <input type="text" name="recruitment_company_experienc" id="recruitment_company_experienc" required>
                                </div>

                                <div class="input-field">
                                    <label>เพศ</label>
                                    <select class="typework" name="recruitment_company_gender" id="recruitment_company_gender"  required>
                                        <option value="">--กรุณาเลือก--</option>
                                        <option value="ไม่จำกัด">ไม่จำกัด</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>วุฒิการศึกษา</label>
                                    <select class="typework" name="recruitment_company_education" id="recruitment_company_education" required>
                                        <option value="">--กรุณาเลือก--</option>
                                        <option value="ไม่จำกัด">ไม่จำกัด</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>สถานที่ทำงาน</label>
                                    <input type="text" name="recruitment_company_location"  id="recruitment_company_location" required>
                                </div>

                                <div class="input-field1">
                                    <label>รายละเอียดงาน / คุณสมบัติอื่นๆ / สวัสดิการ /วิธีการรับสมัคร</label>
                                    <!-- <input type="area" name="recruitment_company_detailjob" required> -->
                                    <div class="wrappertext">
                                        <textarea spellcheck="false" name="recruitment_company_detailjob" id="recruitment_company_detailjob" placeholder="" required onchange="validateAddAddWorkForm()"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="file">
                                <h4>เอกสารเพิ่มเติม</h4>
                                <input type="file" name="recruitment_company_file" id="recruitment_company_file">
                                <p>นามสกุลไฟล์ที่สามารถแนบได้ pdf, png, jpg, jpeg</p>
                            </div>
                            <br>

                            <div class="checks">
                                <!-- <input type="checkbox">
                                <span class="checkmark">ฉันเข้าใจและยอมรับ เงื่อนไขและข้อตกลงในการใช้งาน
                                    การให้บริการของเว็บไซต์ cp-cwie.kku.ac.th</span> -->
                            </div>

                            <button type="submit" class="btn btn-success" onclick="return validateAddAddworkForm()">ลงประกาศ</button>

                            <!-- <input type="submit" value="ลงประกาศ" class="btn btn-success "> -->


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e => {
            textarea.style.height = "63px";
            let scHeight = e.target.scrollHeight;
            textarea.style.height = `${scHeight}px`;
        });
    </script>



<script>
    function validateAddAddworkForm() {
        var fields = ["recruitment_company_name", "recruitment_type_company", "recruitment_company_address", 
                      "recruitment_company_district", "recruitment_company_province", "recruitment_company_zip", 
                      "recruitment_company_phone", "recruitment_company_email", "recruitment_company_detail", 
                      "recruitment_company_form_of_work", "recruitment_company_role", "recruitment_company_typejob", 
                      "recruitment_company_amout", "recruitment_company_salary", "recruitment_company_experienc", 
                      "recruitment_company_gender", "recruitment_company_education", "recruitment_company_location", 
                      "recruitment_company_detailjob"];

        for (var i = 0; i < fields.length; i++) {
            var fieldValue = document.getElementById(fields[i]).value.trim();
            if (fieldValue === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                    text: 'ห้ามกรอกข้อมูลที่เป็นช่องว่าง',
                });
                return false;
            }
        }
        return true;
    }

    function inputCompany() {
        var companyName = document.getElementById("recruitment_company_name").value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_company_address_work.php?recruitment_company_name=" + encodeURIComponent(companyName), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var companyAddress = JSON.parse(xhr.responseText);
                // ตรวจสอบว่ามีข้อมูลที่อยู่ของบริษัทหรือไม่
                if (companyAddress && companyAddress.recruitment_company_address) {
                    document.getElementById("recruitment_type_company").value = companyAddress.recruitment_type_company;
                    document.getElementById("recruitment_company_address").value = companyAddress.recruitment_company_address;
                    document.getElementById("recruitment_company_subdistrict").value = companyAddress.recruitment_company_subdistrict;
                    document.getElementById("recruitment_company_district").value = companyAddress.recruitment_company_district;
                    document.getElementById("recruitment_company_province").value = companyAddress.recruitment_company_province;
                    document.getElementById("recruitment_company_zip").value = companyAddress.recruitment_company_zip;
                    document.getElementById("recruitment_company_phone").value = companyAddress.recruitment_company_phone;
                    document.getElementById("recruitment_company_email").value = companyAddress.recruitment_company_email;
                    document.getElementById("recruitment_company_detail").value = companyAddress.recruitment_company_detail;

                    // เรียกใช้ validateAddAddworkForm เมื่อมีการเลือกข้อมูลบริษัทแล้ว
                } else {
                    // ถ้าไม่มีข้อมูลบริษัท ให้เคลียร์ค่าใน input field
                    document.getElementById("recruitment_type_company").value = "";
                    document.getElementById("recruitment_company_address").value = "";
                    document.getElementById("recruitment_company_subdistrict").value = "";
                    document.getElementById("recruitment_company_district").value = "";
                    document.getElementById("recruitment_company_province").value = "";
                    document.getElementById("recruitment_company_zip").value = "";
                    document.getElementById("recruitment_company_phone").value = "";
                    document.getElementById("recruitment_company_email").value = "";
                    document.getElementById("recruitment_company_detail").value = "";
                }
            }
        };
        xhr.send();
    }
</script>



     





    <!--jQuery-- >
        <script
script src = "assets/js/jquery-3.5.1.min.js" >
    </script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        //     $('#provinces').change(function() {
        //         var id_province = $(this).val();

        //         $.ajax({
        //             type: "POST",
        //             url: "ajax_db.php",
        //             data: {
        //                 id: id_province,
        //                 function: 'provinces'
        //             },
        //             success: function(data) {
        //                 $('#amphures').html(data);
        //                 $('#districts').html(' ');
        //                 $('#districts').val(' ');
        //                 $('#zip_code').val(' ');
        //             }
        //         });
        //     });

        //     $('#amphures').change(function() {
        //         var id_amphures = $(this).val();

        //         $.ajax({
        //             type: "POST",
        //             url: "ajax_db.php",
        //             data: {
        //                 id: id_amphures,
        //                 function: 'amphures'
        //             },
        //             success: function(data) {
        //                 $('#districts').html(data);
        //             }
        //         });
        //     });

        //     $('#districts').change(function() {
        //         var id_districts = $(this).val();

        //         $.ajax({
        //             type: "POST",
        //             url: "ajax_db.php",
        //             data: {
        //                 id: id_districts,
        //                 function: 'districts'
        //             },
        //             success: function(data) {
        //                 $('#zip_code').val(data)
        //             }
        //         });

        //     });
        // 
    </script>
</body>

</html>