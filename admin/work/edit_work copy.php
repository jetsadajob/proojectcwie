<?php
include 'dbwork.php';
$id = $_GET['id'];
$sql = "SELECT * FROM job_recruitment WHERE recruitment_id='$id' "; //เช็คเงื่อนไขที่ส่งมา
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); //ส่งไปอสดงผลที่บล๊อค
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
    <title>Addmin</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">





    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/addwork.css">
    <link rel="stylesheet" href="../assets/css/work.css">


    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- Main Wrapper -->
    <!-- Main Wrapper -->
    <div class="main-wrapper">


        <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
        <?php include('./nav_admin.php'); ?>
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
                                <li class="breadcrumb-item"><a href="../addmin.php">Dashboard</a></li>
                                <li class="breadcrumb-item">สถานประกอบการ</li>
                                <li class="breadcrumb-item active">แก้ไขประกาศรับสมัครงาน</li>
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



                        <form action="update_work.php" method="POST">

                            <!-- <div class="form first">
								<input type="file" name="image">
							</div> -->


                            <div class="form first">
                                <div class="details personal">
                                    <!-- <span class="title">Personal Details</span> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-img-wrap edit-img">
                                                <?php
                                                if (file_exists('./uploads/' . $row["recruitment_id"] . '.png')) {
                                                    echo '<img class="thumbnail" src="./uploads/' . $row["recruitment_id"] . '.png" width="120" height="120" alt="" style="margin:0px;">';
                                                } else {
                                                    echo '<img src="../assets/img/img2.svg" alt="รูปภาพ" class="inline-block" id="uploaded-img">';
                                                }
                                                ?>

                                                <div class="fileupload btn">
                                                    <span class="btn-text">แก้ไขรูปภาพ</span>
                                                    <input class="upload" type="file" id="file-input" name="recruitment_company_image" value=<?= $row['recruitment_company_image'] ?>>
                                                    <div class="kv-attribute">
                                                        <?php if (file_exists('./uploads/' . $row["recruitment_id"] . '.png')) : ?>
                                                            <img class="thumbnail" src="./uploads/<?= $row["recruitment_id"] ?>.png" width="120" height="120" alt="" style="margin:0px;">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        const inputElement = document.getElementById('file-input');
                                        const uploadedImgElement = document.getElementById('uploaded-img');
                                        const recruitmentCompanyId = <?= $row['recruitment_id'] ?>;

                                        inputElement.addEventListener('change', (event) => {
                                            const file = event.target.files[0];

                                            if (file) {
                                                const reader = new FileReader();

                                                reader.onload = (e) => {
                                                    uploadedImgElement.src = e.target.result;
                                                };

                                                reader.readAsDataURL(file);
                                            } else {
                                                // เช็คว่ารูปภาพเดิมมีอยู่หรือไม่
                                                const recruitmentCompanyId = <?= $row['recruitment_id'] ?>;

                                                fetch(`./uploads/${recruitmentCompanyId}.png`)
                                                    .then(response => {
                                                        if (!response.ok) {
                                                            throw new Error('File not found');
                                                        }
                                                        // ถ้ามีภาพในฐานข้อมูล ให้ใช้รูปภาพเดิม
                                                        uploadedImgElement.src = `./uploads/${recruitmentCompanyId}.png`;
                                                    })
                                                    .catch(error => {
                                                        // ถ้าไม่มีภาพในฐานข้อมูล ให้ใช้รูปภาพ default
                                                        uploadedImgElement.src = '../assets/img/img2.svg';
                                                    });
                                            }
                                        });
                                    </script>


                                    <div class="fields">
                                        <div class="input-field">
                                            <label>บริษัท/สถานประกอบการ</label>
                                            <input type="text" name="recruitment_company_name" value=<?= $row['recruitment_company_name'] ?>>
                                        </div>

                                        <div class="input-field">
                                            <label>ประเภท</label>
                                            <select class="typework" name="recruitment_type_company">
                                                <option value="ไม่ระบุ"> <?= $row['recruitment_type_company'] ?></option>
                                                <option value="นักศึกษาฝึกงาน">บริษัท/เอกชน</option>
                                                <option value="นักศึกษาสหกิจศึกษา">ร้านค้า</option>
                                                <option value="นักศึกษาจบใหม่">หน่วยงานราชการ</option>
                                                <option value="พนักงานประจำ">รัฐวิสาหกิจ</option>


                                            </select>

                                            <!-- <input type="text" placeholder="Enter your name" required> -->
                                        </div>

                                        <div class="input-field">
                                            <label>ที่ตั้ง</label>
                                            <input type="text" name="recruitment_company_address" value=<?= $row['recruitment_company_address'] ?> id="recruitment_id">
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
                                                <option value="" selected disabled><?= $row['recruitment_company_province'] ?></option>
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
                                            <select class="typework" name="recruitment_company_district" id="amphures"> <?= $row['recruitment_company_district'] ?></select>
                                        </div>


                                        <div class="input-field">
                                            <label>เขต/ตำบล</label>
                                            <select class="typework" name="recruitment_company_subdistrict" id="districts" ><?= $row['recruitment_company_subdistrict'] ?></select>
                                        </div>
                                        <div class="input-field">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" name="recruitment_company_zip" id="zip_code" <?= $row['recruitment_company_zip'] ?>>
                                        </div>



                                        <div class="input-field">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" name="recruitment_company_phone" value=<?= $row['recruitment_company_phone'] ?> id="recruitment_id">
                                        </div>

                                        <div class="input-field">
                                            <label>อีเมล</label>
                                            <input type="text" name="recruitment_company_email" value=<?= $row['recruitment_company_email'] ?> id="recruitment_id">
                                        </div>

                                        <!-- <div class="input-field">
                                            <label>เว็บไซต์</label>
                                            <input type="text" name="websi_com" required>
                                        </div> -->

                                        <div class="input-field1">
                                            <label>เกี่ยวกับบริษัท/สถานประกอบการ</label>
                                            <!-- <input type="text" name="recruitment_company_detail" value=<?= $row['recruitment_company_detail'] ?>> -->

                                            <div class="wrappertext">
                                                <textarea spellcheck="false" name="recruitment_company_detail" placeholder=""><?= $row['recruitment_company_detail'] ?></textarea>
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
                                        <select class="typework" name="recruitment_company_form_of_work" value=<?= $row['recruitment_company_form_of_work'] ?>>
                                            <option value="ไม่ระบุ"><?= $row['recruitment_company_form_of_work'] ?></option>
                                            <option value="นักศึกษาฝึกงาน">นักศึกษาฝึกงาน</option>
                                            <option value="นักศึกษาสหกิจศึกษา">นักศึกษาสหกิจศึกษา</option>
                                            <option value="นักศึกษาจบใหม่">ผู้สำเร็จการศึกษา</option>
                                            <option value="พนักงานประจำ">พนักงานประจำ</option>
                                            <option value="นักศึกษาฝึกงานและนักศึกษาสหกิจศึกษา">นักศึกษาฝึกงานและนักศึกษาสหกิจศึกษา</option>

                                        </select>

                                    </div>

                                    <div class="input-field">
                                        <label>ชื่อตำแหน่งงาน</label>
                                        <input type="text" name="recruitment_company_role" value=<?= $row['recruitment_company_role'] ?>>
                                    </div>

                                    <div class="input-field">
                                        <label>ประเภทงาน</label>
                                        <input type="text" name="recruitment_company_typejob" value=<?= $row['recruitment_company_typejob'] ?>>

                                    </div>

                                    <div class="input-field">
                                        <label>อัตราที่รับ</label>
                                        <input type="text" name="recruitment_company_amout" value=<?= $row['recruitment_company_amout'] ?>>

                                    </div>

                                    <div class="input-field">
                                        <label>เงินเดือน</label>
                                        <input type="text" name="recruitment_company_salary" value=<?= $row['recruitment_company_salary'] ?>>
                                    </div>

                                    <div class="input-field">
                                        <label>ประสบการณ์ทำงาน (ปี)</label>
                                        <input type="text" name="recruitment_company_experienc" value=<?= $row['recruitment_company_experienc'] ?>>
                                    </div>

                                    <div class="input-field">
                                        <label>เพศ</label>
                                        <select class="typework" name="recruitment_company_gender" value=<?= $row['recruitment_company_gender'] ?>>
                                            <option value="ไม่ระบุ"><?= $row['recruitment_company_gender'] ?></option>
                                            <option value="ไม่จำกัด">ไม่จำกัด</option>
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>วุฒิการศึกษา</label>
                                        <select class="typework" name="recruitment_company_education" value=<?= $row['recruitment_company_education'] ?>>
                                            <option value="ไมระบุ"><?= $row['recruitment_company_education'] ?></option>
                                            <option value="ไม่จำกัด">ไม่จำกัด</option>
                                            <option value="ม.3">ม.3</option>
                                            <option value="ม.6">ม.6</option>
                                            <option value="ปวช.">ปวช.</option>
                                            <option value="ปวส.">ปวส.</option>
                                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                                            <option value="ปริญญาโท">ปริญญาโท</option>
                                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                                        </select>
                                    </div>

                                    <div class="input-field">
                                        <label>สถานที่ทำงาน</label>
                                        <input type="text" name="recruitment_company_location" value=<?= $row['recruitment_company_location'] ?>>
                                    </div>



                                    <div class="input-field1">
                                        <label>รายละเอียดงาน / คุณสมบัติอื่นๆ / สวัสดิการ /วิธีการรับสมัคร</label>
                                        <!-- <input type="area" name="recruitment_company_detailjob" required> -->
                                        <div class="wrappertext">
                                            <textarea spellcheck="false" name="recruitment_company_detailjob" placeholder=""><?= $row['recruitment_company_detail'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="file">
                                    <h4>ไฟล์แนบ</h4>
                                    <input type="file" name="recruitment_company_file" value=<?= $row['recruitment_company_file'] ?>>
                                </div>
                                <br>

                                <!-- <div class="checks">
                                    <input type="checkbox">
                                    <span class="checkmark">ฉันเข้าใจและยอมรับ เงื่อนไขและข้อตกลงในการใช้งาน
                                        การให้บริการของเว็บไซต์ cp-cwie.kku.ac.th</span>
                                </div> -->

                            </div>

                            <input type="submit" value="บันทึก" class="btn btn-success">
                            <a href="../hr.php" class="btn btn-danger ">ยกเลิก</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>

    <script>
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e => {
            textarea.style.height = "63px";
            let scHeight = e.target.scrollHeight;
            textarea.style.height = `${scHeight}px`;
        });
    </script>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#provinces').change(function() {
            var id_province = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax_db.php",
                data: {
                    id: id_province,
                    function: 'provinces'
                },
                success: function(data) {
                    $('#amphures').html(data);
                    $('#districts').html(' ');
                    $('#districts').val(' ');
                    $('#zip_code').val(' ');
                }
            });
        });

        $('#amphures').change(function() {
            var id_amphures = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax_db.php",
                data: {
                    id: id_amphures,
                    function: 'amphures'
                },
                success: function(data) {
                    $('#districts').html(data);
                }
            });
        });

        $('#districts').change(function() {
            var id_districts = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax_db.php",
                data: {
                    id: id_districts,
                    function: 'districts'
                },
                success: function(data) {
                    $('#zip_code').val(data)
                }
            });

        });
    </script>
</body>

</html>