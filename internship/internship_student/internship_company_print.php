<?php
session_start();

$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "projectcwie";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($std = mysqli_fetch_assoc($result)) {
    $email = $std['email'];

    $sql = "SELECT * FROM company_detail WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
} else {
    echo "ไม่พบผู้ใช้";
}

$sql2 = "SELECT * FROM login_student WHERE id = '$user_id'";
$result2 = mysqli_query($conn, $sql2);
$std = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดบริษัท/หน่วยงาน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
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
    <title>print_company</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/internship.css">
    <!-- <style>
        .text {
            padding: 10px;
        }
    </style> -->

</head>

<body>
    <div class="content container-fluid">
        <div class="content-page">
            <br><br>
            <div class="fw-semibold text-center">
                    รายละเอียดบริษัท/หน่วยงาน
                </div><br>

                <form class="row g-3 needs-validation" novalidate action="./internship_company_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
                        </svg>&nbsp;บริษัท</div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">1. ชื่อบริษัท/หน่วยงาน</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder=" ชื่อบริษัท/หน่วยงาน" name="company_detail_name" value="<?php echo isset($row['company_detail_name']) ? $row['company_detail_name'] : ''; ?> " disabled>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">2. ที่อยู่บริษัท/หน่วยงาน</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="company_detail_address" value="<?php echo isset($row['company_detail_address']) ? $row['company_detail_address'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">3. แขวง / ตำบล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="company_detail_subdistrict" value="<?php echo isset($row['company_detail_subdistrict']) ? $row['company_detail_subdistrict'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">4. เขต / อำเภอ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="company_detail_district" value="<?php echo isset($row['company_detail_district']) ? $row['company_detail_district'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">5. จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="company_detail_province" value="<?php echo isset($row['company_detail_province']) ? $row['company_detail_province'] : ''; ?> " disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">6. รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสไปรษณีย์" name="company_detail_zip" value="<?php echo isset($row['company_detail_zip']) ? $row['company_detail_zip'] : ''; ?> " disabled>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">7. รายละเอียดอื่น ๆ (ลักษณะงาน,
                            บริษัท/หน่วยงานเกี่ยวข้องกับด้านใด)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="รายละเอียดอื่น ๆ" name="company_detail_other_detail" disabled><?php echo isset($row['company_detail_other_detail']) ? $row['company_detail_other_detail'] : ''; ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">8. โปรดระบุด้วยว่าหนังสือเรียนถึงใคร (เช่น
                            ผู้อำนวยการ......, ผู้จัดการ..., หัวหน้าส่วน เป็นต้น)</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="ชื่อผู้รับหนังสือ" name="company_detail_specity_who" value="<?php echo isset($row['company_detail_specity_who']) ? $row['company_detail_specity_who'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">9. ชื่อผู้ประสานงาน/พี่เลี้ยง (กรณีที่ทราบ
                            หากไม่ทราบไม่เป็นไร)</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="ชื่อผู้ประสานงาน/พี่เลี้ยง" name="company_detail_coordinator_name" value="<?php echo isset($row['company_detail_coordinator_name']) ? $row['company_detail_coordinator_name'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">10. เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="0xxxxxxxxx" name="company_detail_phone" value="<?php echo isset($row['company_detail_phone']) ? $row['company_detail_phone'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">11. กำหนดการส่งเอกสารของทางบริษัท/หน่วยงาน
                            (หากมี)</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="กำหนดการส่งเอกสารของทางบริษัท" name="company_detail_submit_document" value="<?php echo isset($row['company_detail_submit_document']) ? $row['company_detail_submit_document'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">12. สิทธิ์การรักษาพยาบาล (บัตรทอง)</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="สิทธิ์การรักษาพยาบาล" name="company_detail_medical_privilege" value="<?php echo isset($row['company_detail_medical_privilege']) ? $row['company_detail_medical_privilege'] : ''; ?> " disabled>
                    </div>

                    <div>
                        <p>13. การส่งเอกสาร</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="company_detail_submit_document_type" id="flexRadioDefault1" value="รับไปส่งเอง" <?php echo (isset($row['company_detail_submit_document_type']) && $row['company_detail_submit_document_type'] == 'รับไปส่งเอง') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                รับไปส่งเอง
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="company_detail_submit_document_type" id="flexRadioDefault2" value="สาขาวิชาส่งให้ตามที่อยู่บริษัท/หน่วยงาน ตามที่แจ้งในข้อ 2" <?php echo (isset($row['company_detail_submit_document_type']) && $row['company_detail_submit_document_type'] == 'สาขาวิชาส่งให้ตามที่อยู่บริษัท/หน่วยงาน ตามที่แจ้งในข้อ 2') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                สาขาวิชาส่งให้ตามที่อยู่บริษัท/หน่วยงาน ตามที่แจ้งในข้อ 2
                            </label>
                        </div>
                    </div>

                    <br>
                </form>
        </div>
    </div>




    <div class="container">
        <div class="row align-items-center justify-content-center">
            <?php
            for ($i = 0; $i < 18; $i++) {
            ?>
                <div class="col-4">
                    <svg id="barcode_<?= $i ?>"></svg>
                    <script>
                        JsBarcode("#barcode_<?= $i ?>", "<?= $_GET['barcode'] ?>");
                    </script>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function printDocument() {
            window.print(); // Open print dialog
        }

        // Call the printDocument function when the document is ready
        document.addEventListener('DOMContentLoaded', function() {
            printDocument();
        });
    </script>



</body>

</html>