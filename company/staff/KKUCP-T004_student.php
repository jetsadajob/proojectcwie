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
        include('./navbar_form.php');

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

                <form class="row g-3" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">


                    <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                        </svg>&nbsp;ส่วนที่ 2-1 คุณภาพสถานประกอบการ: นักศึกษาประเมิน
                    </div>

                    <div class="col-md-6">
                        <label class="require" for="inputtext" class="form-label">สถานประกอบการ</label>
                        <input type="text" class="form-control" id="inputtext" placeholder="สถานประกอบการ" name=""
                            required>
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
                                    <td style="text-align:center; vertical-align:middle;">1.1</td>
                                    <td>ผู้บริหาร</td>
                                    <td style="text-align:center;"><input type="radio" name="topic29" value="5"
                                            id="topic29" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic29" value="4"
                                            id="topic29" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic29" value="3"
                                            id="topic29" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic29" value="2"
                                            id="topic29" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic29" value="1"
                                            id="topic29" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">1.2</td>
                                    <td>เจ้าหน้าที่ฝ่ายบุคคล</td>
                                    <td style="text-align:center;"><input type="radio" name="topic30" value="5"
                                            id="topic30" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic30" value="4"
                                            id="topic30" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic30" value="3"
                                            id="topic30" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic30" value="2"
                                            id="topic30" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic30" value="1"
                                            id="topic30" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">1.3</td>
                                    <td>พนักงานที่ปรึกษา (Job Supervisor)</td>
                                    <td style="text-align:center;"><input type="radio" name="topic31" value="5"
                                            id="topic31" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic31" value="4"
                                            id="topic31" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic31" value="3"
                                            id="topic31" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic31" value="2"
                                            id="topic31" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic31" value="1"
                                            id="topic31" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">2.</td>
                                    <td colspan="6">การให้คำแนะนำดูแลนักศึกษาของฝ่ายบริหารบุคคล</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">2.1</td>
                                    <td>ปริมาณงานมีความเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="topic32" value="5"
                                            id="topic32" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic32" value="4"
                                            id="topic32" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic32" value="3"
                                            id="topic32" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic32" value="2"
                                            id="topic32" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic32" value="1"
                                            id="topic32" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">2.2</td>
                                    <td>คุณภาพงานตรงตามลักษณะของสาขาวิชาชีพ
                                    </td>
                                    <td style="text-align:center;"><input type="radio" name="topic33" value="5"
                                            id="topic33" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic33" value="4"
                                            id="topic33" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic33" value="3"
                                            id="topic33" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic33" value="2"
                                            id="topic33" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic33" value="1"
                                            id="topic33" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">2.3</td>
                                    <td>ลักษณะงานมีความปลอดภัย ไม่เสี่ยงหรือก่อให้เกิดอันตราย</td>
                                    <td style="text-align:center;"><input type="radio" name="topic34" value="5"
                                            id="topic34" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic34" value="4"
                                            id="topic34" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic34" value="3"
                                            id="topic34" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic34" value="2"
                                            id="topic34" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic34" value="1"
                                            id="topic34" title="1 น้อยที่สุด"></td>
                                </tr>

                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.</td>
                                    <td colspan="6">ลักษณะงานที่มอบหมายให้นักศึกษา</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.1</td>
                                    <td>การประสานงานภายในสถานประกอบการระหว่างฝ่ายบุคคล และ พนักงานที่ปรึกษา</td>
                                    <td style="text-align:center;"><input type="radio" name="topic35" value="5"
                                            id="topic35" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic35" value="4"
                                            id="topic35" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic35" value="3"
                                            id="topic35" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic35" value="2"
                                            id="topic35" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic35" value="1"
                                            id="topic35" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.2</td>
                                    <td>ฝ่ายบุคคล/ผู้เกี่ยวข้อง มีการปฐมนิเทศ
                                        แนะนำกฎระเบียบต่างๆขององค์กรให้นักศึกษาทราบ</td>
                                    <td style="text-align:center;"><input type="radio" name="topic36" value="5"
                                            id="topic36" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic36" value="4"
                                            id="topic36" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic36" value="3"
                                            id="topic36" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic36" value="2"
                                            id="topic36" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic36" value="1"
                                            id="topic36" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.3</td>
                                    <td>มีพนักงานที่ปรึกษาดูแลนักศึกษาภายในสัปดาห์แรกที่เข้างาน</td>
                                    <td style="text-align:center;"><input type="radio" name="topic37" value="5"
                                            id="topic37" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic37" value="4"
                                            id="topic37" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic37" value="3"
                                            id="topic37" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic37" value="2"
                                            id="topic37" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic37" value="1"
                                            id="topic37" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.4</td>
                                    <td>พนักงานที่ปรึกษามีความรู้ และประสบการณ์ ตรงกับสาขาวิชาชีพของนักศึกษา</td>
                                    <td style="text-align:center;"><input type="radio" name="topic38" value="5"
                                            id="topic38" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic38" value="4"
                                            id="topic38" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic38" value="3"
                                            id="topic38" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic38" value="2"
                                            id="topic38" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic38" value="1"
                                            id="topic38" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.5</td>
                                    <td>พนักงานที่ปรึกษามีเวลาให้แก่นักศึกษาด้านการปฏิบัติงาน</td>
                                    <td style="text-align:center;"><input type="radio" name="topic39" value="5"
                                            id="topic39" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic39" value="4"
                                            id="topic39" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic39" value="3"
                                            id="topic39" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic39" value="2"
                                            id="topic39" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic39" value="1"
                                            id="topic39" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.6</td>
                                    <td>พนักงานที่ปรึกษามอบหมายงาน สอนงาน และให้คำปรึกษาอย่างเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="topic40" value="5"
                                            id="topic40" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic40" value="4"
                                            id="topic40" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic40" value="3"
                                            id="topic40" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic40" value="2"
                                            id="topic40" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic40" value="1"
                                            id="topic40" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.7</td>
                                    <td>มีการจัดทำแผนการทำงานตลอดระยะเวลาของการปฏิบัติงาน</td>
                                    <td style="text-align:center;"><input type="radio" name="topic41" value="5"
                                            id="topic41" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic41" value="4"
                                            id="topic41" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic41" value="3"
                                            id="topic41" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic41" value="2"
                                            id="topic41" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic41" value="1"
                                            id="topic41" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.8</td>
                                    <td>มีค่าตอบแทนให้นักศึกษาอย่างเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="topic42" value="5"
                                            id="topic42" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic42" value="4"
                                            id="topic42" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic42" value="3"
                                            id="topic42" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic42" value="2"
                                            id="topic42" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic42" value="1"
                                            id="topic42" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.9</td>
                                    <td>จัดสวัสดิการ (ที่พัก อาหาร รถรับส่ง ฯลฯ) ให้นักศึกษาอย่างเหมาะสม</td>
                                    <td style="text-align:center;"><input type="radio" name="topic43" value="5"
                                            id="topic43" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic43" value="4"
                                            id="topic43" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic43" value="3"
                                            id="topic43" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic43" value="2"
                                            id="topic43" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic43" value="1"
                                            id="topic43" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.10</td>
                                    <td>มีความพร้อมด้านอุปกรณ์ หรือเครื่องมือสำหรับให้นักศึกษาปฏิบัติงาน</td>
                                    <td style="text-align:center;"><input type="radio" name="topic44" value="5"
                                            id="topic44" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic44" value="4"
                                            id="topic44" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic44" value="3"
                                            id="topic44" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic44" value="2"
                                            id="topic44" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic44" value="1"
                                            id="topic44" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">3.11</td>
                                    <td>ให้ความสำคัญต่อการประเมินผลการปฏิบัติงาน และรายงานของนักศึกษา</td>
                                    <td style="text-align:center;"><input type="radio" name="topic45" value="5"
                                            id="topic45" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic45" value="4"
                                            id="topic45" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic45" value="3"
                                            id="topic45" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic45" value="2"
                                            id="topic45" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic45" value="1"
                                            id="topic45" title="1 น้อยที่สุด"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center; vertical-align:middle;">4.</td>
                                    <td>คุณภาพโดยรวมของสถานประกอบการแห่งนี้</td>
                                    <td style="text-align:center;"><input type="radio" name="topic46" value="5"
                                            id="topic46" title="5 มากที่สุด"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic46" value="4"
                                            id="topic46" title="4 มาก"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic46" value="3"
                                            id="topic46" title="3 ปานกลาง"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic46" value="2"
                                            id="topic46" title="2 น้อย"></td>
                                    <td style="text-align:center;"><input type="radio" name="topic46" value="1"
                                            id="topic46" title="1 น้อยที่สุด"></td>
                                </tr>
                            </tbody>
                        </table>
                        <label>ข้อเสนอแนะเพิ่มเติม</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">ข้อเสนอแนะเพิ่มเติม</label>
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
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS ส่วนของกราฟ-->
    <script src="../assets/plugins/morris/morris.min.js"></script>
    <script src="../assets/plugins/raphael/raphael.min.js"></script>
    <script src="../assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>