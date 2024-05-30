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



    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/addwork.css">
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
                            <li class="breadcrumb-item active">สถานประกอบการ</li>
                            <li class="breadcrumb-item active">จัดการสถานประกอบการ</li>
                            <li class="breadcrumb-item active">เพิ่มสถานประกอบการ</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- รายชื่อพนักงาน -->

            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">


                    <div class="head-title">
                        <div class="left">
                            <h6 class="page-title">เพิ่มสถานประกอบการ</h6>
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

                                <form method="post" action="./managecompany/addcompany_insert.php">

                                    <div class="row mb-3">
                                        <div class="col">
                                            ประเภทผู้ใช้งาน
                                            <select name="txt_role" class="form-select">
                                                <option value="" selected="selected">-- กรุณาเลือก --</option>
                                                <option value="hr">HR</option>
                                                <option value="staff">พนักงานที่ปรึกษา</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            อีเมล
                                            <input type="text" name="txt_email" class="form-control" required placeholder="">
                                        </div>



                                    </div>
                                    <div class="row mb-3">


                                        <div class="col">
                                            ชื่อผู้ประสานงาน
                                            <input type="text" name="txt_namehr" class="form-control" required placeholder="">
                                        </div>



                                    </div>


                                    <div class="row mb-3">
                                        <div class="col">
                                            ชื่อบริษัท
                                            <input type="text" name="txt_company" class="form-control" required placeholder="">

                                        </div>

                                        <div class="col">
                                            ที่อยู่
                                            <input type="text" name="txt_address" class="form-control" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "projectcwie") or die("Error: " . mysqli_error($con));
                                        mysqli_query($con, "SET NAMES 'utf8' ");
                                        error_reporting(error_reporting() & ~E_NOTICE);
                                        date_default_timezone_set('Asia/Bangkok');
                                        ?>




                                        <div class="col">
                                            <label for="sel1">จังหวัด:</label>
                                            <select class="form-control" name="txt_province" id="provinces">
                                                <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM provinces");
                                                while ($value = mysqli_fetch_assoc($query)) {
                                                    echo '<option value="' . $value['id'] . '">' . $value['name_th'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="col">
                                            <div class="input-field">
                                                <label>แขวง/อำเภอ</label>


                                                <select class="form-control" name="txt_subdistrict" id="amphures" required></select>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="input-field">
                                                <label>เขต/ตำบล</label>
                                                <select class="form-control" name="txt_district" id="districts" required></select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div cclass="form-control">
                                                <label>รหัสไปรษณีย์</label>
                                                <input type="text" class="form-control" name="txt_zip" id="zip_code" required>
                                            </div>
                                        </div>

                                    </div>




                                    <!-- 
                            <div class="row mb-3">
                                <div class="col">
                                    ตำบล/แขวง
                                    <input type="text" name="txt_subdistrict" class="form-control" placeholder="แผนก" required>
                                </div>

                                <div class="col">
                                    อำเภอ/เขต
                                    <input type="text" name="txt_district" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col col-sm-6">
                                    จังหวัด
                                    <input type="text" name="txt_province" class="form-control" placeholder="แผนก" required>
                                </div>
                                <div class="col col-sm-6">
                                    รหัสไปรษณีย์
                                    <input type="text" name="txt_zip" class="form-control" placeholder="ขั้นต่ำ 5 ตัว" required>
                                </div>
                            </div> -->

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-success">บันทึก</button>
                                        <button type="button" class="btn btn-danger">ยกเลิก</button>
                                    </div>


                                </form>

                            </div>




                        </div>
                    </div>

                </div>
            </div>



            <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">

                    <!-- รายชื่อพนักงาน -->

                    <div class="head-title">
                        <div class="left">
                            <h6 class="page-title">รายชื่อสถานประกอบการ</h6>
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


                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อสถานประกอบการ</th>
                                            <th>ชื่อผู้ประสานงาน</th>
                                            <th>email</th>
                                            <th>ที่อยู่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT hr.email, hr.namehr, tbl_company.company, tbl_company.address, tbl_company.zip 
                                FROM hr 
                                JOIN tbl_company ON hr.hr_id = tbl_company.company_id
                                WHERE hr.role = 'hr'";

                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $row["company"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                                <td><?= $row["namehr"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                                <td><?= $row["email"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                                <td><?= $row["address"] ?> , <?= $row["zip"] ?></td> <!-- ตรวจสอบให้แน่ใจว่าใช้ตัวพิมพ์เล็กในชื่อคอลัมน์ -->
                                                <td><a href="./listcompany_detail.php?id=<?= $row["email"] ?>"><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td>
                                            </tr>
                                        <?php
                                        }
                                        mysqli_close($conn);  //ปิดการเชื่อมต่อข้อมูล
                                        ?>

                                        <!-- <tr>
                                    <td>CP ALL จำกัด</td>
                                    <td>สุนิสา จันมาศ</td>
                                    <td>sunisa@gmail.com</td>
                                    <td>3</td>
                                    <td><a href="detailadvisor.php"><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></a></td>
                                </tr> -->

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>




                </div>
            </div>









        </div>





        <!-- ส่วนของข้อมูลทั้งหมด -->
    </div>
    <!-- /ส่วนของข้อมูล -->





    <!-- jQuery -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <!-- ตารางรายชื่อ -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./assets/js/tablemember.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

<script type="text/javascript">
    $('#provinces').change(function() {
        var id_province = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax_db.php",
            data: {
                id: id_province,
                function: 'provinces'
            },
            success: function(data) {
                $('#amphures').html(data);
                $('#districts').html(' ');
                $('#districts').val(' ');
                $('#zip_code').val(' ');
            }
        });
    });

    $('#amphures').change(function() {
        var id_amphures = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax_db.php",
            data: {
                id: id_amphures,
                function: 'amphures'
            },
            success: function(data) {
                $('#districts').html(data);
            }
        });
    });

    $('#districts').change(function() {
        var id_districts = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax_db.php",
            data: {
                id: id_districts,
                function: 'districts'
            },
            success: function(data) {
                $('#zip_code').val(data)
            }
        });

    });
</script>