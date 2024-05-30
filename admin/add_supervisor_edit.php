<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}




$id = $_GET['id'];
$sql = "SELECT * FROM add_supervisor WHERE supervision_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- <link rel="stylesheet" href="./assets/css/addwork.css"> -->
    <link rel="stylesheet" href="./assets/css/work.css">

    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">




    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Tagsinput CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"> -->

    <!-- เชื่อมโยงไฟล์ CSS ของ FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">


    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">




    <!-- ตรวจสอบการเชื่อมต่อ Bootstrap CSS และ jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('./nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid mt-5">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">แก้ไขการนิเทศนักศึกษา</h3> -->
                        <ul class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">อาจารย์</li>
                            <li class="breadcrumb-item active">อาจารย์นิเทศ</li>
                            <li class="breadcrumb-item active">เพิ่มการนิเทศนักศึกษา</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- รายชื่อพนักงาน -->

            <div class="head-title">
                <div class="col-autoleft">
                    <h6 class="page-title">แก้ไขการนิเทศนักศึกษา</h6>
                </div>

                <div class="col-auto float-right ml-auto">
                    <!-- <a href="#"><button type="button" class="btn btn-outline-primary">เพิ่มสถานประกอบการ</button></a> -->
                    <!-- <a href="#"><button type="button" class="btn btn-outline-primary">เข้าร่วมเรียบร้อยเเล้ว</button></a>
                    <a href="#"><button type="button" class="btn btn-outline-primary">ยังไม่ได้เข้าร่วม</button></a> -->
                </div>


            </div><br>

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">

                        <form onsubmit="return validateAddsupervisorForm()"  action="./add_supervisor/add_supervisor_update.php" method="POST">

                            <?php


                            // คำสั่ง SQL สำหรับดึงข้อมูลบริษัทจากตาราง tbl_company
                            $sql_company = "SELECT * FROM tbl_company";
                            $result_company = $conn->query($sql_company);

                            // คำสั่ง SQL สำหรับดึงข้อมูลพนักงานจากตาราง hr
                            $sql_hr = "SELECT * FROM hr";
                            $result_hr = $conn->query($sql_hr);
                            ?>



                            <div class="row mb-3">
                                <div class="col">
                                    ชื่อบริษัท
                                    <select name="company_name" id="company_name" class="form-control" onchange="selectCompanyAndStudents()">
                                        <?php
                                        // Loop through each company option
                                        if ($result_company->num_rows > 0) {
                                            while ($company_row = $result_company->fetch_assoc()) {
                                                // Check if the company name matches the one from the database
                                                $selected = ($company_row['company'] == $row['company_name']) ? "selected" : "";
                                                echo "<option value='" . $company_row['company'] . "' $selected>" . $company_row['company'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <script>
                                function selectCompanyAndStudents() {
                                    var companyName = document.getElementById("company_name").value;
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("GET", "get_company_address.php?company_name=" + encodeURIComponent(companyName), true);
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            var companyAddress = JSON.parse(xhr.responseText);
                                            document.getElementById("company_address").value = companyAddress.address;
                                            document.getElementById("company_subdistrict").value = companyAddress.subdistrict;
                                            document.getElementById("company_district").value = companyAddress.district;
                                            document.getElementById("company_province").value = companyAddress.province;
                                            document.getElementById("company_zip").value = companyAddress.zip;


                                            getStudents(companyName);
                                        }
                                    };
                                    xhr.send();
                                }

                                function getStudents(companyName) {
                                    var xhr = new XMLHttpRequest();
                                    xhr.open("GET", "get_students_by_company.php?companyName=" + encodeURIComponent(companyName), true);
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            document.getElementById("studentTableBody").innerHTML = xhr.responseText;
                                        }
                                    };
                                    xhr.send();
                                }


                                
                            </script>





                            <!-- <div class="row mb-3">
                                    <div class="col">
                                        ชื่อบริษัท
                                        <input type="text" name="company_name" class="form-control" placeholder="" value="<?= $row['company_name'] ?>">

                                    </div>


                                </div> -->



                            <div class="row mb-3">
                                <div class="col">
                                    ที่อยู่
                                    <input type="text" id="company_address" name="company_address" class="form-control" minlength="5" maxlength="20" value="<?= $row['company_address'] ?>">
                                </div>
                                <div class="col">
                                    ตำบล/แขวง
                                    <input type="text" id="company_subdistrict" name="company_subdistrict" class="form-control" value="<?= $row['company_subdistrict'] ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    อำเภอ/เขต
                                    <input type="text" id="company_district" name="company_district" class="form-control" minlength="5" maxlength="20" value="<?=$row['company_district']?>">
                                </div>
                                <div class="col col-sm-6">
                                    จังหวัด
                                    <input type="text" id="company_province" name="company_province" class="form-control" value="<?=$row['company_province'] ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col col-sm-6">
                                    รหัสไปรษณีย์
                                    <input type="text" id="company_zip" name="company_zip" class="form-control" minlength="5" maxlength="20" value="<?= $row['company_zip'] ?>">
                                </div>

                                <div class="col col-sm-6">
                                    วันที่ออกนิเทศ
                                    <input type="date" name="date_supervision" class="form-control"  value="<?= $row['date_supervision'] ?>">
                                </div>
                            </div>



                    </div>



                    <div class="row mb-3">
                        <div class="col">
                            อาจารย์นิเทศคนที่ 1
                            <select name="supervisor_1"  id="supervisor_1" class="form-select">
                                <!-- <option value="" selected="selected">ไม่เลือก</option> -->

                                <?php
                                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // คำสั่ง SQL เพื่อดึงชื่อของอาจารย์นิเทศทั้งหมด
                                $sql = "SELECT name FROM login_teacher WHERE role = 'supervision_teacher'";
                                $result = $conn->query($sql);

                                // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                if ($result->num_rows > 0) {
                                    // Loop through each row and generate options
                                    while ($teacher_row = $result->fetch_assoc()) {
                                        $selected = ($teacher_row['name'] == $row['supervisor_1']) ? "selected" : "";
                                        echo '<option value="' . $teacher_row["name"] . '" ' . $selected . '>' . $teacher_row["name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>ไม่พบข้อมูลอาจารย์นิเทศ</option>';
                                }
                                ?>
                            </select>
                        </div>


                        <div class="col">
                            อาจารย์นิเทศคนที่ 2
                            <select name="supervisor_2" id="supervisor_2"  class="form-select">
                           

                                <?php
                                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // คำสั่ง SQL เพื่อดึงชื่อของอาจารย์นิเทศทั้งหมด
                                $sql = "SELECT name FROM login_teacher WHERE role = 'supervision_teacher'";
                                $result = $conn->query($sql);

                                // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                if ($result->num_rows > 0) {
                                    // Loop through each row and generate options
                                    while ($teacher_row = $result->fetch_assoc()) {
                                        $selected = ($teacher_row['name'] == $row['supervisor_2']) ? "selected" : "";
                                        echo '<option value="' . $teacher_row["name"] . '" ' . $selected . '>' . $teacher_row["name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>ไม่พบข้อมูลอาจารย์นิเทศ</option>';
                                }
                                ?>
                            </select>
                        </div>


                        <div class="col">
                            อาจารย์นิเทศคนที่ 3
                            <select name="supervisor_3"  id="supervisor_3" class="form-select">
                                <option value="" selected="selected"><?= $row['supervisor_3'] ?></option>
                                <?php
                                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // คำสั่ง SQL เพื่อดึงชื่อของอาจารย์นิเทศทั้งหมด
                                $sql = "SELECT name FROM login_teacher WHERE role = 'supervision_teacher'";
                                $result = $conn->query($sql);

                                // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                if ($result->num_rows > 0) {
                                    // Loop through each row and generate options
                                    while ($teacher_row = $result->fetch_assoc()) {
                                        $selected = ($teacher_row['name'] == $row['supervisor_3']) ? "selected" : "";
                                        echo '<option value="' . $teacher_row["name"] . '" ' . $selected . '>' . $teacher_row["name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>ไม่พบข้อมูลอาจารย์นิเทศ</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="selected_students" id="selected_students" value="">


                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            อาจารย์นิเทศคนที่ 4
                            <select name="supervisor_4" id="supervisor_4"class="form-select">
                                <option value="" selected="selected"><?= $row['supervisor_4'] ?></option>
                                <?php
                                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // คำสั่ง SQL เพื่อดึงชื่อของอาจารย์นิเทศทั้งหมด
                                $sql = "SELECT name FROM login_teacher WHERE role = 'supervision_teacher'";
                                $result = $conn->query($sql);

                                // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                if ($result->num_rows > 0) {
                                    // Loop through each row and generate options
                                    while ($teacher_row = $result->fetch_assoc()) {
                                        $selected = ($teacher_row['name'] == $row['supervisor_4']) ? "selected" : "";
                                        echo '<option value="' . $teacher_row["name"] . '" ' . $selected . '>' . $teacher_row["name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>ไม่พบข้อมูลอาจารย์นิเทศ</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col">
                            อาจารย์นิเทศคนที่ 5
                            <select name="supervisor_5" id="supervisor_5" class="form-select">
                                <option value="" selected="selected"><?= $row['supervisor_5'] ?></option>
                                <?php
                                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // คำสั่ง SQL เพื่อดึงชื่อของอาจารย์นิเทศทั้งหมด
                                $sql = "SELECT name FROM login_teacher WHERE role = 'supervision_teacher'";
                                $result = $conn->query($sql);

                                // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                if ($result->num_rows > 0) {
                                    // Loop through each row and generate options
                                    while ($teacher_row = $result->fetch_assoc()) {
                                        $selected = ($teacher_row['name'] == $row['supervisor_5']) ? "selected" : "";
                                        echo '<option value="' . $teacher_row["name"] . '" ' . $selected . '>' . $teacher_row["name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>ไม่พบข้อมูลอาจารย์นิเทศ</option>';
                                }
                                ?>
                            </select>
                        </div>


                        <div class="col">
                            อาจารย์นิเทศคนที่ 6
                            <select name="supervisor_6" id="supervisor_6"  class="form-select">
                                <option value="" selected="selected"><?= $row['supervisor_6'] ?></option>
                                <?php
                                // ตรวจสอบการเชื่อมต่อฐานข้อมูล
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // คำสั่ง SQL เพื่อดึงชื่อของอาจารย์นิเทศทั้งหมด
                                $sql = "SELECT name FROM login_teacher WHERE role = 'supervision_teacher'";
                                $result = $conn->query($sql);

                                // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                if ($result->num_rows > 0) {
                                    // Loop through each row and generate options
                                    while ($teacher_row = $result->fetch_assoc()) {
                                        $selected = ($teacher_row['name'] == $row['supervisor_6']) ? "selected" : "";
                                        echo '<option value="' . $teacher_row["name"] . '" ' . $selected . '>' . $teacher_row["name"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>ไม่พบข้อมูลอาจารย์นิเทศ</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php




                    ?>


                    <div class="card leave-box" id="leave_hospitalisation">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto  h3 card-title with-switch">รายชื่อนักศึกษา</div>

                                <div class="leave-action col-auto  ">
                                    <!-- <button class="btn btn-sm btn-primary " type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> เพิ่มนักศึกษา</button> -->
                                </div><br>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>สาขา</th>
                                            <th>อีเมล</th>
                                            <th>ชื่อบริษัท</th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentTableBody">
                                        <?php
                                        $sql_std_supervision = "SELECT * FROM std_supervision";
                                        $result_std_supervision = mysqli_query($conn, $sql_std_supervision);
                                        $std_supervision_names = array();

                                        // เก็บชื่อจาก std_supervision เพื่อใช้ในการเช็ค
                                        while ($row_std_supervision = mysqli_fetch_array($result_std_supervision)) {
                                            $std_supervision_names[] = $row_std_supervision['std_fname'];
                                        }

                                        // ดึงข้อมูลจาก login_student
                                        $sql_petition_document = "SELECT * FROM petition_document ";
                                        $result_petition_document = mysqli_query($conn, $sql_petition_document);

                                        while ($row_petition_document = mysqli_fetch_array($result_petition_document)) {
                                            // เช็คว่ามีข้อมูลครบถ้วนหรือไม่
                                            if (
                                                !empty($row_petition_document["petition_fname"]) &&
                                                !empty($row_petition_document["petition_lname"]) &&
                                                !empty($row_petition_document["petition_field_of_study"]) &&
                                                !empty($row_petition_document["petition_organiztion_name"])
                                            ) {

                                                $std_fname = $row_petition_document["petition_fname"];
                                                $std_lname = $row_petition_document["petition_lname"];
                                                $std_major = $row_petition_document["petition_field_of_study"];
                                                $std_email = $row_petition_document["email"];
                                                $company_name = $row_petition_document["petition_organiztion_name"];
                                        ?>
                                                <tr>
                                                    <td><input type="checkbox" class="checkItem" name="selected_students[]" value="<?= $std_fname ?>" <?php echo in_array($std_fname, $std_supervision_names) ? 'checked' : '' ?>></td>
                                                    <td><?= $std_fname ?></td>
                                                    <td><?= $std_lname ?></td>
                                                    <td><?= $std_major ?></td>
                                                    <td><?= $std_email ?></td>
                                                    <td><?= $company_name ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>



                            

                        </div>
                    </div>


                    <div class="button text-right"><br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" id="submit" name="submit" onclick="return validateAddsupervisorForm()" class="btn btn-success">บันทึก</button>
                        <a href="./supervisor.php"><button type="button" class="btn btn-danger">ยกเลิก</button></a>
                    </div>




                </div>
            </div>






            </form>




            <!-- ส่วนของข้อมูลทั้งหมด -->
        </div>
        <!-- /ส่วนของข้อมูล -->
    </div>
    </div>
    <!-- /Page Wrapper -->







    <script>
        document.getElementById('checkAll').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('#studentTableBody .checkItem');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('checkAll').checked;
            });
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function validateAddsupervisorForm() {
        var fields = ["company_name", "company_address", "company_subdistrict",
            "company_district", "company_province", "company_zip",
            "date_supervision", "supervisor_1", "supervisor_2",
            "supervisor_3", "supervisor_4", "supervisor_4",
            "supervisor_6"
        ];

        var selectedStudents = document.querySelectorAll('.checkItem:checked');

        if (selectedStudents.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'กรุณาเลือกนักศึกษา',
                text: 'คุณต้องเลือกอย่างน้อยหนึ่งรายการ',
            });
            return false;
        }

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
</script>









    <!-- Select2 JS -->
    <!-- 
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script> -->

    <!-- Multiselect JS -->
    <script src="assets/js/multiselect.min.js"></script>




    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>

    <!-- ตารางรายชื่อ -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/js/tablemember.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>

    <script>
        
    </script>





</body>

</html>