<?php
include '../server.php';

$sql = "SELECT * FROM coop_supervision_recording_teacher_form"; //เช็คเงื่อนไขที่ส่งมา
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); //ส่งไปอสดงผลที่บล๊อค
?>
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
        include('./navbar_menu_supervision.php');
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
                                แผ่นต่อนักศึกษา 1 คน):
                                สถานประกอบการประเมิน
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

                <form class="row g-3" action="./coop_supervision_recording_teacher_form_insert.php" method="post"
                    class="form-horizontal" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <label class="require" for="inputtext" class="form-label">ชื่อสถานประกอบการ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อสถานประกอบการ"
                            name="teacher_company_name"
                            value="<?php echo isset($row['teacher_company_name']) ? $row['teacher_company_name'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">สถานที่ตั้ง (อำเภอ/เขต)</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานที่ตั้ง"
                            name="teacher_location"
                            value="<?php echo isset($row['teacher_location']) ? $row['teacher_location'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="จังหวัด"
                            name="teacher_province"
                            value="<?php echo isset($row['teacher_province']) ? $row['teacher_province'] : ''; ?> "
                            disabled>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="require" for="teacher_supervision_date"
                            class="form-lable">วันที่นิเทศงานนักศึกษา</label>
                        <input type="date" class="form-control" id="teacher_supervision_date"
                            name="teacher_supervision_date"
                            value="<?php echo isset($row['teacher_supervision_date']) ? $row['teacher_supervision_date'] : ''; ?>"
                            disabled>
                    </div>

                    <div>รายชื่อนักศึกษาที่ได้รับการนิเทศในสถานประกอบการแห่งนี้ จำนวน
                        <select class="option" id="exampleFormControlSelect1" name="teacher_student_amount" disabled>
                            <option>
                                <?php echo isset($row['teacher_student_amount']) ? $row['teacher_student_amount'] : ''; ?>
                            </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        คน
                    </div>
                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder=""
                            name="teacher_list_of_student"
                            disabled><?php echo isset($row['teacher_list_of_student']) ? $row['teacher_list_of_student'] : ''; ?> </textarea>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <label class="require" for="formFile" class="form-label">ลงชื่ออาจารย์นิเทศ</label>
                        <input class="form-control" type="file" id="formFile" name="teacher_signature"
                            value="<?php echo isset($row['teacher_signature']) ? $row['teacher_signature'] : ''; ?> "
                            disabled>
                    </div>
                    <div class="col-md-12">
                        <label class="require" for="exampleFormControlTextarea1"
                            class="form-label">รายนามคณาจารย์ผู้ร่วมนิเทศงาน</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                            placeholder="รายนามคณาจารย์ผู้ร่วมนิเทศงาน" name="teacher_list"
                            disabled><?php echo isset($row['teacher_list']) ? $row['teacher_list'] : ''; ?> </textarea>
                    </div>

                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                        </svg>&nbsp;ส่วนที่ 1-1 ประเมินนักศึกษาโดยอาจารย์นิเทศ (1 แผ่นต่อนักศึกษา 1 คน):
                        อาจารย์นิเทศประเมิน</div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">ชื่อนักศึกษา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="ชื่อนักศึกษา"
                            name="teacher_std_name"
                            value="<?php echo isset($row['teacher_std_name']) ? $row['teacher_std_name'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">รหัสประจำตัวนักศึกษา</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="รหัสประจำตัวนักศึกษา"
                            name="teacher_std_id"
                            value="<?php echo isset($row['teacher_std_id']) ? $row['teacher_std_id'] : ''; ?> "
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                        <select id="inputState" class="form-select" name="teacher_field_of_study" disabled>
                            <option>
                                <?php echo isset($row['teacher_field_of_study']) ? $row['teacher_field_of_study'] : ''; ?>
                            </option>
                            <option value="cs">วิทยาการคอมพิวเตอร์</option>
                            <option value="it">เทคโนโลยีสารสนเทศ</option>
                            <option value="gis">ภูมิสารสนเทศศาสตร์</option>
                            <option value="ai">ปัญญาประดิษฐ์</option>
                            <option value="cy">ความมั่นคงปลอดภัยไซเบอร์</option>
                        </select>
                    </div>

                    <p class="fw-bold">โปรดกรอกระดับความคิดเห็นในแต่ละหัวข้อประเมิน โดยใช้หมายเลข
                        ซึ่งมีความหมาย ดังนี้ </p>
                    <div class="p-3">
                        5 หมายถึง เห็นด้วย หรือ เหมาะสม มากที่สุด <br>
                        4 หมายถึง เห็นด้วย หรือ เหมาะสม มาก <br>
                        3 หมายถึง เห็นด้วย หรือ เหมาะสม ปานกลาง <br>
                        2 หมายถึง เห็นด้วย หรือ เหมาะสม น้อย <br>
                        1 หมายถึง เห็นด้วย หรือ เหมาะสม น้อยที่สุด <br>
                        - หมายถึง ไม่สามารถให้คะแนนได้ เช่น ไม่มีความเห็น <br>
                        และ/หรือ สามารถให้ข้อมูลเพิ่มเติมได้ในส่วน “ความคิดเห็น”
                    </div>


                    <dev class="row-fluid">
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
                                    <td style="text-align:center; vertical-align:middle;">1</td>
                                    <td>การปรับตัวให้เข้ากับองค์กร</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_adapt_to_the_organization" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_adapt_to_the_organization']) && $row['teacher_adapt_to_the_organization'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_adapt_to_the_organization" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_adapt_to_the_organization']) && $row['teacher_adapt_to_the_organization'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_adapt_to_the_organization" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_adapt_to_the_organization']) && $row['teacher_adapt_to_the_organization'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_adapt_to_the_organization" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_adapt_to_the_organization']) && $row['teacher_adapt_to_the_organization'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_adapt_to_the_organization" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_adapt_to_the_organization']) && $row['teacher_adapt_to_the_organization'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">2</td>
                                    <td>ได้เรียนรู้จากงานที่ได้รับมอบหมาย</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_learn_from_assigned_tasks" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_learn_from_assigned_tasks']) && $row['teacher_learn_from_assigned_tasks'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_learn_from_assigned_tasks" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_learn_from_assigned_tasks']) && $row['teacher_learn_from_assigned_tasks'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_learn_from_assigned_tasks" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_learn_from_assigned_tasks']) && $row['teacher_learn_from_assigned_tasks'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_learn_from_assigned_tasks" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_learn_from_assigned_tasks']) && $row['teacher_learn_from_assigned_tasks'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_learn_from_assigned_tasks" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_learn_from_assigned_tasks']) && $row['teacher_learn_from_assigned_tasks'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3</td>
                                    <td>ลักษณะงานที่ได้รับมอบหมาย</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_nature_of_assigned_work" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_nature_of_assigned_work']) && $row['teacher_nature_of_assigned_work'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_nature_of_assigned_work" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_nature_of_assigned_work']) && $row['teacher_nature_of_assigned_work'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_nature_of_assigned_work" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_nature_of_assigned_work']) && $row['teacher_nature_of_assigned_work'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_nature_of_assigned_work" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_nature_of_assigned_work']) && $row['teacher_nature_of_assigned_work'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_nature_of_assigned_work" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_nature_of_assigned_work']) && $row['teacher_nature_of_assigned_work'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">4</td>
                                    <td>ความรู้ ความสามารถที่ได้เรียนมา ได้สนับสนุนกับงานที่รับมอบหมายหรือไม่?</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_knowledge"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_knowledge']) && $row['teacher_knowledge'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_knowledge"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_knowledge']) && $row['teacher_knowledge'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_knowledge"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_knowledge']) && $row['teacher_knowledge'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_knowledge"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_knowledge']) && $row['teacher_knowledge'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_knowledge"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_knowledge']) && $row['teacher_knowledge'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">5</td>
                                    <td>การมีส่วนร่วมกับองค์กร</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_participation_with_the_organization" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_participation_with_the_organization']) && $row['teacher_participation_with_the_organization'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_participation_with_the_organization" value="4" id="topic8"
                                            title="4 มาก"
                                            <?php echo (isset($row['teacher_participation_with_the_organization']) && $row['teacher_participation_with_the_organization'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_participation_with_the_organization" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_participation_with_the_organization']) && $row['teacher_participation_with_the_organization'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_participation_with_the_organization" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_participation_with_the_organization']) && $row['teacher_participation_with_the_organization'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_participation_with_the_organization" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_participation_with_the_organization']) && $row['teacher_participation_with_the_organization'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">6</td>
                                    <td>ความพึงพอใจของนักศึกษาต่อองค์กร</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_student_satisfaction" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_student_satisfaction']) && $row['teacher_student_satisfaction'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_student_satisfaction" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_student_satisfaction']) && $row['teacher_student_satisfaction'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_student_satisfaction" value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_student_satisfaction']) && $row['teacher_student_satisfaction'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_student_satisfaction" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_student_satisfaction']) && $row['teacher_student_satisfaction'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_student_satisfaction" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_student_satisfaction']) && $row['teacher_student_satisfaction'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">7</td>
                                    <td>ความพึงพอใจของนักศึกษาต่อสวัสดิการที่ได้รับ เช่น สถานที่พัก</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_satisfaction_with_welfare_received" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_satisfaction_with_welfare_received']) && $row['teacher_satisfaction_with_welfare_received'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_satisfaction_with_welfare_received" value="4" id="topic8"
                                            title="4 มาก"
                                            <?php echo (isset($row['teacher_satisfaction_with_welfare_received']) && $row['teacher_satisfaction_with_welfare_received'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_satisfaction_with_welfare_received" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_satisfaction_with_welfare_received']) && $row['teacher_satisfaction_with_welfare_received'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_satisfaction_with_welfare_received" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_satisfaction_with_welfare_received']) && $row['teacher_satisfaction_with_welfare_received'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_satisfaction_with_welfare_received" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_satisfaction_with_welfare_received']) && $row['teacher_satisfaction_with_welfare_received'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <label>ข้อเสนอแนะเพิ่มเติม</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="teacher_additional_suggestions" style="height: 100px"
                                disabled><?php echo isset($row['teacher_additional_suggestions']) ? $row['teacher_additional_suggestions'] : ''; ?></textarea>
                            <label for="floatingTextarea2">ข้อเสนอแนะเพิ่มเติม</label>
                        </div>
                    </dev>



                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                        </svg>&nbsp;ส่วนที่ 2-2 คุณภาพสถานประกอบการ (1 แผ่นต่อสถานประกอบการ 1 แห่ง):
                        อาจารย์นิเทศประเมิน
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">สถานประกอบการ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานประกอบการ"
                            name="teacher_company_name_two"
                            value="<?php echo isset($row['teacher_company_name_two']) ? $row['teacher_company_name_two'] : ''; ?> "
                            disabled>
                    </div>

                    <d class="row-fluid">
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
                                    <td colspan="6">ความเข้าใจในวัตถุประสงค์ของสหกิจศึกษา</td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>1.1 ผู้บริหาร</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_executive"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_executive']) && $row['teacher_executive'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_executive"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_executive']) && $row['teacher_executive'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_executive"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_executive']) && $row['teacher_executive'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_executive"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_executive']) && $row['teacher_executive'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_executive"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_executive']) && $row['teacher_executive'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>1.2 เจ้าหน้าที่ฝ่ายบุคคล</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_human_resources_officer" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_human_resources_officer']) && $row['teacher_human_resources_officer'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_human_resources_officer" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_human_resources_officer']) && $row['teacher_human_resources_officer'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_human_resources_officer" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_human_resources_officer']) && $row['teacher_human_resources_officer'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_human_resources_officer" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_human_resources_officer']) && $row['teacher_human_resources_officer'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_human_resources_officer" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_human_resources_officer']) && $row['teacher_human_resources_officer'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>1.3 พนักงานที่ปรึกษา (Job Supervisor)</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_job_supervisor"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_job_supervisor']) && $row['teacher_job_supervisor'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_job_supervisor"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_job_supervisor']) && $row['teacher_job_supervisor'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_job_supervisor"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_job_supervisor']) && $row['teacher_job_supervisor'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_job_supervisor"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_job_supervisor']) && $row['teacher_job_supervisor'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_job_supervisor"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_job_supervisor']) && $row['teacher_job_supervisor'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>


                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">2.</td>
                                    <td colspan="6">การให้คำแนะนำดูแลนักศึกษาของฝ่ายบริหารบุคคล</td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>2.1 ปริมาณงานมีความเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_workload" value="5"
                                            id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_workload']) && $row['teacher_workload'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_workload" value="4"
                                            id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_workload']) && $row['teacher_workload'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_workload" value="3"
                                            id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_workload']) && $row['teacher_workload'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_workload" value="2"
                                            id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_workload']) && $row['teacher_workload'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_workload" value="1"
                                            id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_workload']) && $row['teacher_workload'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>2.2 คุณภาพงานตรงตามลักษณะของสาขาวิชาชีพ</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_quality_of_work"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_quality_of_work']) && $row['teacher_quality_of_work'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_quality_of_work"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_quality_of_work']) && $row['teacher_quality_of_work'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_quality_of_work"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_quality_of_work']) && $row['teacher_quality_of_work'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_quality_of_work"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_quality_of_work']) && $row['teacher_quality_of_work'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_quality_of_work"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_quality_of_work']) && $row['teacher_quality_of_work'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>2.3 ลักษณะงานมีความปลอดภัย ไม่เสี่ยงหรือก่อให้เกิดอันตราย</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_the_work_is_safe"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_the_work_is_safe']) && $row['teacher_the_work_is_safe'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_the_work_is_safe"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_the_work_is_safe']) && $row['teacher_the_work_is_safe'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_the_work_is_safe"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_the_work_is_safe']) && $row['teacher_the_work_is_safe'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_the_work_is_safe"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_the_work_is_safe']) && $row['teacher_the_work_is_safe'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_the_work_is_safe"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_the_work_is_safe']) && $row['teacher_the_work_is_safe'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>


                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.</td>
                                    <td colspan="6">ลักษณะงานที่มอบหมายให้นักศึกษา</td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.1 การประสานงานภายในสถานประกอบการระหว่างฝ่ายบุคคล และ พนักงานที่ปรึกษา</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_coordination"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_coordination']) && $row['teacher_coordination'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_coordination"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_coordination']) && $row['teacher_coordination'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_coordination"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_coordination']) && $row['teacher_coordination'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_coordination"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_coordination']) && $row['teacher_coordination'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_coordination"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_coordination']) && $row['teacher_coordination'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.2 ฝ่ายบุคคล/ผู้เกี่ยวข้อง มีการปฐมนิเทศ
                                        แนะนำกฎระเบียบต่างๆขององค์กรให้นักศึกษาทราบ</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_an_orientation" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_there_is_an_orientation']) && $row['teacher_there_is_an_orientation'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_an_orientation" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_there_is_an_orientation']) && $row['teacher_there_is_an_orientation'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_an_orientation" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_there_is_an_orientation']) && $row['teacher_there_is_an_orientation'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_an_orientation" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_there_is_an_orientation']) && $row['teacher_there_is_an_orientation'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_an_orientation" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_there_is_an_orientation']) && $row['teacher_there_is_an_orientation'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.3 มีพนักงานที่ปรึกษาดูแลนักศึกษาภายในสัปดาห์แรกที่เข้างาน</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_taking_care_of_students" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_staff_taking_care_of_students']) && $row['teacher_staff_taking_care_of_students'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_taking_care_of_students" value="4" id="topic8"
                                            title="4 มาก"
                                            <?php echo (isset($row['teacher_staff_taking_care_of_students']) && $row['teacher_staff_taking_care_of_students'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_taking_care_of_students" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_staff_taking_care_of_students']) && $row['teacher_staff_taking_care_of_students'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_taking_care_of_students" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_staff_taking_care_of_students']) && $row['teacher_staff_taking_care_of_students'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_taking_care_of_students" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_staff_taking_care_of_students']) && $row['teacher_staff_taking_care_of_students'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.4 พนักงานที่ปรึกษามีความรู้ และประสบการณ์ ตรงกับสาขาวิชาชีพของนักศึกษา</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_is_knowledgeable" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_staff_is_knowledgeable']) && $row['teacher_staff_is_knowledgeable'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_is_knowledgeable" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_staff_is_knowledgeable']) && $row['teacher_staff_is_knowledgeable'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_is_knowledgeable" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_staff_is_knowledgeable']) && $row['teacher_staff_is_knowledgeable'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_is_knowledgeable" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_staff_is_knowledgeable']) && $row['teacher_staff_is_knowledgeable'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_is_knowledgeable" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_staff_is_knowledgeable']) && $row['teacher_staff_is_knowledgeable'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.5 พนักงานที่ปรึกษามีเวลาให้แก่นักศึกษาด้านการปฏิบัติงาน</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_have_time_for_students" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_staff_have_time_for_students']) && $row['teacher_staff_have_time_for_students'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_have_time_for_students" value="4" id="topic8"
                                            title="4 มาก"
                                            <?php echo (isset($row['teacher_staff_have_time_for_students']) && $row['teacher_staff_have_time_for_students'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_have_time_for_students" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_staff_have_time_for_students']) && $row['teacher_staff_have_time_for_students'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_have_time_for_students" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_staff_have_time_for_students']) && $row['teacher_staff_have_time_for_students'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_staff_have_time_for_students" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_staff_have_time_for_students']) && $row['teacher_staff_have_time_for_students'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.6 พนักงานที่ปรึกษามอบหมายงาน สอนงาน และให้คำปรึกษาอย่างเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_staff_assigns_work"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_staff_assigns_work']) && $row['teacher_staff_assigns_work'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_staff_assigns_work"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_staff_assigns_work']) && $row['teacher_staff_assigns_work'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_staff_assigns_work"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_staff_assigns_work']) && $row['teacher_staff_assigns_work'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_staff_assigns_work"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_staff_assigns_work']) && $row['teacher_staff_assigns_work'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_staff_assigns_work"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_staff_assigns_work']) && $row['teacher_staff_assigns_work'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3. มีการจัดทำแผนการทำงานตลอดระยะเวลาของการปฏิบัติงาน</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_work_plan_is_prepared" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_work_plan_is_prepared']) && $row['teacher_work_plan_is_prepared'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_work_plan_is_prepared" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_work_plan_is_prepared']) && $row['teacher_work_plan_is_prepared'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_work_plan_is_prepared" value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_work_plan_is_prepared']) && $row['teacher_work_plan_is_prepared'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_work_plan_is_prepared" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_work_plan_is_prepared']) && $row['teacher_work_plan_is_prepared'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_work_plan_is_prepared" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_work_plan_is_prepared']) && $row['teacher_work_plan_is_prepared'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.8 มีค่าตอบแทนให้นักศึกษาอย่างเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_compensation" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_there_is_compensation']) && $row['teacher_there_is_compensation'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_compensation" value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_there_is_compensation']) && $row['teacher_there_is_compensation'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_compensation" value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_there_is_compensation']) && $row['teacher_there_is_compensation'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_compensation" value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_there_is_compensation']) && $row['teacher_there_is_compensation'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_compensation" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_there_is_compensation']) && $row['teacher_there_is_compensation'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.9 จัดสวัสดิการ (ที่พัก อาหาร รถรับส่ง ฯลฯ) ให้นักศึกษาอย่างเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_provide_welfare"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_provide_welfare']) && $row['teacher_provide_welfare'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_provide_welfare"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_provide_welfare']) && $row['teacher_provide_welfare'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_provide_welfare"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_provide_welfare']) && $row['teacher_provide_welfare'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_provide_welfare"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_provide_welfare']) && $row['teacher_provide_welfare'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_provide_welfare"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_provide_welfare']) && $row['teacher_provide_welfare'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.10 มีความพร้อมด้านอุปกรณ์ หรือเครื่องมือสำหรับให้นักศึกษาปฏิบัติงาน</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_equipment_readiness" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_there_is_equipment_readiness']) && $row['teacher_there_is_equipment_readiness'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_equipment_readiness" value="4" id="topic8"
                                            title="4 มาก"
                                            <?php echo (isset($row['teacher_there_is_equipment_readiness']) && $row['teacher_there_is_equipment_readiness'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_equipment_readiness" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_there_is_equipment_readiness']) && $row['teacher_there_is_equipment_readiness'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_equipment_readiness" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_there_is_equipment_readiness']) && $row['teacher_there_is_equipment_readiness'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_there_is_equipment_readiness" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_there_is_equipment_readiness']) && $row['teacher_there_is_equipment_readiness'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;"></td>
                                    <td>3.11 ให้ความสำคัญต่อการประเมินผลการปฏิบัติงาน และรายงานของนักศึกษา</td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_give_importance_to_evaluation" value="5" id="topic8"
                                            title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_give_importance_to_evaluation']) && $row['teacher_give_importance_to_evaluation'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_give_importance_to_evaluation" value="4" id="topic8"
                                            title="4 มาก"
                                            <?php echo (isset($row['teacher_give_importance_to_evaluation']) && $row['teacher_give_importance_to_evaluation'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_give_importance_to_evaluation" value="3" id="topic8"
                                            title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_give_importance_to_evaluation']) && $row['teacher_give_importance_to_evaluation'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_give_importance_to_evaluation" value="2" id="topic8"
                                            title="2 น้อย"
                                            <?php echo (isset($row['teacher_give_importance_to_evaluation']) && $row['teacher_give_importance_to_evaluation'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio"
                                            name="teacher_give_importance_to_evaluation" value="1" id="topic8"
                                            title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_give_importance_to_evaluation']) && $row['teacher_give_importance_to_evaluation'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">4.</td>
                                    <td>คุณภาพโดยรวมของสถานประกอบการแห่งนี้</td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_overall_quality"
                                            value="5" id="topic8" title="5 มากที่สุด"
                                            <?php echo (isset($row['teacher_overall_quality']) && $row['teacher_overall_quality'] == '5') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_overall_quality"
                                            value="4" id="topic8" title="4 มาก"
                                            <?php echo (isset($row['teacher_overall_quality']) && $row['teacher_overall_quality'] == '4') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_overall_quality"
                                            value="3" id="topic8" title="3 ปานกลาง"
                                            <?php echo (isset($row['teacher_overall_quality']) && $row['teacher_overall_quality'] == '3') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_overall_quality"
                                            value="2" id="topic8" title="2 น้อย"
                                            <?php echo (isset($row['teacher_overall_quality']) && $row['teacher_overall_quality'] == '2') ? 'checked' : ''; ?>disabled>
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="teacher_overall_quality"
                                            value="1" id="topic8" title="1 น้อยที่สุด"
                                            <?php echo (isset($row['teacher_overall_quality']) && $row['teacher_overall_quality'] == '1') ? 'checked' : ''; ?>disabled>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <label>ข้อเสนอแนะเพิ่มเติม</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="teacher_additional_suggestions_two" style="height: 100px" disabled><?php echo isset($row['teacher_additional_suggestions_two']) ? $row['teacher_additional_suggestions_two'] : ''; ?>
                            </textarea>
                            <label for="floatingTextarea2">ข้อเสนอแนะเพิ่มเติม</label>
                        </div>

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




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-ue5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3..0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>