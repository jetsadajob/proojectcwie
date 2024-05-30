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
    <title>รายละเอียดสถานประกอบการ</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">


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
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">รายละเอียดสถานประกอบการ</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">สถานประกอบการ</li>
                            <li class="breadcrumb-item active">รายละเอียดสถานประกอบการ</li>
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
                                </div><br>

                                <?php
                                $id = $_GET['id']; // รับค่า id จาก URL
                                $sql = "SELECT * FROM hr 
                                JOIN tbl_company ON hr.hr_id = tbl_company.company_id 
                                AND hr.email = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                ?>

                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">
                                                    <?= !empty($row["company"]) ? $row["company"] : 'ยังไม่กรอกข้อมูล' ?></h3>
                                                <h6 class="text-muted">ชื่อผู้ประสานงาน : <?= !empty($row["namehr"]) ? $row["namehr"] : 'ยังไม่กรอกข้อมูล' ?></h3>
                                                </h6>
                                                <h6 class="text-muted">ตำเเหน่ง :<?= !empty($row["role"]) ? $row["role"] : 'ยังไม่กรอกข้อมูล' ?></h3>
                                                </h6>
                                                <!-- <h6 class="text-muted">ผู้ช่วยคณบดีฝ่ายวิชาการ</h6> -->

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">ที่อยู่:</div>
                                                    <div class="text">
                                                        <?= !empty($row["address"]) ? $row["address"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["subdistrict"]) ? $row["subdistrict"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["district"]) ? $row["district"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["province"]) ? $row["province"] : 'ยังไม่กรอกข้อมูล' ?>
                                                        <?= !empty($row["zip"]) ? $row["zip"] : 'ยังไม่กรอกข้อมูล' ?>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href=""><?= !empty($row["email"]) ? $row["email"] : 'ยังไม่กรอกข้อมูล' ?></a></div>
                                                </li>
                                                <li>
                                                    <!-- <div class="title">พนักงานที่ปรึกษา:</div>
                                                    <div class="text">1</div> -->
                                                </li>


                                                <!-- <li>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">คัดลอกบัญชีเข้าสู่ระบบ</button>

                                                </li> -->

                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูลบัญชีเข้าสู่ระบบของสถานประกอบการ</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <?php
                                                                    include './work/dbwork.php';
                                                                    $id = $_GET['id'];
                                                                    $sql = "SELECT * FROM hr,tbl_company WHERE email = '$id' "; //เช็คเงื่อนไขที่ส่งมา
                                                                    $result = mysqli_query($conn, $sql);
                                                                    $row = mysqli_fetch_array($result); //ส่งไปอสดงผลที่บล๊อค
                                                                    ?>

                                                                    <div class="mb-3">
                                                                        <div class="row">


                                                                            <div class="col-12 ">
                                                                                <textarea class="form-control" id="myInput" style="width: 100%; height: 300px;">
                                                                                    Direct Admin สถานประกอบการ
                                                                                    URL :  https://itweb1266.cpkkuhost.com/company/login_company.php
                                                                                    email: <?= $row["email"] ?> 
                                                                                    Password: <?= $row["password"] ?>
                                                                                </textarea>
                                                                            </div>

                                                                        </div>

                                                                        <div class="text-end mt-2">
                                                                            <a href=""><button class="btn btn-primary" data-bs-toggle="modal" onclick="myFunction()" ?id=<?= $row["email"] ?>>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                                                                        <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                                                                                    </svg> คัดลอก </button></a>
                                                                        </div>


                                                                        <script>
                                                                            var exampleModal = document.getElementById('exampleModal')
                                                                            exampleModal.addEventListener('show.bs.modal', function(event) {
                                                                                // Button that triggered the modal
                                                                                var button = event.relatedTarget
                                                                                // Extract info from data-bs-* attributes
                                                                                var recipient = button.getAttribute('data-bs-whatever')

                                                                                var modalTitle = exampleModal.querySelector('.modal-title')
                                                                                var modalBodyInput = exampleModal.querySelector('.modal-body input')

                                                                                modalTitle.textContent = 'บัญชีเข้าสู่ระบบ ' + recipient
                                                                                modalBodyInput.value = recipient
                                                                            })
                                                                        </script>

                                                                        <script>
                                                                            function myFunction() {
                                                                                var copyText = document.getElementById("myInput");
                                                                                copyText.select();
                                                                                copyText.setSelectionRange(0, 99999); // For mobile devices
                                                                                navigator.clipboard.writeText(copyText.value).then(function() {
                                                                                    var alertDiv = document.createElement('div');
                                                                                    alertDiv.className = 'alert alert-success mt-3';
                                                                                    alertDiv.textContent = 'คัดลอกข้อความสำเร็จ';
                                                                                    var closeButton = document.createElement('button');
                                                                                    closeButton.className = 'btn-close';
                                                                                    closeButton.setAttribute('data-bs-dismiss', 'alert');
                                                                                    alertDiv.appendChild(closeButton);
                                                                                    document.querySelector('.modal-body').appendChild(alertDiv);
                                                                                }).catch(function(error) {
                                                                                    console.error('การคัดลอกข้อความล้มเหลว: ', error);
                                                                                });
                                                                            }
                                                                        </script>





                                                                    </div>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </ul>
                                        </div>
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
                            <li class="nav-item"><a href="#file" data-toggle="tab" class="nav-link active">รายชื่อนักศึกษาที่สหกิจ</a> </li>
                            <li class="nav-item"><a href="#in" data-toggle="tab" class="nav-link">รายชื่อนักศึกษาที่ฝึกงาน</a></li>
                            <!-- <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li> -->
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
                                                    <h3>รายชื่อนักศึกษาสหกิจศึกษา</h3><br>
                                                    <thead>
                                                        <tr>
                                                            <th>ชื่อ</th>
                                                            <th>นามสกุล</th>
                                                            <th>สาขา</th>
                                                            <th>ปีที่</th>
                                                            <th>ดูรายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        include './work/dbwork.php'; // เชื่อมต่อฐานข้อมูล

                                                        // รับค่า id จาก URL
                                                        $id = mysqli_real_escape_string($conn, $_GET['id']);

                                                        // สร้างคำสั่ง SQL เพื่อดึงข้อมูลที่ต้องการ
                                                        $sql = "SELECT petition_document.*, tbl_company.*
                                                        FROM petition_document 
                                                        INNER JOIN tbl_company ON petition_document.petition_organiztion_name = tbl_company.company 
                                                        WHERE tbl_company.company_id IN (
                                                            SELECT hr_id 
                                                            FROM hr 
                                                            WHERE email = '$id'
                                                        )";

                                                        $result = mysqli_query($conn, $sql);

                                                        if ($result) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?= $row["petition_fname"] ?></td>
                                                                    <td><?= $row["petition_lname"] ?></td>
                                                                    <td><?= $row["petition_field_of_study"] ?></td>
                                                                    <td><?= $row["petition_year_of_study"] ?></td>
                                                                    <td>
                                                                        <a href="./detilcoop_success1.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                                </svg></button></a>
                                                                        </svg></button></a>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "Error: " . mysqli_error($conn);
                                                        }

                                                        // mysqli_close($conn);
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

                <div class="tab-pane fade" id="in">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h3 class="card-title">สถานประกอบการ</h3> -->
                            <form>

                                <div class="page-header">
                                    <table id="example2" class="table table-striped" style="width:100%">
                                        <h3>รายชื่อนักศึกษาฝึกงาน</h3><br>
                                        <thead>
                                            <tr>
                                                <th>ชื่อ</th>
                                                <th>นามสกุล</th>
                                                <th>สาขา</th>
                                                <th>ปีที่</th>

                                                <th>ดูรายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            include './work/dbwork.php'; // เชื่อมต่อฐานข้อมูล

                                            // รับค่า id จาก URL
                                            $id = mysqli_real_escape_string($conn, $_GET['id']);

                                            // สร้างคำสั่ง SQL เพื่อดึงข้อมูลที่ต้องการ
                                            $sql = "SELECT company_detail.*, tbl_company.*
                                                        FROM company_detail 
                                                        INNER JOIN tbl_company ON company_detail.company_detail_name = tbl_company.company 
                                                        WHERE tbl_company.company_id IN (
                                                            SELECT hr_id 
                                                            FROM hr 
                                                            WHERE email = '$id'
                                                        )";

                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $row["petition_fname"] ?></td>
                                                        <td><?= $row["petition_lname"] ?></td>
                                                        <td><?= $row["petition_field_of_study"] ?></td>
                                                        <td><?= $row["petition_year_of_study"] ?></td>
                                                        <td>
                                                            <a href="./detailinternship.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg></button></a>
                                                            </svg></button></a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "Error: " . mysqli_error($conn);
                                            }

                                            // mysqli_close($conn);
                                            ?>

                                        </tbody>
                                    </table>

                                </div>




                            </form>
                        </div>
                    </div>
                </div>






            </div>

        </div>

        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- /ส่วนของข้อมูล -->
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>


    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/js/tablemember.js"></script>
    <script src="./assets/js/tablemember1.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
</body>

</html>
<?php

mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
?>