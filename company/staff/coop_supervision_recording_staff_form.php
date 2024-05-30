<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</title>
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
                    <li class="breadcrumb-item active" aria-current="page">แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา
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
                        <p class="fw-semibold text-center">KKU CP-T004 CO-OPERATIVE EDUCATION</p>
                        <p class="fw-semibold text-center">แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</p>
                        <hr>
                        <p class="fw-bold text-decoration-underline">คำชี้แจง</p>
                        <p>1. แบบสอบถาม 1 ชุด ประกอบด้วย 2 ส่วน </p>
                        <p>
                            &nbsp;&nbsp;1.1 เอกสารหมายเลข KKU SC-004-01 แบ่งเป็น <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ส่วนที่ 1-1 ประเมินนักศึกษาโดยอาจารย์นิเทศ (1
                            แผ่นต่อนักศึกษา 1 คน): อาจารย์นิเทศประเมิน
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ส่วนที่ 1-2 ประเมินนักศึกษาโดยสถานประกอบการ (1
                            แผ่นต่อนักศึกษา 1 คน): สถานประกอบการประเมิน
                            <br>
                            &nbsp;&nbsp;1.2 เอกสารหมายเลข KKU SC-T004-02 แบ่งเป็น <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ส่วนที่ 2-1 คุณภาพสถานประกอบการ: นักศึกษาประเมิน
                            <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ส่วนที่ 2-2 คุณภาพสถานประกอบการ (1
                            แผ่นต่อสถานประกอบการ 1 แห่ง): อาจารย์นิเทศประเมิน
                        </p>

                        <p class="fw-bold">2. โปรดกรอกระดับความคิดเห็นในแต่ละหัวข้อประเมิน โดยใช้หมายเลข
                            ซึ่งมีความหมาย ดังนี้ </p>
                        <p class="m-3">
                            5 หมายถึง เห็นด้วย หรือ เหมาะสม มากที่สุด <br>
                            4 หมายถึง เห็นด้วย หรือ เหมาะสม มาก <br>
                            3 หมายถึง เห็นด้วย หรือ เหมาะสม ปานกลาง <br>
                            2 หมายถึง เห็นด้วย หรือ เหมาะสม น้อย <br>
                            1 หมายถึง เห็นด้วย หรือ เหมาะสม น้อยที่สุด <br>
                            - หมายถึง ไม่สามารถให้คะแนนได้ เช่น ไม่มีความเห็น <br>
                            และ/หรือ สามารถให้ข้อมูลเพิ่มเติมได้ในส่วน “ความคิดเห็น”
                        </p>
                    </div>
                </div>
            </div>

            <form class="row g-3" action="./coop_supervision_recording_staff_form_insert.php" method="post"
                class="form-horizontal" enctype="multipart/form-data">

                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                    </svg>&nbsp;ส่วนที่ 1-2 ประเมินนักศึกษาโดยสถานประกอบการ (1 แผ่นต่อนักศึกษา 1 คน):
                    สถานประกอบการประเมิน</div>

                <div class="col-md-6">
                    <label class="require" for="inputtext" class="form-label">ชื่อนักศึกษา</label>
                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อนักศึกษา"
                        name="company_std_name" required>
                </div>

                <div class="col-md-6">
                    <label class="require" for="inputtext" class="form-label">รหัสประจำตัวนักศึกษา</label>
                    <input type="text" class="form-control" id="inputtext" placeholder="รหัสประจำตัวนักศึกษา"
                        name="company_std_id" required>
                </div>

                <div class="col-md-6">
                    <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                    <select id="inputState" class="form-select" name="company_field_of_study" required>
                        <option selected>-- เลือก --</option>
                        <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                        <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                        <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                        <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                        <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                    </select>
                </div>

                <div class="row-fluid">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th style="text-align:center; vertical-align:middle;" width="5%" rowspan="2">ที่
                                </th>
                                <th style="text-align:center; vertical-align:middle;" width="70%" rowspan="2">
                                    ประเด็นความคิดเห็น</th>
                                <th style="text-align:center; vertical-align:middle;" width="25%" colspan="5">
                                    ระดับความคิดเห็น</th>
                            </tr>
                            <tr>
                                <th style="text-align:center; vertical-align:middle;">5</th>
                                <th style="text-align:center; vertical-align:middle;">4</th>
                                <th style="text-align:center; vertical-align:middle;">3</th>
                                <th style="text-align:center; vertical-align:middle;">2</th>
                                <th style="text-align:center; vertical-align:middle;">1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;">1.</td>
                                <td colspan="6">ความรับผิดชอบต่อหน้าที่</td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>1.1 มีความรับผิดชอบต่องานที่ได้รับมอบหมาย</td>
                                <td style="text-align:center;"><input type="radio" name="company_job_responsibility"
                                        value="5" id="topic8" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_job_responsibility"
                                        value="4" id="topic8" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_job_responsibility"
                                        value="3" id="topic8" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_job_responsibility"
                                        value="2" id="topic8" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_job_responsibility"
                                        value="1" id="topic8" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>1.2 ปฏิบัติงานด้วยความกระตือรือร้น</td>
                                <td style="text-align:center;"><input type="radio" name="company_enthusiasm" value="5"
                                        id="topic9" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_enthusiasm" value="4"
                                        id="topic9" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_enthusiasm" value="3"
                                        id="topic9" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_enthusiasm" value="2"
                                        id="topic9" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_enthusiasm" value="1"
                                        id="topic9" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>1.3 มีการปรับปรุงคุณภาพงานที่ปฏิบัติอยู่เสมอ</td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_work"
                                        value="5" id="topic10" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_work"
                                        value="4" id="topic10" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_work"
                                        value="3" id="topic10" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_work"
                                        value="2" id="topic10" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_work"
                                        value="1" id="topic10" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>1.4 ใช้เวลาในการทำงานให้เกิดประโยชน์สูงสุด</td>
                                <td style="text-align:center;"><input type="radio" name="company_take_time_to_work"
                                        value="5" id="topic11" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_take_time_to_work"
                                        value="4" id="topic11" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_take_time_to_work"
                                        value="3" id="topic11" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_take_time_to_work"
                                        value="2" id="topic11" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_take_time_to_work"
                                        value="1" id="topic11" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>1.5 มีการรายงานผลการปฏิบัติงาน
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_operation" value="5"
                                        id="topic12" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_operation" value="4"
                                        id="topic12" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_operation" value="3"
                                        id="topic12" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_operation" value="2"
                                        id="topic12" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_operation" value="1"
                                        id="topic12" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;">2.</td>
                                <td colspan="6">ความรู้ ความสามารถในการปฏิบัติงาน</td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>2.1 ปฏิบัติงานโดยใช้ความรู้ ความสามารถที่มีอยู่อย่างเต็มที่</td>
                                <td style="text-align:center;"><input type="radio" name="company_use_knowledge"
                                        value="5" id="topic13" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_use_knowledge"
                                        value="4" id="topic13" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_use_knowledge"
                                        value="3" id="topic13" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_use_knowledge"
                                        value="2" id="topic13" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_use_knowledge"
                                        value="1" id="topic13" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>2.2 มีความสามารถในการประยุกต์ใช้ความรู้
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_apply_knowledge"
                                        value="5" id="topic14" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_apply_knowledge"
                                        value="4" id="topic14" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_apply_knowledge"
                                        value="3" id="topic14" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_apply_knowledge"
                                        value="2" id="topic14" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_apply_knowledge"
                                        value="1" id="topic14" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>2.3 มีความชำนาญในด้านปฏิบัติการ</td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_expertise_in_operations" value="5" id="topic15"
                                        title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_expertise_in_operations" value="4" id="topic15" title="4 มาก"
                                        required>
                                </td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_expertise_in_operations" value="3" id="topic15" title="3 ปานกลาง"
                                        required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_expertise_in_operations" value="2" id="topic15" title="2 น้อย"
                                        required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_expertise_in_operations" value="1" id="topic15"
                                        title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>2.4 มีความสามารถในการวางแผน จัดลำดับความสำคัญของงาน</td>
                                <td style="text-align:center;"><input type="radio" name="company_the_ability_to_plan"
                                        value="5" id="topic16" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_the_ability_to_plan"
                                        value="4" id="topic16" title="4 มาก" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_the_ability_to_plan"
                                        value="3" id="topic16" title="3 ปานกลาง" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_the_ability_to_plan"
                                        value="2" id="topic16" title="2 น้อย" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_the_ability_to_plan"
                                        value="1" id="topic16" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>2.5 ใฝ่รู้ สนใจศึกษาหาความรู้ใหม่ๆ เพิ่มเติม</td>
                                <td style="text-align:center;"><input type="radio" name="company_interested_in_studying"
                                        value="5" id="topic17" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_interested_in_studying"
                                        value="4" id="topic17" title="4 มาก" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_interested_in_studying"
                                        value="3" id="topic17" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_interested_in_studying"
                                        value="2" id="topic17" title="2 น้อย" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_interested_in_studying"
                                        value="1" id="topic17" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;">3.</td>
                                <td colspan="6">คุณลักษณะส่วนบุคคลของนักศึกษา</td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.1 ปฏิบัติงานตามกฎ ระเบียบ หรือข้อบังคับขององค์กรโดยเคร่งครัด</td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_work_according_to_the_rules" value="5" id="topic18"
                                        title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_work_according_to_the_rules" value="4" id="topic18" title="4 มาก"
                                        required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_work_according_to_the_rules" value="3" id="topic18"
                                        title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_work_according_to_the_rules" value="2" id="topic18" title="2 น้อย"
                                        required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_work_according_to_the_rules" value="1" id="topic18"
                                        title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.2 เข้างานตรงเวลา ไม่เคยขาด ไม่เคยสาย</td>
                                <td style="text-align:center;"><input type="radio" name="company_come_to_work_on_time"
                                        value="5" id="topic19" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_come_to_work_on_time"
                                        value="4" id="topic19" title="4 มาก" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_come_to_work_on_time"
                                        value="3" id="topic19" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_come_to_work_on_time"
                                        value="2" id="topic19" title="2 น้อย" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_come_to_work_on_time"
                                        value="1" id="topic19" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.3 ให้ความเคารพ เชื่อฟังผู้บังคับบัญชา</td>
                                <td style="text-align:center;"><input type="radio" name="company_give_respect" value="5"
                                        id="topic20" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_give_respect" value="4"
                                        id="topic20" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_give_respect" value="3"
                                        id="topic20" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_give_respect" value="2"
                                        id="topic20" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_give_respect" value="1"
                                        id="topic20" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.4 มีความขยัน อดทน สู้งาน</td>
                                <td style="text-align:center;"><input type="radio" name="company_be_diligent" value="5"
                                        id="topic21" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_be_diligent" value="4"
                                        id="topic21" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_be_diligent" value="3"
                                        id="topic21" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_be_diligent" value="2"
                                        id="topic21" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_be_diligent" value="1"
                                        id="topic21" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.5 มีคุณธรรม จริยธรรม เช่น ซื่อสัตย์ สุจริต รักษาความลับองค์กร</td>
                                <td style="text-align:center;"><input type="radio" name="company_have_morals" value="5"
                                        id="topic22" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_morals" value="4"
                                        id="topic22" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_morals" value="3"
                                        id="topic22" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_morals" value="2"
                                        id="topic22" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_morals" value="1"
                                        id="topic22" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.6 มีความคิดริเริ่ม สร้างสรรค์</td>
                                <td style="text-align:center;"><input type="radio" name="company_have_initiative"
                                        value="5" id="topic23" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_initiative"
                                        value="4" id="topic23" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_initiative"
                                        value="3" id="topic23" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_initiative"
                                        value="2" id="topic23" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_initiative"
                                        value="1" id="topic23" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.7 มีความมั่นใจในตนเอง กล้าสอบถาม และเสนอความคิดเห็น</td>
                                <td style="text-align:center;"><input type="radio" name="company_have_confidence"
                                        value="5" id="topic24" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_confidence"
                                        value="4" id="topic24" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_confidence"
                                        value="3" id="topic24" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_confidence"
                                        value="2" id="topic24" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_have_confidence"
                                        value="1" id="topic24" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.8 มีบุคลิกภาพ และวางตัวเหมาะสม เช่น การแต่งกาย กิริยาวาจา วุฒิภาวะ</td>
                                <td style="text-align:center;"><input type="radio" name="company_behave_appropriately"
                                        value="5" id="topic25" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_behave_appropriately"
                                        value="4" id="topic25" title="4 มาก" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_behave_appropriately"
                                        value="3" id="topic25" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_behave_appropriately"
                                        value="2" id="topic25" title="2 น้อย" required>
                                </td>
                                <td style="text-align:center;"><input type="radio" name="company_behave_appropriately"
                                        value="1" id="topic25" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.9 มีความสามารถในการทำงานเป็นทีมร่วมกับผู้อื่น</td>
                                <td style="text-align:center;"><input type="radio" name="company_work_as_a_team"
                                        value="5" id="topic26" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_work_as_a_team"
                                        value="4" id="topic26" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_work_as_a_team"
                                        value="3" id="topic26" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_work_as_a_team"
                                        value="2" id="topic26" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_work_as_a_team"
                                        value="1" id="topic26" title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"></td>
                                <td>3.10 ใช้ทรัพยากรขององค์กรอย่างรู้คุณค่า เช่น ไฟฟ้า วัสดุสิ้นเปลืองต่างๆ</td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_use_organizational_resource" value="5" id="topic27"
                                        title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_use_organizational_resource" value="4" id="topic27" title="4 มาก"
                                        required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_use_organizational_resource" value="3" id="topic27"
                                        title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_use_organizational_resource" value="2" id="topic27" title="2 น้อย"
                                        required></td>
                                <td style="text-align:center;"><input type="radio"
                                        name="company_use_organizational_resource" value="1" id="topic27"
                                        title="1 น้อยที่สุด" required></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;">4.</td>
                                <td>คุณภาพโดยรวมของนักศึกษาคนนี้</td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_student"
                                        value="5" id="topic28" title="5 มากที่สุด" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_student"
                                        value="4" id="topic28" title="4 มาก" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_student"
                                        value="3" id="topic28" title="3 ปานกลาง" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_student"
                                        value="2" id="topic28" title="2 น้อย" required></td>
                                <td style="text-align:center;"><input type="radio" name="company_quality_of_student"
                                        value="1" id="topic28" title="1 น้อยที่สุด" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <label>ข้อเสนอแนะเพิ่มเติม</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            name="company_additional_suggestions" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">ข้อเสนอแนะเพิ่มเติม </label>
                    </div>
                    <br>

                    <br>
                    <div class="button">
                        <button type="button" class="btn btn-danger">
                            ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-success">
                            บันทึก
                        </button>
                    </div>
                    </d>
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
    <script src="../script.js"></script>
</body>

</html>