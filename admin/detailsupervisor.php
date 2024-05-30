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
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- แชท CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
    <link rel="stylesheet" href="./assets/css/work.css">

    <!-- ส่วนของตารางรายชื่อ-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">



    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- ไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- [if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif] -->
</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid mt-5">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center ">
                    <div class="col">
                        <h3 class="page-title">รายละเอียดอาจารย์นิเทศ</h3>
                        <ul class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">อาจารย์</li>
                            <li class="breadcrumb-item active">อาจารย์นิเทศ</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="file-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img alt="" src="./assets/img/profiles/icon.png"></a>
                                    </div>
                                </div>

                                <?php
                                $id = $_GET['id']; // รับค่า id จาก URL
                                $sql = "SELECT * FROM login_teacher WHERE login_teacher.email = '$id' AND role='supervision_teacher'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);

                                ?>

                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-2"><?= !empty($row["prefix"]) ? $row["prefix"] : '' ?> <?= !empty($row["name"]) ? $row["name"] : 'ยังไม่กรอกข้อมูล' ?></h3>

                                                <h5 class="text-muted"> สาขาวิชาที่ประจำ : <?= !empty($row["major"]) ? $row["major"] : 'ยังไม่กรอกข้อมูล' ?></h>
                                                    <h5 class="text-muted"> email : <?= !empty($row["email"]) ? $row["email"] : 'ยังไม่กรอกข้อมูล' ?></h5>
                                                    <h5 class="text-muted">ประเภทอาจารย์ : อาจารย์นิเทศ</h5>

                                            </div>
                                        </div>
                                        <!-- <div class="col-md-8">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">+66 (0) 4300 9700 ext. 50537</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href=""><?= !empty($row["email"]) ? $row["email"] : 'ยังไม่กรอกข้อมูล' ?></a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Affiliation:</div>
                                                    <div class="text">Department of Computer Science,College of Computing, Khon Kaen University, Thailand</div>
                                                </li>

                                                
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#file" data-toggle="tab" class="nav-link active">รายชื่อนักศึกษาที่นิเทศ</a>
                            </li>
                            <!-- <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank &
                                    Statutory <small class="text-danger">(Admin Only)</small></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">

                <!--  Info Tab -->
                <div id="file" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">

                                    <div class="page-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example" class="table table-striped" style="width:100%">
                                                    <h3>รายชื่อนักศึกษาที่ออกนิเทศ</h3><br>

                                                    <thead>
                                                        <tr>
                                                            <th>ชื่อ</th>
                                                            <th>นามสกุล</th>
                                                            <th>สาขา</th>
                                                            <!-- <th>ปีที่</th> -->
                                                            <th>สถานประกอบการ</th>
                                                        </tr>
                                                    </thead>
                                                    <?php

                                                    $sql = "SELECT DISTINCT std_supervision.* FROM std_supervision 
                                                        INNER JOIN add_supervisor ON std_supervision.company_name = add_supervisor.company_name
                                                        INNER JOIN petition_document ON std_supervision.std_fname = petition_document.petition_fname
                                                        INNER JOIN login_teacher ON (add_supervisor.supervisor_1 = login_teacher.name OR 
                                                                                    add_supervisor.supervisor_2 = login_teacher.name OR 
                                                                                    add_supervisor.supervisor_3 = login_teacher.name OR 
                                                                                    add_supervisor.supervisor_4 = login_teacher.name OR 
                                                                                    add_supervisor.supervisor_5 = login_teacher.name OR 
                                                                                    add_supervisor.supervisor_6 = login_teacher.name)
                                                        WHERE login_teacher.email = '$id'";
                                                    $result = mysqli_query($conn, $sql);

                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?= $row["std_fname"] ?> </td>
                                                                    <td><?= $row["std_lname"] ?> </td>
                                                                    <td><?= $row["std_major"] ?> </td>
                                                                    <td><?= $row["company_name"] ?> </td>
                                                                </tr>
                                                            </tbody>
                                                    <?php
                                                        }
                                                    }
                                                    ?>


                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>










                    <!-- /file Info Tab -->



                    <!-- Projects Tab -->
                    <div class="tab-pane fade" id="emp_projects">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"> Basic Salary Information</h3>
                                <form>



                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /Projects Tab -->




                    <!-- Bank Statutory Tab -->
                    <div class="tab-pane fade" id="bank_statutory">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"> Basic Salary Information</h3>
                                <form>



                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bank Statutory Tab -->

                </div>








            </div>

        </div>

    </div>

    <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/js/tablemember.js"></script>
</body>

</html>

<?php

mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>