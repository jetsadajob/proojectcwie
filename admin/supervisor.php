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
    <title>จัดการการออกนิเทศ</title>

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
    <!-- <link rel="stylesheet" href="./assets/css/addwork.css"> -->
    <!-- <link rel="stylesheet" href="./assets/css/work.css"> -->

    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php'); ?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

    <!-- ส่วนของข้อมูลทั้งหมด -->
    <div class="page-wrapper">

        <!-- ส่วนของข้อมูล -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center mt-5">
                    <div class="col">
                        <!-- <h3 class="page-title">นักศึษาสหกิจ</h3> -->
                        <ul class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="addmin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">อาจารย์</li>
                            <li class="breadcrumb-item active">อาจารย์นิเทศ</li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page Header -->
            <div class="col-md-12 mt-4">

                <div class="head-title">
                    <div class="row">
                        <div class="col">
                            <h6 class="page-title">จัดการการออกนิเทศ</h6>

                        </div>

                        <div class="col">
                            <div class="col-auto float-right ml-auto">
                                <a href="./add_supervisor.php"><button type="button" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                        </svg>
                                        เพิ่มการนิเทศนักศึกษา</button></a>

                            </div>
                        </div>

                        <div class="container "><br>


                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home">จัดการการออกนิเทศ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">การออกนิเทศเสร็จสิ้น</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Menu 2</a>
                                </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class=" tab-pane active"><br>

                                    <div class="row">
                                        <!-- <div class="col">
                                            <h3>จัดการการออกนิเทศ</h3>
                                        </div> -->

                                        <!-- <div class="col">
                                            <div class="col-auto float-right ml-auto">
                                                <a href="./add_supervisor.php"><button type="button" class="btn btn-outline-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                                        </svg>
                                                        เพิ่มการนิเทศนักศึกษา</button></a>

                                            </div>
                                        </div> -->
                                    </div>


                                    <div class="page-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example" class="table table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ชื่อสถานประกอบการที่ออกนิเทศ</th>
                                                            <!-- <th>ชื่อผู้ประสานงาน</th> -->
                                                            <!-- <th>ชื่ออาจารย์นิเทศ</th> -->
                                                            <th>วันที่ออกนิเทศ</th>
                                                            <th>ดูรายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    <!-- ทำส่วนเช็คว่า status_admin ไม่เท่า ไม่เท่ากับ 2 ไว้เเล้วรอเชื่อมนักศึกษา -->
                                                        <?php
                                                        $sql = "SELECT add_supervisor.company_name, add_supervisor.date_supervision,add_supervisor.supervision_id FROM add_supervisor 
                                                        JOIN std_supervision ON add_supervisor.company_name = std_supervision.company_name
                                                         LEFT JOIN supervision_recording ON std_supervision.std_email = supervision_recording.email 
                                                         WHERE supervision_recording.status_admin !=2;";

                                                        $result = mysqli_query($conn, $sql);

                                                        if ($result) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                        ?>


                                                                <tr>
                                                                    <td><?= $row["company_name"] ?></td>
                                                                    <!-- <td>เสงี่ยมสูงเนิน</td> -->
                                                                    <!-- <td><?= $row["name_hr"] ?></td> -->
                                                                    <!-- <td><?= $row["supervisor_1"] ?> <?= $row["supervisor_2"] ?><?= $row["supervisor_3"] ?><?= $row["supervisor_4"] ?><?= $row["supervisor_5"] ?><?= $row["supervisor_6"] ?></td> -->
                                                                    <td><?= $row["date_supervision"] ?></td>

                                                                    <td>
                                                                        <a href="./add_supervisor_detail.php?id=<?= $row["supervision_id"] ?>">
                                                                            <button type="button" class="btn btn-outline-primary">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                                </svg>
                                                                            </button>
                                                                        </a>
                                                                        <a href="./add_supervisor_edit.php?id=<?= $row["supervision_id"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                                </svg></button></a>
                                                                        <a href="./add_supervisor/add_supervisor_delete.php?id=<?= $row["supervision_id"] ?>"><button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                                </svg></button>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                        <?php
                                                            }
                                                        }
                                                        // mysqli_close($conn); 

                                                        ?>




                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="menu1" class=" tab-pane fade"><br>
                                    <!-- <h3>การออกนิเทศเสร็จสิ้น</h3><br> -->
                                    <div class="page-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example2" class="table table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ชื่อสถานประกอบการที่ออกนิเทศ</th>
                                                            <!-- <th>ชื่อผู้ประสานงาน</th> -->
                                                            <!-- <th>ชื่ออาจารย์นิเทศ</th> -->
                                                            <th>วันที่ออกนิเทศ</th>
                                                            <th>ดูรายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT add_supervisor.company_name, add_supervisor.date_supervision,add_supervisor.supervision_id FROM add_supervisor 
                                                        JOIN std_supervision ON add_supervisor.company_name = std_supervision.company_name
                                                         LEFT JOIN supervision_recording ON std_supervision.std_email = supervision_recording.email 
                                                         WHERE supervision_recording.status_admin !=1;";

                                                        $result = mysqli_query($conn, $sql);

                                                        if ($result) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                        ?>


                                                            <tr>
                                                                <td><?= $row["company_name"] ?></td>
                                                                <!-- <td>เสงี่ยมสูงเนิน</td> -->
                                                                <!-- <td><?= $row["name_hr"] ?></td> -->
                                                                <!-- <td><?= $row["supervisor_1"] ?> <?= $row["supervisor_2"] ?><?= $row["supervisor_3"] ?><?= $row["supervisor_4"] ?><?= $row["supervisor_5"] ?><?= $row["supervisor_6"] ?></td> -->
                                                                <td><?= $row["date_supervision"] ?></td>

                                                                <td>
                                                                    <a href="./add_supervisor_detail.php?id=<?= $row["supervision_id"] ?>">
                                                                        <button type="button" class="btn btn-outline-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                            </svg>
                                                                        </button>
                                                                    </a>
                                                                    <!-- <a href="./add_supervisor_edit.php?id=<?= $row["supervision_id"] ?>"><button type="button" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                            </svg></button></a> -->
                                                                            
                                                                    <a href="./add_supervisor/add_supervisor_delete.php?id=<?= $row["supervision_id"] ?>"><button type="button" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                                            </svg></button>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        }
                                                    }
                                                        // mysqli_close($conn); 

                                                        ?>




                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div id="menu2" class="container tab-pane fade"><br>
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                </div> -->
                            </div>
                        </div>







                    </div><br>



                </div>
            </div>
        </div>
    </div>





    </div>

    </div>



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
    <script src="./assets/js/tablemember1.js"></script>








    <!-- Select2 JS -->
    <script src="assets/js/select2.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Multiselect JS -->
    <script src="assets/js/multiselect.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Include SweetAlert library -->

    <!-- <script>
    setTimeout(function() {
        Swal.fire({
            title: "แน่ใจหรือไม่ที่จะลบข้อ?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ต้องการลบ!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    window.location.href = "../supervisor.php"; // Redirect to supervisor.php after deletion
                });
            }
        });
    }, 1000);
</script> -->


</body>

</html>