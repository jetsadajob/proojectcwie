<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบประเมินผลรายงานสหกิจศึกษา
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
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


    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="..assets/img/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- ฟอนต์ CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <!-- กราฟ CSS -->
    <!-- <link rel="stylesheet" href="../assets/plugins/morris/morris.css"> -->

    <!-- Main CSS ของส่วนข้อมูล-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/cooperative.css">

    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

</head>

<body>

    <!-- <div class="text-center mt-5"> -->
    <!-- <div class="container"> -->
    <div class="main-wrapper">

        <?php
        include('./navbar_form_staff.php');

        ?>

        <!-- ส่วนของข้อมูลทั้งหมด -->
        <div class="page-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แบบประเมินผลรายงานสหกิจศึกษา

                    </li>
                </ol>
            </nav>
            <!-- ส่วนของข้อมูล -->
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="fs-5 fw-bolder text-center">สหกิจศึกษา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น
                            </p>
                            <p class="fw-semibold text-center">KKU CP-T006 CO-OPERATIVE EDUCATION</p>
                            <p class="fw-semibold text-center">แบบประเมินผลรายงานสหกิจศึกษา
                            </p>
                            <hr>
                            <p class="fw-bold text-decoration-underline">คำชี้แจง</p>
                            <div class="m-3">1. ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นพนักงานที่ปรึกษา (Job Supervisor)
                                ของนักศึกษาสหกิจศึกษา หรือ บุคคลที่ได้รับมอบหมายให้ทำหน้าที่แทน <br>
                                2. แบบประเมินผลนี้มีทั้งหมด 18 ข้อ โปรดให้ข้อมูลครบทุกข้อ
                                เพื่อความสมบูรณ์ของการประเมินผล <br>
                                3. โปรดให้คะแนนในช่อง  ในแต่ละหัวข้อการประเมิน หากไม่มีข้อมูลให้ใส่เครื่องหมาย –
                                และโปรดให้ความ คิดเห็นเพิ่มเติม (ถ้ามี) <br>
                                4. เมื่อประเมินผลเรียบร้อยแล้ว โปรดนำเอกสารนี้ใส่ซองประทับตรา “ลับ” และให้นักศึกษานำส่ง
                                สาขาวิชา วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น ทันที่ที่นักศึกษากลับมหาวิทยาลัย


                            </div>

                            <div class="fw-bold">เรียน อาจารย์ผู้รับผิดชอบโครงการสหกิจศึกษา
                            </div>
                            <p>ขอแจ้งผลประเมินรายงานสหกิจศึกษาของนักศึกษา ดังนี้</p>

                            <form class="row g-3" action="./report_evaluation_form_insert.php" method="post"
                                class="form-horizontal" enctype="multipart/form-data">

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>&nbsp;ข้อมูลทั่วไป/Work Term Information</div>

                                <div class="col-md-2">
                                    <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                    <select id="inputState" class="form-select" name="report_prefix" required>
                                        <option selected>-- เลือก --</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>

                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ"
                                        name="report_fname" required>
                                </div>

                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                                        name="report_lname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext"
                                        class="form-label">รหัสประจำตัวนักศึกษา</label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="รหัสประจำตัวนักศึกษา" name="report_std_id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                                    <select id="inputState" class="form-select" name="report_field_of_study" required>
                                        <option selected>-- เลือก --</option>
                                        <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                        <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                        <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                                        <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                                        <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ชื่อสถานประกอบการ/Employer
                                        Name</label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="report_employer" require>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext"
                                        class="form-label">ชื่อ-นามสกุลผู้ประเมิน/Evaluator Name</label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="ชื่อ-นามสกุลผู้ประเมิน" name="report_evaluator_name" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputAddress"
                                        class="form-label">ตำแหน่ง/Position</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="ตำแหน่ง"
                                        name="report_position" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">แผนก/Department </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="แผนก"
                                        name="report_department" require>
                                </div>

                                <dev class="row-fluid">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center; vertical-align:middle;" width="5%"
                                                    rowspan="2">ที่
                                                </th>
                                                <th style="text-align:center; vertical-align:middle;" width="75%"
                                                    rowspan="2">
                                                    หัวข้อประเมิน</th>
                                                <th style="text-align:center; vertical-align:middle;" width="20%"
                                                    rowspan="2">
                                                    คะแนนประเมิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">1</td>
                                                <td>กิตติกรรมประกาศ (Acknowledgement)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_acknowledgement_score"
                                                            aria-label="score1" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">2</td>
                                                <td>บทคัดย่อ (Abstract)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_abstract_score"
                                                            aria-label="score2" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">3</td>
                                                <td>สารบัญ สารบัญรูป และสารบัญตาราง (Table of Contents)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_table_of_contents_score"
                                                            aria-label="score3" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">4</td>
                                                <td>วัตถุประสงค์ (Objectives)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_objectives_score"
                                                            aria-label="score4" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">5</td>
                                                <td>วิธีการศึกษา (Method of Education)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_method_of_education_score"
                                                            aria-label="score5" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">6</td>
                                                <td>ผลการศึกษา (Result)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_result_score"
                                                            aria-label="score6" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">7</td>
                                                <td>วิเคราะห์ผลการศึกษา (Analysis)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_analysis_score"
                                                            aria-label="score7" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">8</td>
                                                <td>สรุปผลการศึกษา (Conclusion)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_conclusion_score"
                                                            aria-label="score8" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">9</td>
                                                <td>ข้อเสนอแนะ (Additional Comment)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_additional_comment_score"
                                                            aria-label="score9" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">10</td>
                                                <td>สำนวนการเขียน และการสื่อความหมาย (Idiom and Meaning)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_idiom_and_meaning_score"
                                                            aria-label="score10" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">11</td>
                                                <td>ความถูกต้องตัวสะกด (Spelling)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_spelling_score"
                                                            aria-label="score11" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">12</td>
                                                <td>เอกสารอ้างอิง (References)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_references_score"
                                                            aria-label="score12" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">13</td>
                                                <td>ภาคผนวก (Appendix)
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_appendix_score"
                                                            aria-label="score13" class="form-control">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">14</td>
                                                <td>การนำเสนองาน และการตอบคำถาม (Presentation and Answer the question)
                                                    ความสามารถในการติดต่อสื่อสาร การพูด การเขียน และการนำเสนอ
                                                    (Presentation)
                                                    สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง รัดกุม
                                                    มีลำดับขั้นตอนที่ดี ไม่ก่อให้เกิดความสับสนต่อการทำงาน รู้จักสอบถาม
                                                    รู้จักชี้แจงผลการปฏิบัติงานและข้อขัดข้องให้ทราบ

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="report_presentation_score"
                                                            aria-label="score14" class="form-control">
                                                        <span class="input-group-text">10 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <label>ข้อเสนอแนะเพิ่มเติม</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="report_comment"
                                            placeholder="Leave a comment here" id="floatingTextarea2"
                                            style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">ข้อเสนอแนะเพิ่มเติม</label>
                                    </div>
                                </dev>

                                <div class="col-md-6">
                                    <label class="require" for="formFile" class="form-label">ลายเซ็นผู้ประเมิน</label>
                                    <input class="form-control" type="file" id="formFile"
                                        name="report_assessor_signature" required>
                                </div>

                                <p class="fw-bold text-danger">* หากสาขาวิชา/คณะ ไม่ได้รับแบบประเมินนี้
                                    ภายในระยะเวลาที่กำหนด นักศึกษาจะไม่ผ่านการประเมินผล</p>
                                <br>
                                <div class="button">
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
            <!-- /ส่วนของข้อมูล -->
        </div>
        <!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- Chart JS ส่วนของกราฟ-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael.min.js"></script>
        <script src="assets/js/chart.js"></script>

        <!-- Custom JS -->
        <script src="assets/js/app.js"></script>




        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
            integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="script.js"></script>
</body>

</html>