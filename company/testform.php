<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>จัดการข้อมูลพนักงาน</title>
    <!-- sweet alert  -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- <link rel="stylesheet" href="./assets/css/dashboard.css"> -->

    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->


</head>

<body>
    <?php
        include('./navbar_menu.php');
        ?>

    <!-- <div class="main-wrapper"> -->

        <!-- เมนู bar -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="hr_index.html" class="logo">
                    <img src="./assets/img/icon.png" width="40" height="40" alt="">
                    <span class="university">cpkku-cwie</span>
                </a>
            </div>
            <!-- /Logo -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">

                <!-- ตั้งค่า โปรไฟล์ ออกจากระบบ -->
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="../assets/img/user.jpg" alt="">
                            <span>สถานะ : HR</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">โปรไฟล์</a>
                        <a class="dropdown-item" href="#">ตั้งค่า</a>
                        <a class="dropdown-item" href="./login_student.php">ออกจากระบบ</a>
                    </div>
                </li>



                <!--/ ตั้งค่า โปรไฟล์ ออกจากระบบ -->

            </ul>
            <!-- /Header Menu -->


            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v" style="color: gray;"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">โปรไฟล์</a>
                    <a class="dropdown-item" href="#">ตั้งค่า</a>
                    <a class="dropdown-item" href="./login_student.php">ออกจากระบบ</a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
        <!-- /เเทบเมนู -->


        <!-- Sidebar แก้ตรงนี้นะคะ!! เคาะให้เเล้วจะได้ไม่งงอันไหนส่วนไหน -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                        <li>
                            <a class="text-decoration-none" href="./cooperative_student_home.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                    <path
                                        d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z" />
                                </svg>
                                &nbsp;&nbsp;<div class="content">แบบฟอร์มสหกิจศึกษา</div>
                            </a>
                        </li>
                        <li>
                            <a class="text-decoration-none" href="./cooperative_petition.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path
                                        d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                                </svg>
                                &nbsp;&nbsp;<div class="content">ใบคำร้องขอเข้าร่วมโครงการสหกิจศึกษา</div>
                            </a>
                        </li>
                        <li>
                            <a class="text-decoration-none" href="./cooperative_application.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                </svg>
                                &nbsp;&nbsp;<div class="content">KKUCP-T000_ใบสมัครงานสหกิจศึกษา</div>
                            </a>
                        </li>
                        <li>
                            <a class="text-decoration-none" href="./cooperative_book.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                                &nbsp;&nbsp;<div class="content">KKUCP-T001_ใบยินยอมจากผู้ปกครอง</div>
                            </a>
                        </li>
                        <li>
                            <a class="text-decoration-none" href="./coopperative_education.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.035 21.035 0 0 0 .5-1.05 11.96 11.96 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.888 3.888 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 4.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.64 11.64 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.707 19.707 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                </svg>
                                &nbsp;&nbsp;<div class="content">KKUCP-T007_แบบฟอร์มรายงานการปฏิบัติสหกิจศึกษา</div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h4>จัดการข้อมูลพนักงานที่ปรึกษา
                        <hr>
                    </h4>
                    <?php
          //ถ้ามีการส่งพารามิเตอร์ method get และ  method get ชือ act = add จะแสดงฟอร์มเพิ่มข้อมูล
          if(isset($_GET['act']) && $_GET['act']=='add'){ ?>
                    <!-- <h3>จัดการข้อมูลพนักงาน</h3> -->
                    <form method="post">
                        <div class="row mb-3">
                            <div class="col">
                                เลือกโปรแกรมวิชา
                                <select name="std_program" class="form-select" required>
                                    <option value="">-เลือกโปรแกรมวิชา-</option>
                                    <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                    <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                    <option value="วิศวกรรมซอฟแวร์">วิศวกรรมซอฟแวร์</option>
                                </select>
                            </div>
                            <div class="col">
                                รหัสนักศึกษา
                                <input type="text" name="std_code" class="form-control" placeholder="ขั้นต่ำ 5 ตัว"
                                    required minlength="5" maxlength="20">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col col-sm-2">
                                คำนำหน้าชื่อ
                                <select name="std_firstname" class="form-select" required>
                                    <option value="">-คำนำหน้าชื่อ-</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col col-sm-4">
                                ชื่อ
                                <input type="text" name="std_name" class="form-control" placeholder="ชื่อ" required>
                            </div>
                            <div class="col col-sm-6">
                                นามสกุล
                                <input type="text" name="std_lastname" class="form-control" placeholder="นามสกุล"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                เบอร์โทร
                                <input type="tel" name="std_phone" class="form-control" placeholder="เบอร์โทร" required
                                    minlength="10" maxlength="10">
                            </div>
                            <div class="col">
                                อีเมล
                                <input type="email" name="std_email" class="form-control" placeholder="อีเมล" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button class="btn btn-primary" type="submit">บันทึก</button>
                        </div>
                    </form>
                    <?php } ?>
                    <br>
                    <h5>ข้อมูลพนักงานที่ปรึกษา
                        <a href="formAddSTD.php?act=add" class="btn btn-success btn-sm">+เพิ่มข้อมูล</a>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover table-responsive table-bordered">
                            <thead>
                                <tr class="table-danger">
                                    <th width="20%">รหัสนักศึกษา</th>
                                    <th width="20%">ชื่อ-สกุล</th>
                                    <th width="20%">โปรแกรม</th>
                                    <th width="20%">เบอร์โทร</th>
                                    <th width="20%">อีเมล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
              //เรียกไฟล์เชื่อมต่อฐานข้อมูล
              require_once 'connect.php';
              //คิวรี่ข้อมูลมาแสดงในตาราง
              $stmt = $conn->prepare("SELECT* FROM tbl_std ORDER BY std_code DESC");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
                                <tr>
                                    <td><?= $row['std_code'];?></td>
                                    <td><?= $row['std_firstname'].$row['std_name'].' '.$row['std_lastname'];?></td>
                                    <td><?= $row['std_program'];?></td>
                                    <td><?= $row['std_phone'];?></td>
                                    <td><?= $row['std_email'];?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
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
</body>

