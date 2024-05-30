<?php
include "../work/dbwork.php";
$id = $_GET['id'];
$sql = "SELECT * FROM news WHERE a_id='$id' "; //เช็คเงื่อนไขที่ส่งมา
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); //ส่งไปอสดงผลที่บล๊อค
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข่าวประชาสัมพันธ์</title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/profiles/Computing_KKU.svg.png">
    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- textediter CSS -->
    <!-- <link rel="stylesheet" href="./assets/css/textediter.css">
    <link rel="stylesheet" href="./assets/js/textediter.css"> -->

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/6wxmqlsq4k922xfv2n3ztl11bwqdayixb7n36bwtk4qabmi5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace visualblocks wordcount preview code fullscreen insertdatetime ',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat  | alignleft aligncenter alignright alignjustify | undo redo ',
            language_url: '../assets/js/th_TH.js',
            language: 'th_TH',


            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'




        });
    </script>


</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <!-- เมนู bar -->
    <div class="header">


        <div class="header-left ">
            <a href="../addmin.php" class="logo text-decoration-none">
                <img src="../assets/img/logo.png" width="" height="60" alt="">
                <!-- <span class="university">cpkku-cwie</span> -->
            </a>
        </div>




        <a id="mobile_btn" class="mobile_btn" href="#sidebars"><i class="fa fa-bars" style="color: gray;"></i></a>



        <!-- Header Menu -->
        <ul class="nav user-menu">
            
 <!-- ตั้งค่า โปรไฟล์ ออกจากระบบ -->
 <li class="nav-item dropdown has-arrow main-drop">

<input type="hidden" name="email" value="<?php echo $id; ?>">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
    <span class="user-img"><img src="assets/img/profiles/icon.png" alt="">
        <!-- <span class="status online"></span></span> -->

        <span>Admin</span>
</a>
<div class="dropdown-menu">
    <a class="dropdown-item" href="../registerr/profile.php">โปรไฟล์</a>
    <!-- <a class="dropdown-item" href="settings.html">Settings</a> -->
    <!-- <a class="dropdown-item" href="./registerr/logout-user.php">ออกจากระบบ</a> -->
    <a class="dropdown-item" href="../registerr/logout.php">ออกจากระบบ</a>
</div>
</li>
<!--/ ตั้งค่า โปรไฟล์ ออกจากระบบ -->

</ul>
<!-- /Header Menu -->

<!-- Mobile Menu -->
<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown" aria-expanded="true"><i class="fa fa-ellipsis-v" style="color: gray;"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="../registerr/profile.php">โปรไฟล์</a>
<!-- <a class="dropdown-item" href="settings.html">ตั้งค่า</a> -->
<!-- <a class="dropdown-item" href="./registerr/logout-user.php">ออกจากระบบ</a> -->
<a class="dropdown-item" href="../registerr/logout.php">ออกจากระบบ</a>
</div>
</div>
<!-- /Mobile Menu -->

</div>
<!-- /เเทบเมนู -->


<!-- สไลด์บลาข้างซ้าย  แก้ตรงนี้นะคะ!! เคาะให้เเล้วจะได้ไม่งงอันไหนส่วนไหน -->
<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
    <li class="menu-title">
    </li>
    <li class="text-decoration-none">
        <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="addmin.php">Admin Dashboard</a></li>
            <li><a href="../dashboard_std.php">รายงานสหกิจและฝึกงาน</a></li>
            <li><a href="../dashboard_teacher.php">รายงานอาจารย์</a></li>
            <li><a href="../dashboard_company.php">รายงานสถานประกอบการ</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                <path d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z" />
            </svg> <span> จัดการเว็บไซต์</span> <span class="menu-arrow"></span>
        </a>
        <ul style="display: none;">
            <li><a href="../tablenews.php">จัดการข่าวประชาสัมพันธ์</a></li>
            <li><a href="../calender/calendar.php">จัดการปฏิทิน</a></li>
            <li><a href="../downloadcoop.php">จัดการดาวน์โหลดนักศึกษา</a></li>
            <li><a href="../downloadteacher.php">จัดการดาวน์โหลดอาจารย์</a></li>
            <li><a href="../downloadcompany.php">จัดการดาวน์โหลดสถานประกอบการ</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#" class="noti-dot"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
            </svg> <span> นักศึกษา</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="../liststudentscoop.php">นักศึกษาสหกิจศึกษา</a></li>
            <li><a href="../liststudentinterns.php">นักศึกษาฝึกงาน</a></li>
            <!-- <li><a href="#">สถานประกอบการ</a></li> -->
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z" />
                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z" />
            </svg> <span> อาจารย์ </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <!-- <li><a href="./importinfor.php">เพิ่มข้อมูลอาจารย์ที่ปรึกษา</a></li> -->
            <li><a href="../supervisor.php">จัดการการออกนิเทศ</a></li>
            <li><a href="../advisor.php">อาจารย์ที่ปรึกษา</a></li>
            <li><a href="../supervisorlist.php">อาจารย์นิเทศ</a></li>
            <li><a href="../teachersubject.php">อาจารย์ประจำวิชา</a></li>

        </ul>
    </li>
    <li class="submenu">
        <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
            </svg> <span> สถานประกอบการ </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <!-- <li><a href="#">จัดการสถานประกอบการ</a></li> -->
            <!-- <li><a href="./managecompany.php">จัดการสถานประกอบการ</a></li> -->
            <li><a href="../listcompany.php">รายชื่อสถานประกอบการ</a></li>
            <li><a href="../hr.php">ลงประกาศรับสมัครงาน</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z" />
            </svg> <span> แบบฟอร์มสหกิจ </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="../submitcooperative.php"> นักศึกษายื่นสหกิจศึกษา <?php if ($unapprovedCount1 > 0) : ?> <span class="count"><?php echo $unapprovedCount1; ?></span> <?php endif; ?></a></li>
            <li><a href="../submitdoccoop.php"> ติดตามการดำเนินการสหกิจศึกษา </a></li>

        </ul>
    </li>


    <li class="submenu">
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
            </svg> <span> แบบฟอร์มฝึกงาน </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="../submitinternship.php"> นักศึกษายื่นฝึกงาน <?php if ($unapprovedCount2 > 0) : ?> <span class="count"><?php echo $unapprovedCount2; ?></span> <?php endif; ?></a></li>
            <li><a href="../submitdocinternship.php"> ติดตามการดำเนินการฝึกงาน </a></li>
            <!-- <li><a href="#"> ประวัตินักศึกษา </a></li>
            <li><a href="#"> ใบรับรองการฝึกงาน </a></li>
            <li><a href="#"> แบบประเมินการฝึกงาน </a></li> -->
        </ul>
    </li>

