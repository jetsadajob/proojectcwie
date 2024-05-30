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
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb mt-5">
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
                    <h6 class="page-title">เพิ่มการนิเทศนักศึกษา</h6>
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
                        <form action="add_supervisor_insert.php" method="POST">


                            <div class="row mb-3">
                                <div class="col">
                                    ชื่อบริษัท
                                    <input type="text" name="company_name" class="form-control" placeholder="">

                                </div>

                                <div class="col">
                                    ที่ตั้ง
                                    <input type="text" name="company_address" class="form-control" " minlength=" 5" maxlength="20">
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col">
                                    ตำบล/แขวง
                                    <input type="text" name="company_subdistrict" class="form-control" placeholder="">
                                </div>

                                <div class="col">
                                    อำเภอ/เขต
                                    <input type="text" name="company_district" class="form-control" minlength="5" maxlength="20">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col col-sm-6">
                                    จังหวัด
                                    <input type="text" name="company_province" class="form-control" placeholder="">
                                </div>
                                <div class="col col-sm-6">
                                    รหัสไปรษณีย์
                                    <input type="text" name="company_zip" class="form-control" minlength="5" maxlength="20">
                                </div>
                            </div>

                            <div class="row mb-3">


                                <div class="col">
                                    ชื่อผู้ประสานงาน
                                    <input type="text" name="name_hr" class="form-control" placeholder="">
                                </div>



                            </div>



                            <div class="row mb-3">
                                <div class="col">
                                    อาจารย์นิเทศคนที่ 1
                                    <select name="supervisor_1" class="form-select">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
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
                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละชื่อของอาจารย์นิเทศ
                                            while ($row = $result->fetch_assoc()) {
                                                // นำชื่อของอาจารย์นิเทศมาแสดงในตัวเลือก
                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                            }
                                        } else {
                                            echo "ไม่พบข้อมูลอาจารย์นิเทศ";
                                        }



                                        ?>
                                    </select>
                                </div>


                                <div class="col">
                                    อาจารย์นิเทศคนที่ 2
                                    <select name="supervisor_2" class="form-select">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
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
                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละชื่อของอาจารย์นิเทศ
                                            while ($row = $result->fetch_assoc()) {
                                                // นำชื่อของอาจารย์นิเทศมาแสดงในตัวเลือก
                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                            }
                                        } else {
                                            echo "ไม่พบข้อมูลอาจารย์นิเทศ";
                                        }


                                        ?>
                                    </select>
                                </div>


                                <div class="col">
                                    อาจารย์นิเทศคนที่ 3
                                    <select name="supervisor_3" class="form-select">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
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
                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละชื่อของอาจารย์นิเทศ
                                            while ($row = $result->fetch_assoc()) {
                                                // นำชื่อของอาจารย์นิเทศมาแสดงในตัวเลือก
                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                            }
                                        } else {
                                            echo "ไม่พบข้อมูลอาจารย์นิเทศ";
                                        }


                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="selected_students" id="selected_students" value="">


                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    อาจารย์นิเทศคนที่ 4
                                    <select name="supervisor_4" class="form-select">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
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
                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละชื่อของอาจารย์นิเทศ
                                            while ($row = $result->fetch_assoc()) {
                                                // นำชื่อของอาจารย์นิเทศมาแสดงในตัวเลือก
                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                            }
                                        } else {
                                            echo "ไม่พบข้อมูลอาจารย์นิเทศ";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col">
                                    อาจารย์นิเทศคนที่ 5
                                    <select name="supervisor_5" class="form-select">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
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
                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละชื่อของอาจารย์นิเทศ
                                            while ($row = $result->fetch_assoc()) {
                                                // นำชื่อของอาจารย์นิเทศมาแสดงในตัวเลือก
                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                            }
                                        } else {
                                            echo "ไม่พบข้อมูลอาจารย์นิเทศ";
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="col">
                                    อาจารย์นิเทศคนที่ 6
                                    <select name="supervisor_6" class="form-select">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
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
                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละชื่อของอาจารย์นิเทศ
                                            while ($row = $result->fetch_assoc()) {
                                                // นำชื่อของอาจารย์นิเทศมาแสดงในตัวเลือก
                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                            }
                                        } else {
                                            echo "ไม่พบข้อมูลอาจารย์นิเทศ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <div class="card leave-box" id="leave_hospitalisation">
                                <div class="card-body">

                                    <div class="custom-policy">
                                        <div class="leave-header ">
                                            <div class="row">
                                                <div class="col-auto  h3 card-title with-switch">นักศึกษาที่ออกนิเทศ</div>

                                                <div class="leave-action col-auto  ">
                                                    <button class="btn btn-sm btn-primary " type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> เพิ่มนักศึกษา</button>
                                                </div><br>
                                            </div>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-nowrap leave-table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อ-นามสกุล</th>
                                                        <th>สาขา</th>
                                                        <th>email</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>


                                                <tbody id="selected-students-body">
                                                    <script>
                                                        $(document).ready(function() {
                                                            // เมื่อคลิกที่ dropdown
                                                            $('.dropdown-click').click(function(event) {
                                                                // ป้องกันการโหลดหน้าเพจใหม่
                                                                event.preventDefault();
                                                                // ประมวลผลอื่น ๆ ที่ต้องการทำเมื่อคลิกที่ dropdown นี้
                                                                // ตัวอย่างเช่น เปิดเมนู dropdown
                                                                $(this).parent().find('.dropdown-menu').toggleClass('show');
                                                            });

                                                            // เมื่อฟอร์มถูกส่ง
                                                            $('form').submit(function(event) {
                                                                // ป้องกันการโหลดหน้าเพจใหม่
                                                                event.preventDefault();

                                                                // ดึงข้อมูลที่เลือกมาจากกล่องขวา
                                                                var selectedStudents = $('#customleave_select_to option').map(function() {
                                                                    return $(this).text();
                                                                }).get();

                                                                // ส่งคำขอ AJAX เพื่อดึงข้อมูลจากฐานข้อมูล
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: './add_std_supervisor.php', // ไฟล์ PHP ที่จะดึงข้อมูลจากฐานข้อมูล
                                                                    data: {
                                                                        selectedStudents: selectedStudents
                                                                    }, // ข้อมูลที่จะส่งไปยังไฟล์ PHP
                                                                    dataType: 'json', // ประเภทข้อมูลที่ต้องการรับกลับมา
                                                                    success: function(response) { // เมื่อรับข้อมูลกลับมาสำเร็จ
                                                                        // เพิ่มข้อมูลลงในตาราง
                                                                        response.forEach(function(student) {
                                                                            var row = '<tr>' +
                                                                                '<td>' + student.name + '</td>' +
                                                                                '<td>' + student.major + '</td>' +
                                                                                '<td>' + student.email + '</td>' +
                                                                                '<td><button class="btn btn-danger btn-sm remove-student">ลบ</button></td>' +
                                                                                '</div>' +
                                                                                '</div>' +
                                                                                '</td>' +
                                                                                '</tr>';
                                                                            $('.leave-table tbody').append(row);
                                                                        });
                                                                    },
                                                                    error: function(xhr, status, error) { // เมื่อเกิดข้อผิดพลาด
                                                                        console.error(error);
                                                                    }
                                                                });
                                                            });
                                                        });
                                                        // ลบรายการนักศึกษาจากตาราง
                                                        $(document).on('click', '.remove-student', function() {
                                                            $(this).closest('tr').remove();
                                                        });
                                                    </script>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /Custom Policy -->

                                    <!-- เพิ่มนักศึกาา Modal -->
                                    <div id="add_custom_policy" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">เพิ่มนักศึกาษาที่ออกนิเทศ</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group leave-duallist">
                                                            <label>เพิ่มนักศึกษา</label>
                                                            <div class="row">
                                                                <div class="col-lg-5 col-sm-5">
                                                                    <select name="std" id="customleave_select" class="form-control" size="5" multiple="multiple">

                                                                        <?php


                                                                        // คำสั่ง SQL เพื่อดึงชื่อนักศึกษาทั้งหมด
                                                                        $sql = "SELECT name FROM login_student";
                                                                        $result = $conn->query($sql);

                                                                        // ตรวจสอบว่ามีข้อมูลที่ถูกดึงมาหรือไม่
                                                                        if ($result->num_rows > 0) {
                                                                            // วนลูปเพื่อแสดงตัวเลือกสำหรับแต่ละนักศึกษา
                                                                            while ($row = $result->fetch_assoc()) {
                                                                                // นำชื่อนักศึกษามาแสดงในตัวเลือก
                                                                                echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                                                            }
                                                                        } else {
                                                                            echo "ไม่พบข้อมูลนักศึกษา";
                                                                        }
                                                                        ?>

                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                // เมื่อคลิกปุ่ม "Forward All"
                                                                                $('#customleave_select_rightAll').click(function() {
                                                                                    // ย้ายทุกตัวเลือกจากกล่องซ้ายไปยังกล่องขวา
                                                                                    $('#customleave_select option').appendTo('#customleave_select_to');
                                                                                });

                                                                                // เมื่อคลิกปุ่ม "Backward All"
                                                                                $('#customleave_select_leftAll').click(function() {
                                                                                    // ย้ายทุกตัวเลือกจากกล่องขวาไปยังกล่องซ้าย
                                                                                    $('#customleave_select_to option').appendTo('#customleave_select');
                                                                                });

                                                                                // เมื่อคลิกปุ่ม "Forward Selected"
                                                                                $('#customleave_select_rightSelected').click(function() {
                                                                                    // ย้ายตัวเลือกที่ถูกเลือกจากกล่องซ้ายไปยังกล่องขวา
                                                                                    $('#customleave_select option:selected').appendTo('#customleave_select_to');
                                                                                });

                                                                                // เมื่อคลิกปุ่ม "Backward Selected"
                                                                                $('#customleave_select_leftSelected').click(function() {
                                                                                    // ย้ายตัวเลือกที่ถูกเลือกจากกล่องขวาไปยังกล่องซ้าย
                                                                                    $('#customleave_select_to option:selected').appendTo('#customleave_select');
                                                                                });


                                                                            });
                                                                            // Function to reload table after AJAX request
                                                                        </script>


                                                                    </select>
                                                                </div>

                                                                <div class="multiselect-controls col-lg-2 col-sm-2">
                                                                    <!-- ปุ่มควบคุมการเลือก -->
                                                                    <button type="button" id="customleave_select_rightAll" class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                                                    <button type="button" id="customleave_select_rightSelected" class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                                                    <button type="button" id="customleave_select_leftSelected" class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                                                    <button type="button" id="customleave_select_leftAll" class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                                                                </div>
                                                                <div class="col-lg-5 col-sm-5">
                                                                    <select name="customleave_to" id="customleave_select_to" class="form-control" size="8" multiple="multiple"></select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="submit-section">
                                                            <!-- ปุ่ม submit -->
                                                            <button type="submit" class="btn btn-primary submit-btn">ตกลง</button>

                                                        </div>

                                                    </form>




                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="button text-right"><br>
                                <button type="submit" id="submit" class="btn btn-success">บันทึก</button>
                                <button type="button" class="btn btn-danger">ยกเลิก</button>
                            </div>

                            

                           
                        </form>

                        <!-- <form action="">
                           
                            <div id="edit_custom_policy" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">แก้ไข</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>

                                                <div class="form-group leave-duallist">
                                                    <label>เพิ่มนักศึกาษา</label>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-5">
                                                            <select name="edit_customleave_from" id="edit_customleave_select" class="form-control" size="5" multiple="multiple">
                                                                <option value="1">เจษฎา </option>
                                                                <option value="2">Jeffrey Warden</option>
                                                                <option value="2">John Doe</option>
                                                                <option value="2">John Smith</option>
                                                                <option value="3">Mike Litorus</option>
                                                            </select>
                                                        </div>
                                                        <div class="multiselect-controls col-lg-2 col-sm-2">
                                                            <button type="button" id="edit_customleave_select_rightAll" class="btn btn-block btn-white"><i class="fa fa-forward"></i></button>
                                                            <button type="button" id="edit_customleave_select_rightSelected" class="btn btn-block btn-white"><i class="fa fa-chevron-right"></i></button>
                                                            <button type="button" id="edit_customleave_select_leftSelected" class="btn btn-block btn-white"><i class="fa fa-chevron-left"></i></button>
                                                            <button type="button" id="edit_customleave_select_leftAll" class="btn btn-block btn-white"><i class="fa fa-backward"></i></button>
                                                        </div>
                                                        <div class="col-lg-5 col-sm-5">
                                                            <select name="customleave_to" id="edit_customleave_select_to" class="form-control" size="8" multiple="multiple"></select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">บันทึก</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </form>

                        <form action="">
                          
                            <div class="modal custom-modal fade" id="delete_custom_policy" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-header">
                                                <h3>Delete Custom Policy</h3>
                                                <p>Are you sure want to delete?</p>
                                            </div>
                                            <div class="modal-btn delete-action">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </form> -->












                        <hr>

                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->




                        <!-- รายชื่อพนักงาน -->
                        <div class="card leave-box" id="leave_hospitalisation">
                            <div class="card-body">

                                <div class="head-title">
                                    <div class="left">
                                        <h6 class="page-title">การออกนิเทศ</h6>
                                    </div>

                                    


                                </div><br>

                                <div class="page-header">




                                    <div class="row">
                                        <div class="col-sm-12">


                                            <table id="example" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อสถานประกอบการ</th>
                                                        <th>ชื่อผู้ประสานงาน</th>
                                                        <th>อาจารย์นิเทศ</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                    <?php
                                                $sql = "SELECT * FROM add_supervisor ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                            <tr>
                                                <td><?= $row["company_name"] ?></td>
                                                <td><?= $row["name_hr"] ?></td>
                                                <td><?= $row["supervisor_1"] ?></td>
                                                <td><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td>
                                            </tr>
                                        <?php
                                                }

                                        ?>

                                                    
                                                    



                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>










            <!-- ส่วนของข้อมูลทั้งหมด -->
        </div>
        <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->













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

</body>

</html>