<?php
session_start();
include './work/dbwork.php';

if (!isset($_SESSION['id'])) {
    header('Location: ./registerr/login.php');
    exit();
}


$id = $_GET['id'];

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

    <style>
        .titlee {
            background-color: #1a145b;
            color: white;
            padding: 6px;
        }
    </style>





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
                        <h3 class="page-title">รายละเอียดการนิเทศ</h3>
                        <ul class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">อาจารย์</li>
                            <li class="breadcrumb-item active">อาจารย์นิเทศ</li>
                            <li class="breadcrumb-item active">รายละเอียด</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="page-header">
                <div class="row">

                    <div class="card-body">

                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-view">
                                            <?php

                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM add_supervisor WHERE supervision_id = $id";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);
                                            ?>

                                            <div class="profile-img-wrap">
                                                <div class="profile-img">
                                                    <a href="#"><img alt="" src="./assets/img/profiles/icon.png"></a>
                                                </div>
                                            </div>
                                            <div class="profile-basic">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="profile-info-left">
                                                            <h3 class="user-name m-t-0 mb-0"> <?= !empty($row["company_name"]) ? $row["company_name"] : 'ยังไม่กรอกข้อมูล' ?></h3><br>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <ul class="personal-info">
                                                            <!-- <li>
                                                                <div class="title">Email:</div>
                                                                <div class="text"><?= !empty($row["company_address"]) ? $row["company_address"] : 'ยังไม่กรอกข้อมูล' ?> </div>
                                                            </li> -->

                                                            <li>
                                                                <div class="title">ที่อยู่:</div>
                                                                <div class="text"> <?= !empty($row["company_address"]) ? $row["company_address"] : 'ยังไม่กรอกข้อมูล' ?> <?= !empty($row["company_subdistrict"]) ? $row["company_subdistrict"] : 'ยังไม่กรอกข้อมูล' ?> <?= !empty($row["company_district"]) ? $row["company_district"] : 'ยังไม่กรอกข้อมูล' ?> <?= !empty($row["company_province"]) ? $row["company_province"] : 'ยังไม่กรอกข้อมูล' ?> <?= !empty($row["company_zip"]) ? $row["company_zip"] : 'ยังไม่กรอกข้อมูล' ?></div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Email:</div>
                                                                <div class="text"><a href="">
                                                                        <?= !empty($row["email"]) ? $row["email"] : 'ยังไม่มีข้อมูล' ?>
                                                                    </a></div>
                                                            </li>


                                                            <li>
                                                                <div class="title">ชื่อผู้ประสานงาน (HR):</div>
                                                                <div class="text">
                                                                    <div class="text"> <?= !empty($row["name_hr"]) ? $row["name_hr"] : 'ยังไม่กรอกข้อมูล' ?></div>

                                                                    </a>
                                                                </div>

                                                            </li><br>


                                                            <li>
                                                                <div class="title">วันที่ออกนิเทศ</div>
                                                                <div class="text">
                                                                    <div class="text"> <?= !empty($row["date_supervision"]) ? $row["date_supervision"] : 'ยังไม่กรอกข้อมูล' ?></div>

                                                                    </a>
                                                                </div>


                                                            </li>





                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



            <div class="card leave-box" id="leave_hospitalisation">
                <div class="card-body">

                    <div class="head-title">
                        <div class="left">
                            <h6 class="page-title"> รายชื่ออาจารย์นิเทศ</h6>
                        </div>
                    </div><br>


                    <div class="row">

                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>email</th>
                                    <th>สาขาวิชา</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM add_supervisor WHERE supervision_id = $id ";
                                $result = mysqli_query($conn, $sql);

                                $counter = 1; // ตัวแปรสำหรับเก็บลำดับ

                                while ($row = mysqli_fetch_array($result)) {
                                    // ตรวจสอบและแสดงข้อมูลของอาจารย์ที่ไม่ว่าง
                                    for ($i = 1; $i <= 6; $i++) {
                                        if (!empty($row["supervisor_$i"])) {
                                ?>

                                            <tr>
                                                <td><?= $counter ?></td>
                                                <td><?= $row["supervisor_$i"] ?></td>
                                                <td><?= $row["email_supervisor_$i"] ?></td>
                                                <td><?= $row["major_supervisor_$i"] ?></td>
                                                <!-- ตรงนี้คือส่วนของการเพิ่มปุ่มดูรายละเอียด ถ้าต้องการให้แสดง คุณสามารถเปิดคอมเมนต์และแก้ไขตามต้องการ -->
                                                <!-- <td><a href="add_supervisor_detail_form.php"><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td> -->
                                            </tr>

                                <?php
                                            $counter++; // เพิ่มลำดับ
                                        }
                                    }
                                }
                                ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


            <div class="card leave-box" id="leave_hospitalisation">
                <div class="card-body">

                    <div class="head-title">
                        <div class="left">
                            <h6 class="page-title"> รายชื่อนักศึกษา</h6>
                        </div>
                    </div><br>

                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>สาขา</th>
                                <th>email</th>
                                <!-- <th>สถานะ</th> -->
                                <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT std_supervision.* FROM std_supervision 
                            INNER JOIN add_supervisor ON std_supervision.company_name = add_supervisor.company_name
                            WHERE add_supervisor.supervision_id = $id
                            AND DATE(std_supervision.created_at) = DATE(add_supervisor.created_at)";

                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $counter = 1; // เริ่มลำดับที่ 1
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $counter ?></td> <!-- เพิ่มลำดับ -->
                                        <td><?= $row["std_fname"] ?> <?= $row["std_lname"] ?> </td>
                                        <td><?= $row["std_major"] ?> </td>
                                        <td><?= $row["std_email"] ?> </td>

                                       

                                        <td>
                                            <a href="./supervision_recording_student.php?id=<?= $row["std_email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                    </svg></button></a>
                                            </svg></button></a>

                                        </td>
                                        <!-- <td><a href="edit_student.php?id=<?= $row["std_id"] ?>"><button type="button" class="btn btn-outline-primary">แก้ไข</button></a></td> -->
                                    </tr>
                            <?php
                                    $counter++; // เพิ่มลำดับ
                                }
                            } else {
                                echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
                            }
                            ?>



                        </tbody>

                    </table>



                </div>
            </div>


        </div>
    </div>
    </div>




























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

</html><?php

        mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
        ?>