</ul>

<!-- <ul>
<li>
    <a href="./register/logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left " viewBox="0 0 16 16">
         <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
         <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg> <span>ออกจากระบบ</span>
    </a>
    </li>
</ul> -->
</div>
</div>
</div>
    <!-- /สไลด์บลา -->
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">
        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <ul class="breadcrumb mt-5">
                            <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">จัดการเว็บไซต์</li>
                            <li class="breadcrumb-item active">แก้ไขข่าวประชาสัมพันธ์</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Page Header -->
            <div class="head-title">
                <div class="left">
                    <h6 class="page-title">แก้ไขข่าวประชาสัมพันธ์</h6>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="./news_update.php" method="POST" enctype="multipart/form-data" name="addform" class="form-horizontal" id="addform">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="mb-3">
                                        <?php if (!empty($row['img'])) : ?>
                                            <div class="mt-2">
                                                <img src="./uploads/<?= htmlspecialchars($row['img']) ?>" alt="รูปภาพปก" style="max-width: 200px; max-height: 200px;">
                                                <p>รูปภาพปัจจุบัน</p>
                                            </div>
                                        <?php endif; ?>
                                        <label for="img" class="form-label">รูปภาพปก (ถ้ามี)</label>
                                        <input class="form-control" type="file" id="img" name="img">

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-2">หัวข้อข่าว</div>
                                    <div class="col-sm-12">
                                        <input name="title" id="title" type="text" required class="form-control" value="<?= htmlspecialchars($row['title']) ?>">
                                    </div>
                                </div>
                                


                                <div class="form-group">
                                    <div class="row"></div>
                                    <div class="col-sm-2">รายละเอียด</div>
                                    <div class="col-md-12">
                                        <textarea name="txtMessage" id="txtMessage"><?= htmlspecialchars($row['txtMessage']) ?></textarea>
                                    </div>
                                </div><br>




                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="file" class="form-label">ไฟล์เพิ่มเติม (ถ้ามี)</label>
                                        <input class="form-control" type="file" id="file" name="file">
                                        <?php if (!empty($row['file'])) : ?>
                                            <div class="mt-2">
                                                <a href="./uploads/<?= htmlspecialchars($row['file']) ?>" target="_blank">ไฟล์ปันจุบัน :<?= $row['file'] ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class=" text-right">
                                    <!-- Add an input hidden field to store the 'email' -->
                                    <input type="hidden" name="id" value="<?= $row['a_id'] ?>">


                                    <button type="submit" class="btn btn-success" id="btn">อัพเดต</button>
                                    <a href="../tablenews.php"><button type="button" class="btn btn-danger" id="btn">ยกเลิก</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- jQuery -->
<script src="../assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="../assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="../assets/js/jquery.slimscroll.min.js"></script>

<!-- Select2 JS -->
<script src="../assets/js/select2.min.js"></script>

<!-- Datatable JS -->
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>

<!-- Datetimepicker JS -->
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Custom JS -->
<script src="../assets/js/app.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>