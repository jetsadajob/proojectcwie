<?php
include '../work/dbwork.php';
session_start();

$email = $_SESSION['id'];
$sql = "SELECT * FROM admin WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <title>ข้อมูลแอดมิน</title>


    <!-- รูปโปรไฟล์ -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/profiles/Computing_KKU.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <!-- ฟอน CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">

    <!-- Main CSS ของส่วนข้อมูล-->



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">




    <style>
        body {
            /* background: rgb(99, 39, 120) */
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: #FFD700;
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

        .breadcrumb a {
            color: grey;
        }

        nav .breadcrumb {
            margin-left: 35px;
            margin-top: 45px;
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
    </style>

</head>

<body>
    <div class="main-wrapper">
        <?php
        include('./nav_admin.php');

        ?>

        <div class="page-wrapper">

            <div class="content container-fluid ">
                <form action="./profile_update.php" method="POST">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">โปรไฟล์</li>
                        </ol>
                    </nav>

                    <div class="container rounded bg-white mt-12 mb-12">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <div class="circle">
                                        <span><?php echo strtoupper(substr($email, 0, 1)); ?></span>
                                    </div><span class="font-weight-bold"><br><?php echo isset($row['email']) ? $row['email'] : ''; ?> </span><span> </span>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-center">โปรไฟล์</h4>
                                    </div>
                                    <div class="row mt-2">

                                        <div class="col-md-12"><label class="labels">ชื่อผู้ใช้</label><input type="text" class="form-control" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" ></div>
                                    </div>
                                    <div class="row mt-6">
                                        <div class="col-md-12"><label class="labels">อีเมล</label><input type="text" class="form-control" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" disabled></div>
                                    </div>


                                    <div class="button text-right mt-5">
                                        <a href="./profile.php"><button type="button" class="btn btn-danger" data-toggle="button" aria-pressed="false">
                                                ยกเลิก
                                            </button></a>

                                        <button type="submit" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                            บันทึก
                                        </button>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS ตัวเลื่อนแทบข้างๆ -->
    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/app.js"></script>




    =
    <script src="../script.js"></script>
</body>

</html>

<?php


?>