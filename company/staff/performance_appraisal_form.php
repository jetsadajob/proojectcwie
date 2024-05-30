<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา
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
                    <li class="breadcrumb-item active" aria-current="page">
                        แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา

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
                            <p class="fw-semibold text-center">KKU CP-T005 CO-OPERATIVE EDUCATION</p>
                            <p class="fw-semibold text-center">แบบประเมินผลการปฏิบัติงานของนักศึกษาสหกิจศึกษา
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

                            <form class="row g-3" action="./performance_appraisal_form_insert.php" method="post"
                                class="form-horizontal" enctype="multipart/form-data">

                                <div class="title" class="p-2 mb-2  text-white"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>&nbsp;ข้อมูลทั่วไป/Work Term Information</div>

                                <div class="col-md-2">
                                    <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                    <select id="inputState" class="form-select" name="appraisal_prefix" required>
                                        <option selected>-- เลือก --</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>

                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ"
                                        name="appraisal_fname" required>
                                </div>

                                <div class="col-md-5">
                                    <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล"
                                        name="appraisal_lname" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext"
                                        class="form-label">รหัสประจำตัวนักศึกษา</label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="รหัสประจำตัวนักศึกษา" name="appraisal_std_id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                                    <select id="inputState" class="form-select" name="appraisal_field_of_study"
                                        required>
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
                                        placeholder="บริษัท ปตท. จำกัด(มหาชน)" name="appraisal_employer" require>
                                </div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext"
                                        class="form-label">ชื่อ-นามสกุลผู้ประเมิน/Evaluator Name</label>
                                    <input type="text" class="form-control" id="inputtext"
                                        placeholder="ชื่อ-นามสกุลผู้ประเมิน" name="appraisal_evaluator_name" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ตำแหน่ง/Position</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ตำแหน่ง"
                                        name="appraisal_position" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">แผนก/Department </label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="แผนก"
                                        name="appraisal_department" require>
                                </div>

                                <div class="fw-bold">หัวข้อรายงาน/Report title</div>

                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ภาษาไทย/Thai</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อภาษาไทย"
                                        name="appraisal_report_title_thai" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="require" for="inputtext" class="form-label">ภาษาอังกฤษ/English</label>
                                    <input type="text" class="form-control" id="inputtext" placeholder="ชื่อภาษาอังกฤษ"
                                        name="appraisal_report_title_eng" require>
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
                                                    ผลสำเร็จของงาน/Work Achievement</th>
                                                <th style="text-align:center; vertical-align:middle;" width="20%"
                                                    rowspan="2">
                                                    คะแนนประเมิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">1</td>
                                                <td>ปริมาณงาน (Quantity of work) <br>
                                                    ปริมาณงานที่ปฏิบัติสำเร็จตามหน้าที่หรือตามที่ได้รับมอบหมายภายในระยะเวลาที่กำหนด
                                                    (ในระดับที่นักศึกษาจะปฏิบัติได้) และเทียบกับนักศึกษาทั่ว ๆ ไป
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point1" class="form-control"
                                                            name="quantity_of_work_score">
                                                        <span class="input-group-text">20 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">2</td>
                                                <td>คุณภาพงาน (Quality of work) <br> ทำงานได้ถูกต้องครบถ้วนสมบูรณ์
                                                    มีความประณีตเรียบร้อย มีความรอบคอบ
                                                    ไม่เกิดปัญหาติดตามมา งานไม่ค้างคา
                                                    ทำงานเสร็จทันเวลาหรือก่อนเวลาที่กำหนด

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point2" class="form-control"
                                                            name="quality_of_work_score">
                                                        <span class="input-group-text">20 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">3</td>
                                                <td>ความรู้ความสามารถทางวิชาการ (Ability to learn and apply know) <br>
                                                    นักศึกษามีความรู้ทางวิชาการเพียงพอที่จะทำงานตามที่ไดรับมอบหมาย
                                                    (ในระดับที่นักศึกษาจะปฏิบัติ)
                                                    มีความรวดเร็วในการเรียนรู้ เข้าใจข้อมูล ข่าวสาร และวิธีการทำงาน
                                                    ตลอดจนการนำความรู้ ไปประยุกต์ใช้งาน

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point3" class="form-control"
                                                            name="ability_to_learn_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">4</td>
                                                <td>ความรู้ความชำนาญด้านปฏิบัติการ (Practical ability and Suitability
                                                    for Job position) <br>
                                                    เช่น การปฏิบัติงานในภาคสนาม ในห้องปฏิบัติการ
                                                    ทักษะในการเขียนและใช้โปรแกรม
                                                    ทักษะในการใช้เครื่องมือต่างๆ และสามารถพัฒนาตนเองให้ปฏิบัติงานตาม Job
                                                    position
                                                    และ Job description ที่มอบหมาย ได้อย่างเหมาะสม
                                                    หรือตำแหน่งงานนี้เหมาะสม
                                                    กับนักศึกษาคนนี้หรือไม่เพียงใด

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point4" class="form-control"
                                                            name="practical_ability_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">5</td>
                                                <td> วิจารณญาณและการตัดสินใจ (Judgment and decision making and
                                                    Organization and planning) <br>
                                                    ตัดสินใจได้ดี ถูกต้อง รวดเร็ว มีการวิเคราะห์ ข้อมูลและปัญหาต่างๆ
                                                    อย่างรอบคอบก่อนการตัดสินใจ
                                                    สามารถแก้ปัญหาเฉพาะหน้า สามารถไว้วางใจให้ตัดสินใจได้ด้วยตัวเอง

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point5" class="form-control"
                                                            name="judgment_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">6</td>
                                                <td>ทักษะการสื่อสาร (Communication skills and Foreign language and
                                                    cultural development) <br>
                                                    ความสามารถในการติดต่อสื่อสาร การพูด การเขียน และการนำเสนอ
                                                    (Presentation)
                                                    สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง รัดกุม
                                                    มีลำดับขั้นตอนที่ดี ไม่ก่อให้เกิดความสับสนต่อการทำงาน รู้จักสอบถาม
                                                    รู้จักชี้แจงผลการปฏิบัติงานและข้อขัดข้องให้ทราบ
                                                    และมีการพัฒนาด้านภาษาอังกฤษ การทำงานกับชาวต่างชาติ

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point6" class="form-control"
                                                            name="communication_skills_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">7</td>
                                                <td>ความรับผิดชอบและเป็นผู้ที่ไว้วางใจได้ (Responsibility and
                                                    dependability) <br>
                                                    ดำเนินงานให้สำเร็จลุล่วงโดยคำนึงถึงเป้าหมาย
                                                    และความสำเร็จของงานเป็นหลัก ยอมรับผลที่เกิดจาก
                                                    การทำงานอย่างมีเหตผล สามารถปล่อยให้ทำงาน (กรณีงานประจำ)
                                                    ได้โดยไม่ต้องควบคุมมากจนเกินไป
                                                    ความจำเป็นในการตรวจสอบขั้นตอนและผลงานตลอดเวลา
                                                    สามารถไว้วางใจให้รับผิดชอบงานที่มากกว่า เวลาประจำ
                                                    สามารถไว้วางใจได้แทบทุกสถานการณ์หรือในสถานการณ์ปกติเท่านั้น

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point7" class="form-control"
                                                            name="responsibility_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">8</td>
                                                <td>ความสนใจ อุตสาหะในการทำงาน (Interest in work) <br>
                                                    ความสนใจและความกระตือรือร้นในการทำงาน มีความอุตสาหะ ความพยายาม
                                                    ความตั้งใจที่จะทำงานได้สำเร็จ ความมานะบากบั่น
                                                    ไม่ย่อท้อต่ออุปสรรคและปัญหา

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point8" class="form-control"
                                                            name="interest_in_work_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">9</td>
                                                <td>ความสามารถเริ่มต้นทำงานได้ด้วยตนเอง (Initiative or self starter)
                                                    <br>
                                                    เมื่อไดรับคำชี้แนะ สามารถเริ่มทำงานได้เอง โดยไม่ต้องรอคำสั่ง
                                                    (กรณีงานประจำ) เสนอตัวเข้าช่วยงาน
                                                    แทบทุกอย่าง มาขอรับงานใหม่ ๆ ไปทำ
                                                    ไม่ปล่อยเวลาว่างให้ล่วงเลยไปโดยเปล่าประโยชน์

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point9" class="form-control"
                                                            name="initiative_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">10</td>
                                                <td>การตอบสนองต่อการสั่งการ (Response to supervision) <br>
                                                    ยินดีรับคำสั่ง คำแนะนำ คำวิจารณ์ ไม่แสดงความอดอัดใจ
                                                    เมื่อได้รับคำติเตือนและวิจารณ์
                                                    ความรวดเร็วใจการปฏิบัตตามคำสั่ง การปรับตัวปฏิบัตตามคำแนะนำ
                                                    ข้อเสนอแนะและวิจารณ์

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point10" class="form-control"
                                                            name="response_to_supervision_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">11</td>
                                                <td>บุคลิกภาพและการวางตัว (Personality) <br>
                                                    มีบุคลิกภาพและวางตัวได้เหมาะสม เช่น ทัศนคติ วุฒิภาวะ
                                                    ความอ่อนน้อมถ่อมตน
                                                    การแต่งกาย กิริยาวาจา การตรงต่อเวลา และอื่น ๆ

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point11" class="form-control"
                                                            name="personality_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">12</td>
                                                <td>มนุษยสัมพันธ์ (Interpersonal skills) <br>
                                                    สามารถร่วมงานกับผู้อื่น การทำงานเป็นทีม สร้างมนุษย์สมพันธ์ได้ดี
                                                    เป็นที่รักใคร่
                                                    ชอบพอของผู้ร่วมงาน เป็นผู้ที่ช่วยก่อให้เกิดความร่วมมือประสานงาน

                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point12" class="form-control"
                                                            name="interpersonal_skills_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">13</td>
                                                <td>ความมีระเบียบวินัย ปฏิบัติตามวัฒนธรรมขององค์กร
                                                    (Discipline and adaptability to formal organization) <br>
                                                    ความสนใจเรียนรู้ ศึกษา กฎระเบียบ นโยบายต่าง ๆ และปฏิบัติตามโดยเต็มใจ
                                                    การปฏิบัตตามระเบียบ บริหารงานบุคคล (การเข้างาน ลางาน)
                                                    ปฏิบัติตามกฎการรักษาความปลอดภัยในโรงงาน การควบคุมคุณภาพ 5ส และ/หรือ
                                                    อื่น ๆ

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point13" class="form-control"
                                                            name="discipline_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">14</td>
                                                <td>คุณธรรมและจริยธรรม (Ethics and morality) <br>
                                                    มีความซื่อสตย์ สุจริต มีจิตใจสะอาด รู้จักเสียสละ ไม่เห็นแก่ตัว
                                                    เอื้อเฟื้อช่วยเหลือผู้อื่น
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" aria-label="point14" class="form-control"
                                                            name="ethics_score">
                                                        <span class="input-group-text">5 คะแนน</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </dev>

                                <div class="fw-bold">โปรดให้ข้อคิดเห็นที่เป็นประโยชน์แก่นักศึกษา/Please give comments
                                    to the student</div>

                                <div class="col-md-12">
                                    <label class="require" for="exampleFormControlTextarea1"
                                        class="form-label">จุดเด่นของนักศึกษา/Strength</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="จุดเด่นของนักศึกษา" name="appraisal_strength" require></textarea>
                                </div> <br>
                                <div class="col-md-12">
                                    <label class="require" for="exampleFormControlTextarea1"
                                        class="form-label">ข้อควรปรับปรุงของนักศึกษา/Improvement</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="ข้อควรปรับปรุงของนักศึกษา" name="appraisal_improvement"
                                        require></textarea>
                                </div>

                                <div>
                                    <p class="require">หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว
                                        ท่านคิดว่าจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่ (หากมีโอกาสเลือก) Once this
                                        student graduates, will you be interested to offer him/her a job?</p>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="appraisal_status_std"
                                            value="รับ" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            รับ/Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="appraisal_status_std"
                                            value="ไม่แน่ใจ" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            ไม่แน่ใจ/Not sure
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="appraisal_status_std"
                                            value="ไม่รับ" id="flexRadioDefault3" checked>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            ไม่รับ/No
                                        </label>
                                    </div>
                                </div>
                                <label>ข้อเสนอแนะเพิ่มเติม</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name=""
                                        id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">ข้อเสนอแนะเพิ่มเติม</label>
                                </div>


                                <div class="col-md-6">
                                    <label class="require" for="formFile" class="form-label">ลายเซ็นผู้ประเมิน</label>
                                    <input class="form-control" type="file" id="formFile" name="appraisal_comment" required>
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