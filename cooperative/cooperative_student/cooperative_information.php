<?php
session_start(); // เรียกใช้ session_start() ที่บรรทัดแรกของไฟล์
include('../server.php');

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่ หากไม่ได้เข้าสู่ระบบให้ redirect ไปยังหน้า login_student.php
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_student.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// เรียกข้อมูลของผู้ใช้จากฐานข้อมูล
$sql = "SELECT * FROM login_student WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$email = isset($row['email']) ? $row['email'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์</title>
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
    <title>โปรไฟล์</title>

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
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .circle {
            margin: 0 auto;
            width: 150px;
            height: 150px;
            background-color: #1a3644;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle span {
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            margin-left: 25px;
            margin-top: 45px;
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
            <!-- ส่วนของข้อมูล -->

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../cooperative_student/cooperative_student_home.php">แบบฟอร์มสหกิจศึกษา</a></li>
                    <li class="breadcrumb-item"><a href="../cooperative_student/cooperative_information_detail.php">โปรไฟล์</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แก้ไขโปรไฟล์</li>
                </ol>
            </nav>
            <div class="content container-fluid">
                <div class="fw-semibold text-center">
                    ข้อมูลนักศึกษา
                </div><br>

                <form class="row g-3 needs-validation" action="./cooperative_information_updated.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="email" value="<?php echo $id; ?>">
                    <div class="container rounded bg-white mt-12 mb-12">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <div class="circle">
                                        <span><?php echo strtoupper(substr($email, 0, 1)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-center">โปรไฟล์</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                            <select id="inputState" class="form-select" name="std_prefix" required>
                                                <option selected><?php echo isset($row['std_prefix']) ? $row['std_prefix'] : ''; ?></option>
                                                <option value="นาย">นาย</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="std_fname" value="<?php echo isset($row['std_fname']) ? $row['std_fname'] : ''; ?>" required>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                                            <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="std_lname" value="<?php echo isset($row['std_lname']) ? $row['std_lname'] : ''; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-md-6">
                                            <label class="require" for="studentIdInput" class="form-label">รหัสนักศึกษา</label>
                                            <input type="text" class="form-control" id="studentIdInput" placeholder="รหัสนักศึกษา" name="std_id" value="<?php echo isset($row['std_id']) ? $row['std_id'] : ''; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="require" for="inputState" class="form-label">ชั้นปี</label>
                                            <select id="inputState" class="form-select" name="year_of_study" required>
                                                <option selected><?php echo isset($row['year_of_study']) ? $row['year_of_study'] : ''; ?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="require" for="inputState" class="form-label">สาขาวิชา</label>
                                            <select id="inputState" class="form-select" name="major" required>
                                                <option selected><?php echo isset($row['major']) ? $row['major'] : ''; ?></option>
                                                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                                <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                                <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                                                <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                                                <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="require mb-2 text-muted" for="std_id">เบอร์โทร</label>
                                            <input type="text" id="phoneInput" name="std_phone" class="form-control" placeholder="กรุณากรอกเบอร์โทร" value="<?php echo isset($row['std_phone']) ? $row['std_phone'] : ''; ?>" required pattern="[0-9]{10}" title="กรุณากรอกเฉพาะตัวเลข 10 หลัก" inputmode="numeric">
                                        </div>

                                        <div class="col-md-6">
                                        <label class="require" class="mb-2 text-muted" for="email">อีเมล</label>
                                        <input type="text" name="txt_email" class="form-control" placeholder="" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required>
                                    </div>

                                        <div class="col-md-6">
                                            <label class="require" for="inputState" class="form-label">โครงการ</label>
                                            <select id="inputState" class="form-select" name="major" required>
                                                <option selected><?php echo isset($row['major']) ? $row['major'] : ''; ?></option>
                                                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                                <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                                <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                                                <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                                                <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="require" for="std_birthday" class="form-lable">วัน/เดือน/ปีเกิด</label>
                                            <input type="date" class="form-control" id="std_birthday" name="std_birthday" value="<?php echo isset($row['std_birthday']) ? $row['std_birthday'] : ''; ?>" required onchange="validatestd_birthday()">
                                            <div id="std_birthdayError" class="text-danger"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="require" for="inputtext" class="form-label">อายุ</label>
                                            <input type="text" class="form-control" id="age" name="std_age" readonly required>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-3 pl-6 pt-4">
                                        <h6 class="text-right">อาจารย์ที่ปรึกษา</h6>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <label class="require" for="inputState" class="form-label">คำนำหน้า</label>
                                            <select id="inputState" class="form-select" name="teacher_prefix" required>
                                                <option selected><?php echo isset($row['teacher_prefix']) ? $row['teacher_prefix'] : ''; ?></option>
                                                <option value="ศ. ดร.">ศ. ดร.</option>
                                                <option value="รศ. ดร.">รศ. ดร.</option>
                                                <option value="ผศ. ดร.">ผศ. ดร.</option>
                                                <option value="อ. ดร.">อ. ดร.</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="require" for="inputtext" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control" id="inputtext" placeholder="ชื่อ" name="teacher_fname" value="<?php echo isset($row['teacher_fname']) ? $row['teacher_fname'] : ''; ?>" required>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="require" for="inputtext" class="form-label">นามสกุล</label>
                                            <input type="text" class="form-control" id="inputtext" placeholder="นามสกุล" name="teacher_lname" value="<?php echo isset($row['teacher_lname']) ? $row['teacher_lname'] : ''; ?>" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="require" for="inputtext" class="form-label">อีเมล</label>
                                            <input type="text" class="form-control" id="inputtext" placeholder="กรอกอีเมล" name="teacher_email" value="<?php echo isset($row['teacher_email']) ? $row['teacher_email'] : ''; ?>" required>
                                        </div>
                                    </div>

                                    <a href="./cooperative_information_detail.php">
                                        <div class="mt-5 text-center"><button type="submit" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                                บันทึก
                                            </button></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- เช็ครหัสนักศึกษา -->
    <script>
        document.getElementById('studentIdInput').addEventListener('input', function(e) {
            var input = e.target.value.replace(/\D/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลข
            if (input.length > 9) {
                input = input.substring(0, 9) + "-" + input.substring(9);
            }
            e.target.value = input.slice(0, 11); // จำกัดความยาวที่ 11 รวมกับ '-'
        });
    </script>

    <!-- เช็คปีที่กรอก / อายุ -->
    <script>
        function validatestd_birthday() {
            var birthday = document.getElementById('std_birthday').value;
            var birthYear = new Date(birthday).getFullYear();

            if (birthYear > 2018) {
                document.getElementById('std_birthdayError').innerHTML = 'ปีเกิดต้องไม่มากกว่า 2018';
                document.getElementById('std_birthday').value = ''; // Clear the input field
                document.getElementById('age').value = ''; // Clear the age field
            } else {
                document.getElementById('std_birthdayError').innerHTML = '';
                var todayYear = new Date().getFullYear();
                var age = todayYear - birthYear;
                var monthDiff = new Date().getMonth() - new Date(birthday).getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && new Date().getDate() < new Date(birthday).getDate())) {
                    age--;
                }
                document.getElementById('age').value = age;
            }
        }
    </script>

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