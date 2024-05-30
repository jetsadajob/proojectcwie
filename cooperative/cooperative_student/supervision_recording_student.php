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

if ($std = mysqli_fetch_assoc($result)) {
    $email = $std['email'];

    $sql = "SELECT *
    FROM supervision_recording
    JOIN job_description_accommodation ON supervision_recording.email = job_description_accommodation.email
    WHERE supervision_recording.email = '$email'";
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
        <title>แบบบันทึกการนิเทศงานนักศึกษาสหกิจศึกษา</title>
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
                        padding-left: 30px;
                        padding-top: 65px;
                }
        </style>
</head>

<body>
        <div class="main-wrapper">

                <?php
                include('./navbar_menu.php');
                ?>

                <!-- ส่วนของข้อมูลทั้งหมด -->
                <div class="page-wrapper">
                        <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../cooperative_student/cooperative_student_home.php">แบบฟอร์มสหกิจศึกษา</a></li>
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

                                <form class="row g-3" action="./supervision_recording_student_update.php" method="post" class="form-horizontal" enctype="multipart/form-data">


                                        <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                                                </svg>&nbsp;ส่วนที่ 2-1 คุณภาพสถานประกอบการ: นักศึกษาประเมิน
                                        </div>

                                        <div class="col-md-6">
                                                <label class="require" for="inputtext" class="form-label">สถานประกอบการ</label>
                                                <input type="text" class="form-control" id="inputtext" placeholder="สถานประกอบการ" name="std_company" value="<?php echo isset($row['accommodation_employer_thai']) ? $row['accommodation_employer_thai'] : ''; ?> " disabled>
                                        </div>
                                        <br>

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
                                                                        <td colspan="6">ความเข้าใจในวัตถุประสงค์ของสหกิจศึกษา</td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>1.1 ผู้บริหาร</td>
                                                                        <!-- std_executive -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_executive" value="5" id="topic29" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_executive" value="4" id="topic29" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_executive" value="3" id="topic29" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_executive" value="2" id="topic29" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_executive" value="1" id="topic29" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>1.2 เจ้าหน้าที่ฝ่ายบุคคล</td>
                                                                        <!-- std_officer -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_officer" value="5" id="topic30" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_officer" value="4" id="topic30" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_officer" value="3" id="topic30" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_officer" value="2" id="topic30" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_officer" value="1" id="topic30" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>1.3 พนักงานที่ปรึกษา (Job Supervisor)</td>
                                                                        <!-- std_supervisor -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_supervisor" value="5" id="topic31" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_supervisor" value="4" id="topic31" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_supervisor" value="3" id="topic31" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_supervisor" value="2" id="topic31" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_supervisor" value="1" id="topic31" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;">2.</td>
                                                                        <td colspan="6">การให้คำแนะนำดูแลนักศึกษาของฝ่ายบริหารบุคคล</td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>2.1 ปริมาณงานมีความเหมาะสม</td>
                                                                        <!-- std_workload -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_workload" value="5" id="topic32" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_workload" value="4" id="topic32" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_workload" value="3" id="topic32" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_workload" value="2" id="topic32" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_workload" value="1" id="topic32" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>2.2 คุณภาพงานตรงตามลักษณะของสาขาวิชาชีพ</td>
                                                                        <!-- std_quality_of_work -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_quality_of_work" value="5" id="topic33" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_quality_of_work" value="4" id="topic33" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_quality_of_work" value="3" id="topic33" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_quality_of_work" value="2" id="topic33" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_quality_of_work" value="1" id="topic33" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>2.3 ลักษณะงานมีความปลอดภัย ไม่เสี่ยงหรือก่อให้เกิดอันตราย</td>
                                                                        <!-- std_safety -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_safety" value="5" id="topic34" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_safety" value="4" id="topic34" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_safety" value="3" id="topic34" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_safety" value="2" id="topic34" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_safety" value="1" id="topic34" title="1 น้อยที่สุด" required></td>
                                                                </tr>

                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;">3.</td>
                                                                        <td colspan="6">ลักษณะงานที่มอบหมายให้นักศึกษา</td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.1 การประสานงานภายในสถานประกอบการระหว่างฝ่ายบุคคล และ พนักงานที่ปรึกษา</td>
                                                                        <!-- std_coordinate -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_coordinate" value="5" id="topic35" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_coordinate" value="4" id="topic35" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_coordinate" value="3" id="topic35" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_coordinate" value="2" id="topic35" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_coordinate" value="1" id="topic35" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.2 ฝ่ายบุคคล/ผู้เกี่ยวข้อง มีการปฐมนิเทศ
                                                                                แนะนำกฎระเบียบต่างๆขององค์กรให้นักศึกษาทราบ</td>
                                                                        <!-- std_orientation -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_orientation" value="5" id="topic36" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_orientation" value="4" id="topic36" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_orientation" value="3" id="topic36" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_orientation" value="2" id="topic36" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_orientation" value="1" id="topic36" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.3 มีพนักงานที่ปรึกษาดูแลนักศึกษาภายในสัปดาห์แรกที่เข้างาน</td>
                                                                        <!-- std_consulting_students -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_students" value="5" id="topic37" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_students" value="4" id="topic37" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_students" value="3" id="topic37" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_students" value="2" id="topic37" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_students" value="1" id="topic37" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.4 พนักงานที่ปรึกษามีความรู้ และประสบการณ์ ตรงกับสาขาวิชาชีพของนักศึกษา</td>
                                                                        <!-- std_consulting_knowledgeable -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_knowledgeable" value="5" id="topic38" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_knowledgeable" value="4" id="topic38" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_knowledgeable" value="3" id="topic38" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_knowledgeable" value="2" id="topic38" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_knowledgeable" value="1" id="topic38" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.5 พนักงานที่ปรึกษามีเวลาให้แก่นักศึกษาด้านการปฏิบัติงาน</td>
                                                                        <!-- std_consulting_peration -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_peration" value="5" id="topic39" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_peration" value="4" id="topic39" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_peration" value="3" id="topic39" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_peration" value="2" id="topic39" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_peration" value="1" id="topic39" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.6 พนักงานที่ปรึกษามอบหมายงาน สอนงาน และให้คำปรึกษาอย่างเหมาะสม</td>
                                                                        <!-- std_consulting_assignwork -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_assignwork" value="5" id="topic40" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_assignwork" value="4" id="topic40" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_assignwork" value="3" id="topic40" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_assignwork" value="2" id="topic40" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_consulting_assignwork" value="1" id="topic40" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.7 มีการจัดทำแผนการทำงานตลอดระยะเวลาของการปฏิบัติงาน</td>
                                                                        <!-- std_preparation -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_preparation" value="5" id="topic41" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_preparation" value="4" id="topic41" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_preparation" value="3" id="topic41" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_preparation" value="2" id="topic41" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_preparation" value="1" id="topic41" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.8 มีค่าตอบแทนให้นักศึกษาอย่างเหมาะสม</td>
                                                                        <!-- std_compensation -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_compensation" value="5" id="topic42" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_compensation" value="4" id="topic42" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_compensation" value="3" id="topic42" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_compensation" value="2" id="topic42" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_compensation" value="1" id="topic42" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.9 จัดสวัสดิการ (ที่พัก อาหาร รถรับส่ง ฯลฯ) ให้นักศึกษาอย่างเหมาะสม</td>
                                                                        <!-- std_welfare_benefit -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_welfare_benefit" value="5" id="topic43" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_welfare_benefit" value="4" id="topic43" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_welfare_benefit" value="3" id="topic43" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_welfare_benefit" value="2" id="topic43" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_welfare_benefit" value="1" id="topic43" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.10 มีความพร้อมด้านอุปกรณ์ หรือเครื่องมือสำหรับให้นักศึกษาปฏิบัติงาน</td>
                                                                        <!-- std_equipment_readiness -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_equipment_readiness" value="5" id="topic44" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_equipment_readiness" value="4" id="topic44" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_equipment_readiness" value="3" id="topic44" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_equipment_readiness" value="2" id="topic44" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_equipment_readiness" value="1" id="topic44" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;"></td>
                                                                        <td>3.11 ให้ความสำคัญต่อการประเมินผลการปฏิบัติงาน และรายงานของนักศึกษา</td>
                                                                        <!-- std_evaluation -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_evaluation" value="5" id="topic45" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_evaluation" value="4" id="topic45" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_evaluation" value="3" id="topic45" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_evaluation" value="2" id="topic45" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_evaluation" value="1" id="topic45" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                                <tr>
                                                                        <td style="text-align:center; vertical-align:middle;">4.</td>
                                                                        <td>คุณภาพโดยรวมของสถานประกอบการแห่งนี้</td>
                                                                        <!-- std_overall_quality -->
                                                                        <td style="text-align:center;"><input type="radio" name="std_overall_quality" value="5" id="topic46" title="5 มากที่สุด" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_overall_quality" value="4" id="topic46" title="4 มาก" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_overall_quality" value="3" id="topic46" title="3 ปานกลาง" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_overall_quality" value="2" id="topic46" title="2 น้อย" required></td>
                                                                        <td style="text-align:center;"><input type="radio" name="std_overall_quality" value="1" id="topic46" title="1 น้อยที่สุด" required></td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                                <div class="mb-3">
                                                        <label class="require" for="exampleFormControlTextarea1" class="form-label">ข้อเสนอแนะเพิ่มเติม</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="std_suggestions"></textarea>
                                                </div>
                                                <br>


                                                <br>
                                                <div class="button text-right">
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