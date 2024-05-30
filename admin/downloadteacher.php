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
    <title>จัดการไฟล์ดาวน์โหลดดอาจารย์</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
    <link rel="stylesheet" href="./assets/css/listastu.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->



    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">


    <!-- sweet alert  -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">





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

                <div class="row align-items-center mt-5">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item ">จัดการดาวน์โหลด</li>
                            <li class="breadcrumb-item active">ดาวน์โหลดอาจารย์</li>

                        </ul>
                    </div>

                </div>
            </div>


            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">


                    <!-- Page Header -->
                    <div class="head-title  ">
                        <div class="left">
                            <h6 class="page-title">จัดการไฟล์ดาวน์โหลดดอาจารย์</h6>
                        </div>

                        <!-- <div class=" mb-4">
                    <a href="./downloadcoop.php"><button type="button" class="btn btn-outline-primary">นักศึกษาสหกิจศึกษา</button></a>
                    <a href="./downloadinternship.php"><button type="button" class="btn btn-outline-primary">นักศึกษาฝึกงาน</button></a>
                </div> -->

                    </div><br>

                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <!-- <br> -->
                                <!-- <h3>Upload File</h3> -->
                                <!-- Form สำหรับอัพโหลด -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <!-- <h6 class="">*สามารถตั้งชื่หรือไม่ตั้งก็ได้</h6> -->
                                    <div class="mb-3"><br>

                                        <label for="formFile" class="form-label">ชื่อเอกสาร (สามารถเพิ่มชื่อหรือไม่ก็ได้)</label>
                                        <input type="text" name="doc_name" class="form-control" placeholder="ชื่อเอกสาร">
                                    </div>

                                    <!-- <input type="text" name="doc_name" class="form-control" placeholder="ชื่อเอกสาร"> <br> -->


                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">รองรับไฟล์ทุกประเภทของไฟล์</label>
                                        <input class="form-control" type="file" name="doc_file" required accept="*/*">
                                    </div>
                                    <!-- <input type="file" name="doc_file" required class="form-control" accept="*/*"> <br> -->
                                    <button type="submit" class="btn btn-primary text-right" >อัปโหลดไฟล์</button>
                                </form>




                            </div>


                            <div class="col-sm-12 mt-4">

                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4  shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">

                                        <h3>รายการเอกสาร </h3>
                                        <table class="table table-hover cenmter">
                                            <thead>
                                                <tr>
                                                    <!-- <th width="5%">ลำดับ</th> -->
                                                    <th width="75%">ชื่อเอกสาร</th>
                                                    <th width="15%">จัดการไฟล์</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // คิวรี่ข้อมูลมาแสดงในตาราง
                                                require_once 'connect.php';
                                                $stmt = $conn->prepare("SELECT* FROM tbl_pdf_teacher");
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach ($result as $row) {
                                                ?>
                                                    <tr>
                                                        <!-- <td><?= $row['no']; ?></td> -->
                                                        <td><?= htmlspecialchars($row['doc_name']) ? htmlspecialchars($row['doc_name']) : htmlspecialchars($row['doc_file']); ?>
                                                        </td>
                                                        <td>
                                                            <!-- <a href="coop/<?= htmlspecialchars($row['doc_file']); ?>" target="_blank"
                                            class="btn btn-info btn-sm">ดาวโหลด</a> -->


                                                            <a href="./downloadsdocs/delete_teacher.php?id=<?= $row["no"] ?>"><button type="button" class="btn btn-danger btn-sm">ลบ</button></a>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>



                            <?php
                            if (isset($_POST['doc_name']) && $_FILES['doc_file']['name']) {
                                require_once 'connect.php';

                                $upload = $_FILES['doc_file']['name'];
                                $path = "./downloadsdocs/docsteacher/";
                                $doc_name = $_POST['doc_name'];

                                // ตรวจสอบว่าผู้ใช้ได้ใส่ชื่อเอกสารหรือไม่
                                $filename_to_store = $doc_name ? $doc_name : $upload;

                                // อัพโหลดไฟล์
                                $path_copy = $path . $filename_to_store;
                                move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);

                                // คำสั่ง SQL สำหรับเพิ่มข้อมูล
                                $stmt = $conn->prepare("INSERT INTO tbl_pdf_teacher (doc_name, doc_file) VALUES (:doc_name, '$filename_to_store')");
                                $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
                                $result = $stmt->execute();
                                $conn = null; // ปิดการเชื่อมต่อฐานข้อมูล

                                if ($result) {
                                    echo '<script>
                                        setTimeout(function() {
                                            swal({
                                                title: "อัพโหลดไฟล์เอกสารสำเร็จ",
                                                type: "success"
                                            }, function() {
                                                window.location = "downloadteacher.php";
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
                                                window.location = "downloadteacher.php";
                                            });
                                        }, 1000);
                                    </script>';
                                }
                            }

                            ?>




                        </div>
                    </div>
                </div>




            </div>




            <!-- jQuery -->
            <script src="./assets/js/jquery-3.5.1.min.js"></script>

            <!-- Bootstrap Core JS -->
            <script src="./assets/js/popper.min.js"></script>
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

</body>

</html>