</html>

<?php
  //   echo '<pre>';
  //       print_r($_POST);
  // echo '</pre>';
  // exit();
  //ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
  if (isset($_POST['std_code']) && isset($_POST['std_program']) && isset($_POST['std_phone'])) {
  //ไฟล์เชื่อมต่อฐานข้อมูล
  require_once 'connect.php';
  //sql insert
  $stmt = $conn->prepare("INSERT INTO tbl_std
  (
  std_code,
  std_program, 
  std_firstname, 
  std_name, 
  std_lastname,
  std_phone,
  std_email
  )
  VALUES
  (
  :std_code,
  :std_program, 
  :std_firstname, 
  :std_name, 
  :std_lastname,
  :std_phone,
  :std_email
  )
  ");
  //bindParam data type
  $stmt->bindParam(':std_code', $_POST['std_code'], PDO::PARAM_STR);
  $stmt->bindParam(':std_program', $_POST['std_program'], PDO::PARAM_STR);
  $stmt->bindParam(':std_firstname', $_POST['std_firstname'], PDO::PARAM_STR);
  $stmt->bindParam(':std_name', $_POST['std_name'], PDO::PARAM_STR);
  $stmt->bindParam(':std_lastname', $_POST['std_lastname'], PDO::PARAM_STR);
  $stmt->bindParam(':std_phone', $_POST['std_phone'], PDO::PARAM_STR);
  $stmt->bindParam(':std_email', $_POST['std_email'], PDO::PARAM_STR);
  $result = $stmt->execute();
  $conn = null; //close connect db
  //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
  if($result){
  echo '<script>
    setTimeout(function() {
      swal({
      title: "เพิ่มข้อมูลสำเร็จ",
      type: "success"
      }, function() {
      window.location = "formAddSTD.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
  }else{
  echo '<script>
    setTimeout(function() {
      swal({
      title: "เกิดข้อผิดพลาด",
      type: "error"
      }, function() {
      window.location = "formAddSTD.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
  } //else ของ if result
   
  } //isset

  ?>