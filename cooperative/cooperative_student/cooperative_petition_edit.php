<?php
include '../server.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT email FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];

    $sql = "SELECT petition_document.*, login_student.*
            FROM petition_document
            JOIN login_student ON petition_document.email = login_student.email
            WHERE petition_document.email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_array($result);
} else {
    echo "ไม่พบผู้ใช้";
}


$sql2 = "SELECT * FROM login_student WHERE id = '$user_id'";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</title>
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
    <title>ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</title>

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/cooperative.css">

    <style>
        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            margin-left: 25;
            margin-top: 40px;
        }
    </style>



</head>

<body>
    <div class="main-wrapper">

        <?php
        include('./navbar_menu.php');
        ?>
    </div>
 
    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../cooperative_student/cooperative_student_home.php">แบบฟอร์มสหกิจศึกษา</a></li>
                <li class="breadcrumb-item active" aria-current="page">รายละเอียดใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</li>
            </ol>
        </nav>
        <div class="content container-fluid">


            <div class="col-md-12">
                <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดที่ต้องแก้ไข</label>
                <textarea class="form-control text-danger" id="exampleFormControlTextarea1" rows="3" placeholder="" name="comment" required><?php echo $row['comment']; ?></textarea>
            </div><br>

            <div class="text-right">
                <a href="./cooperative_petition_edit.php?id=<?= $row["email"] ?>"><button class="btn btn-warning" style="border-radius: 7px;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>&nbsp;แก้ไข</button></a><br>
            </div>



            <div class="fw-semibold text-center">
                ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา <br>
            </div><br>

            

            <form class="row g-3" action="./cooperative_petition_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>&nbsp;ข้อมูลนักศึกษา</div>

                    <div class="col-md-2">
                        <!-- 2 petition_prefix -->
                        <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                        <select id="inputState" class="form-select" name="petition_prefix" disabled>
                            <option selected required>-- เลือก --</option>
                            <option value="นาย" <?php echo (isset($row['std_prefix']) && $row['std_prefix'] == 'นาย') ? 'selected' : ''; ?>>นาย</option>
                            <option value="นางสาว" <?php echo (isset($row['std_prefix']) && $row['std_prefix'] == 'นางสาว') ? 'selected' : ''; ?>>นางสาว</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <!-- 3	petition_fname -->
                        <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="petition_fname"
                            value="<?php echo isset($row['std_fname']) ? $row['std_fname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-5">
                        <!-- 4	petition_lname -->
                        <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                            name="petition_lname"
                            value="<?php echo isset($row['std_lname']) ? $row['std_lname'] : ''; ?> " disabled>
                    </div>

                    <div class="col-md-6">
                        <!-- 5 petition_year_of_study -->
                        <label class="require" for="inputState" class="form-label">ชั้นปี</label>
                        <select id="inputState" class="form-select" name="petition_year_of_study" disabled >
                            <option value="1" <?php echo (isset($row['year_of_study']) && $row['year_of_study'] == '1') ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?php echo (isset($row['year_of_study']) && $row['year_of_study'] == '2') ? 'selected' : ''; ?>>2</option>
                            <option value="3" <?php echo (isset($row['year_of_study']) && $row['year_of_study'] == '3') ? 'selected' : ''; ?>>3</option>
                            <option value="4" <?php echo (isset($row['year_of_study']) && $row['year_of_study'] == '4') ? 'selected' : ''; ?>>4</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="petition_field_of_study" disabled>
                            <option value="วิทยาการคอมพิวเตอร์" <?php echo (isset($row['major']) && $row['major'] == 'วิทยาการคอมพิวเตอร์') ? 'selected' : ''; ?>>วิทยาการคอมพิวเตอร์</option>
                            <option value="เทคโนโลยีสารสนเทศ" <?php echo (isset($row['major']) && $row['major'] == 'เทคโนโลยีสารสนเทศ') ? 'selected' : ''; ?>>เทคโนโลยีสารสนเทศ</option>
                            <option value="ภูมิสารสนเทศศาสตร์" <?php echo (isset($row['major']) && $row['major'] == 'ภูมิสารสนเทศศาสตร์') ? 'selected' : ''; ?>>ภูมิสารสนเทศศาสตร์</option>
                            <option value="ปัญญาประดิษฐ์" <?php echo (isset($row['major']) && $row['major'] == 'ปัญญาประดิษฐ์') ? 'selected' : ''; ?>>ปัญญาประดิษฐ์</option>
                            <option value="ความมั่นคงปลอดภัยไซเบอร์" <?php echo (isset($row['major']) && $row['major'] == 'ความมั่นคงปลอดภัยไซเบอร์') ? 'selected' : ''; ?>>
                                ความมั่นคงปลอดภัยไซเบอร์</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <!-- 7	petition_project -->
                        <label class="require" for="inputState" class="form-label">โครงการ</label>
                        <select id="inputState" class="form-select" name="petition_project" disabled>
                            <option value="โครงการปกติ" <?php echo (isset($row['std_project']) && $row['std_project'] == 'โครงการปกติ') ? 'selected' : ''; ?>>โครงการปกติ</option>
                            <option value="โครงการพิเศษ" <?php echo (isset($row['std_project']) && $row['std_project'] == 'โครงการพิเศษ') ? 'selected' : ''; ?>>โครงการพิเศษ</option>
                        </select>
                    </div>

                    <br>
                    <div class="col-md-6">
                        <!-- 8	petition_organiztion_name -->
                        <label class="require" for="inputtext" class="form-label">ชื่อหน่วยงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อหน่วยงาน"  required
                        name="petition_organiztion_name" value="<?php echo isset($row1['petition_organiztion_name']) ? $row1['petition_organiztion_name'] : ''; ?>" required>

                    </div>
                    <div class="col-md-6">
                        <!-- 9	petition_name_of_coordinator -->
                        <label for="inputtext" class="form-label">ชื่อผู้ประสานงาน</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อผู้ประสานงาน"
                            name="petition_name_of_coordinator" 
                            value="<?php echo isset($row1['petition_name_of_coordinator']) ? $row1['petition_name_of_coordinator'] : ''; ?>"required >
                    </div>

                    <div class="col-md-6">
                        <!-- 10	petition_position -->
                        <label class="require" for="inputtext" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง"
                            name="petition_position"
                            value="<?php echo isset($row1['petition_position']) ? $row1['petition_position'] : ''; ?>" required required>
                    </div>

                    <br>
                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                    </svg>&nbsp;ที่อยู่หน่วยงาน</div>

                <div class="col-12">
                    <!-- 14	petition_address -->
                    <label class="require" for="inputAddress" class="form-label">บ้านเลขที่</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="petition_address" value="<?php echo isset($row1['petition_address']) ? $row1['petition_address'] : ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <!-- 15	petition_subdistrict -->
                    <label class="require" for="inputtext" class="form-label">แขวง / ตำบล</label>
                    <input type="text" class="form-control" id="inputtext" placeholder="ตำบล" name="petition_subdistrict" value="<?php echo isset($row1['petition_subdistrict']) ? $row1['petition_subdistrict'] : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <!-- 16	petition_district -->
                    <label class="require" for="inputtext" class="form-label">เขต / อำเภอ</label>
                    <input type="text" class="form-control" id="inputtext" placeholder="อำเภอ" name="petition_district" value="<?php echo isset($row1['petition_district']) ? $row1['petition_district'] : ''; ?>" required>
                </div>

                <div class="col-md-6">
                    <!-- 17	petition_province -->
                    <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด" name="petition_province" value="<?php echo isset($row1['petition_province']) ? $row1['petition_province'] : ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <!-- 18	petition_zip -->
                    <label class="require" for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="รหัสไปรษณีย์" name="petition_zip" value="<?php echo isset($row1['petition_zip']) ? $row1['petition_zip'] : ''; ?>" required>
                </div>


                    <div class="col-md-6">
                        <!-- 11	petition_phone -->
                        <label class="require" for="phoneInput" class="form-label">เบอร์โทรติดต่อ</label>
                        <input type="tel" class="form-control" id="phoneInput" placeholder="กรอกหมายเลขโทรศัพท์"
                            name="petition_phone" pattern="[0-9]{10}"
                            value="<?php echo isset($row1['petition_phone']) ? $row1['petition_phone'] : ''; ?>" required>
                    </div>

                    <div class="col-md-6">
                        <!-- 	12	petition_email -->
                        <label class="require" for="inputEmail4" class="form-lable">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="petition_email"
                            placeholder="กรอกอีเมล" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?> " required>
                    </div>

                    <div class="col-md-6">
                        <!-- 13	petition_fax -->
                        <label for="inputtext" class="form-lable">เบอร์โทรสาร</label>
                        <input type="tel" class="form-control" id="phone" placeholder="กรอกเบอร์โทรสาร"
                            name="petition_fax"  value="<?php echo isset($row1['petition_fax']) ? $row1['petition_fax'] : ''; ?>" >
                    </div>

                    <div class="col-md-6">
                        <!-- 19	petition_website -->
                        <label for="inputtext" class="form-label">เว็บไซต์ (ถ้ามี)</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="เว็บไซต์ (ถ้ามี)"
                            name="petition_website" value="<?php echo isset($row1['petition_website']) ? $row1['petition_website'] : ''; ?>" >
                    </div>
                    <div class="col-md-12">
                        <!-- 20	petition_wishes_to_prectice -->
                        <label class="require" for="exampleFormControlTextarea1"
                            class="form-label">ความประสงค์ฝึกสหกิจศึกษา</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" 
                            placeholder="ความประสงค์ฝึกสหกิจศึกษา" name="petition_wishes_to_prectice" 
                            required required><?php echo isset($row1['petition_wishes_to_prectice']) ? $row1['petition_wishes_to_prectice'] : ''; ?></textarea>

                    </div>
                <br>
                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                    </svg>&nbsp;เอกสารแนบ</div>

                    <div class="col-md-6">
                        <!-- 21	petition_graduation_document_file -->
                        <label for="formFile" class="form-label">เอกสารตรวจสอบการสำเร็จการศึกษา</label>
                        <input class="form-control" type="file" id="formFile" name="petition_graduation_document_file" >
                    </div>
                    <div class="col-md-6">
                        <!-- 22	petition_book -->
                        <label for="formFile" class="form-label">หนังสือยินยอมของผู้ปกครอง</label>
                        <input class="form-control" type="file" id="formFile" name="petition_book" >
                    </div>

                    <div class="col-md-6">
                        <!-- 23	petition_applicant_sinature_file -->
                        <label for="formFile" class="form-label">ลายเซ็นผู้ยื่นคำร้อง</label>
                        <input class="form-control" type="file" id="formFile" name="petition_applicant_signature_file" >
                    </div>

                    <div class="button text-right">
                        <button type="button" class="btn btn-danger">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-success">
                            บันทึก
                        </button>
                    </div>


            </form>
            <!-- </div> -->
        </div>
        <!-- /ส่วนของข้อมูล -->
    </div>
    <!-- /Page Wrapper -->
    <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="./assets/plugins/morris/morris.min.js"></script>
    <script src="./assets/plugins/raphael/raphael.min.js"></script>
    <script src="./assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>