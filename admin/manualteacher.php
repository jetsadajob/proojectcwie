
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>คู่มืออาจารย์</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="shortcut icon" href="/Computing_KKU.svg.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- ฟอนต์ CSS -->
    <link rel="stylesheet" href="./assets/css/font.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- จัดเอง CSS -->
    <link rel="stylesheet" href="assets/css/style2.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->
    <?php include('nav_admin.php') ;?>
    <!--ส่วนของเมนูบลาเเละเเทบข้าง  -->

            <!-- หัวข้อ -->
            <div class="page-wrapper">

                <!-- Page Content -->
                <div class="content ">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">คู่มืออาจารย์</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /หัวข้อ -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">



                                    <h6 class="pb-1 border-bottom"> </i>คู่มืออาจารย์</h6>
                                   
                                    <div class="textcontente">
                                      
                                    </div>

                                            
                                    <div class="button">
                                        <div class="btelete">
                                            
                                        </div>
                                    </div>
                                    <?php
										
										// mysql_close($conn);  //ปิดการเชื่อมต่อข้อมูล
									?>

                                </div>


                            </div>




                        </div>
                        <div class="buttonconten">
                            <div class="btadd">
                                <a href="./insert_teacher.php" class="btn add-btn" data-toggle="modal"
                                    data-target="#add_event"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
                            </div>

                            <div class="btedit">
                                <a href="./update_dex.php" class="btn add-btn" data-toggle="modal"
                                    data-target="#edit_event"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                        height="15" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg> แก้ไข</a>
                            </div>


                        </div>
                    </div>

                    <!-- /Page Content -->


                    <!-- Add Event  -->
                    <div id="add_event" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">

                            <div class="modal-content" method="POST" action="./insert_teacher.php">
                                <div class="modal-header">
                                    <h5 class="modal-title">เพิ่มข้อมูล</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="./insert_teacher.php">


                                        <div class="form-group">
                                            <label>เพิ่ม <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="name" id="" cols="30"
                                                rows="10"></textarea>
                                        </div>

                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn">เพิ่มข้อมูล</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Add Event  -->

                    <!-- edit Event  -->
                    <form action="POST" action="./update_dex.php ">
                        <div id="edit_event" class="modal custom-modal fade" role="dialog">

                            <div class="modal-dialog modal-dialog-centered" role="document">


                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">แก้ไขข้อมูล</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>แก้ไข <span class="text-danger">*</span></label>
                                            <form method="POST" action="update_dex.php">
                                                <input type="text" name="name" class="form-control"
                                                    
                                                    value=<?=$row['name']?>>

                                                <div class="submit-section">
                                                    <input class="btn btn-primary submit-btn" type="submit"
                                                        value="Update"></input>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <!-- /edit Event  -->



                </div>
                <!-- /Page Wrapper -->

            </div>
            <!-- /Main Wrapper -->

            <!-- jQuery -->
            <script src="./assets/js/jquery-3.5.1.min.js"></script>

            <!-- Bootstrap Core JS -->
            <script src="./assets/js/popper.min.js"></script>
            <script src="./assets/js/bootstrap.min.js"></script>

            <!-- Slimscroll JS -->
            <script src="./assets/js/jquery.slimscroll.min.js"></script>

            <!-- Select2 JS -->
            <script src="./assets/js/select2.min.js"></script>

            <!-- Datetimepicker JS -->
            <script src="./ssets/js/moment.min.js"></script>
            <script src="./assets/js/bootstrap-datetimepicker.min.js"></script>

            <!-- Calendar JS -->

            <script src="./assets/js/fullcalendar.min.js"></script>
            <script src="./assets/js/jquery.fullcalendar.js"></script>

            <!-- Custom JS -->
            <script src="./assets/js/app.js"></script>

</body>

</html>