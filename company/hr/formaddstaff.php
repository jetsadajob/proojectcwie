<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>ข้อมูลพนักงานที่ปรึกษา</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="./assets/css/profileemployee.css"> -->

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include('./navbar_menu_hr.php');

    ?>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูลพนักงานที่ปรึกษา</li>
                </ol>
            </nav>
            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            //ถ้ามีการส่งพารามิเตอร์ method get และ  method get ชือ act = add จะแสดงฟอร์มเพิ่มข้อมูล
                            if (isset($_GET['act']) && $_GET['act'] == 'add') { ?>
                                <h5>ข้อมูลทั่วไป</h5>

                                <form method="post">
                                    <div class="row mb-3">
                                        <div class="col">
                                            รหัสพนักงาน
                                            <input type="text" name="staff_code" class="form-control" placeholder="ขั้นต่ำ 5 ตัว" required minlength="5" maxlength="20">
                                        </div>
                                        <div class="col">
                                            แผนก
                                            <input type="text" name="staff_department" class="form-control" placeholder="แผนก" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col col-sm-2">
                                            คำนำหน้าชื่อ
                                            <select name="staff_prefix" class="form-select" required>
                                                <option value="">-คำนำหน้าชื่อ-</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>
                                        </div>
                                        <div class="col col-sm-4">
                                            ชื่อ
                                            <input type="text" name="staff_firstname" class="form-control" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="col col-sm-6">
                                            นามสกุล
                                            <input type="text" name="staff_lastname" class="form-control" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            เบอร์โทร
                                            <input type="tel" name="staff_phone" class="form-control" placeholder="เบอร์โทร" required minlength="10" maxlength="10">
                                        </div>
                                        <div class="col">
                                            อีเมล
                                            <input type="email" name="staff_email" class="form-control" placeholder="อีเมล" required>
                                        </div>
                                    </div>
                                    <h5>ข้อมูลนักศึกษาที่รับผิดชอบ</h5>
                                    <div class="row mb-3">
                                        <div class="col col-sm-6">
                                            ชื่อ-สกุลนักศึกษา
                                            <input type="text" name="std_name" class="form-control" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="col col-sm-6">
                                            ประเภทนักศึกษา
                                            <select name="std_type" class="form-select" required>
                                                <option value="">-ประเภทนักศึกษา-</option>
                                                <option value="สหกิจศึกษา">สหกิจศึกษา</option>
                                                <option value="ฝึกงาน">ฝึกงาน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-success">บันทึก</button>
                                        <button type="button" class="btn btn-danger">ยกเลิก</button>
                                    </div>
                                    <hr>
                                </form>

                            <?php } ?>
                            
                            <br>
                            <h5>ข้อมูลพนักงานที่ปรึกษา
                                <a href="formaddstaff.php?act=add" class="btn btn-success btn-sm">+เพิ่มข้อมูล</a>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-striped  table-hover table-responsive table-bordered">
                                    <thead>
                                        <tr class="table-primary">
                                            <th width="10%">รหัสพนักงาน</th>
                                            <th width="15%">ชื่อพนักงาน</th>
                                            <th width="10%">แผนก</th>
                                            <th width="10%">เบอร์โทร</th>
                                            <th width="10%">อีเมล</th>
                                            <th width="13%">นักศึกษาที่รับผิดชอบ</th>
                                            <th width="10%">ประเภทนักศึกษา</th>
                                            <th width="15">รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                                        require_once 'connect.php';
                                        //คิวรี่ข้อมูลมาแสดงในตาราง
                                        $stmt = $conn->prepare("SELECT* FROM tbl_staff ORDER BY staff_code DESC");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        foreach ($result as $row) {
                                        ?>
                                            <tr>
                                                <td><?= $row['staff_code']; ?></td>
                                                <td><?= $row['staff_prefix'] . $row['staff_firstname'] . ' ' . $row['staff_lastname']; ?>
                                                </td>
                                                <td><?= $row['staff_department']; ?></td>
                                                <td><?= $row['staff_phone']; ?></td>
                                                <td><?= $row['staff_email']; ?></td>
                                                <td><?= $row['std_name']; ?></td>
                                                <td><?= $row['std_type']; ?></td>
                                                <td>
                                                    <a href="./staff_detail.php"><button type="button" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg></button></a>
                                                    <a href="./KKUCP-T003.php"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg></button></a>
                                                    <a href="./KKUCP-T003.php"><button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                            </svg></button></a>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Wrapper -->
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>


<?php
// ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
if (isset($_POST['staff_code']) && isset($_POST['staff_department']) && isset($_POST['staff_phone'])) {
    // ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    echo "asdasdsadadadewqewqe";
    // สร้างรหัสผ่านแบบสุ่ม
    $staff_password = generateRandomstaff_password();

    // sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_staff
    (
        staff_code,
        staff_department, 
        staff_prefix, 
        staff_firstname, 
        staff_lastname,
        staff_phone,
        staff_email,
        std_name,
        std_type,
        staff_password
    )
    VALUES
    (
        :staff_code,
        :staff_department, 
        :staff_prefix, 
        :staff_firstname, 
        :staff_lastname,
        :staff_phone,
        :staff_email,
        :std_name,
        :std_type,
        :staff_password
    )");

    // bindParam data type
    $stmt->bindParam(':staff_code', $_POST['staff_code'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_department', $_POST['staff_department'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_prefix', $_POST['staff_prefix'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_firstname', $_POST['staff_firstname'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_lastname', $_POST['staff_lastname'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_phone', $_POST['staff_phone'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_email', $_POST['staff_email'], PDO::PARAM_STR);
    $stmt->bindParam(':std_name', $_POST['std_name'], PDO::PARAM_STR);
    $stmt->bindParam(':std_type', $_POST['std_type'], PDO::PARAM_STR);
    $stmt->bindParam(':staff_password', $staff_password, PDO::PARAM_STR);

    $result = $stmt->execute();

    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($result) {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "เพิ่มข้อมูลสำเร็จ",
                    type: "success",
                    text: "รหัสผ่าน: ' . $staff_password . '"
                }, function() {
                    window.location = "hr_dashboard.php"; // หน้าที่ต้องการให้กระโดดไป
                });
            }, 1000);
        </script>';
    } else {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด",
                    type: "error"
                }, function() {
                    window.location = "hr_dashboard.php"; // หน้าที่ต้องการให้กระโดดไป
                });
            }, 1000);
        </script>';
    }

    $conn = null; // close connect db
} // isset


function generateRandomstaff_password()
{
    $timestamp = time(); // เวลาปัจจุบันในรูปแบบ timestamp
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $staff_password = '';

    // ดึง 3 ตัวแรก
    $first_three_chars = substr($timestamp, 0, 4);

    // ดึง 3 ตัวท้าย
    $random_chars = substr(str_shuffle($characters), 0, 3);
    $last_three_chars = substr($timestamp, -3);

    // รวม 3 ตัวแรกกับ 3 ตัวท้าย
    $staff_password = $first_three_chars . $random_chars  . $last_three_chars;

    return $staff_password;
}

?>