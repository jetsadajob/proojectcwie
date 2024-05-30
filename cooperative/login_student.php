<?php
    session_start();
    include('./server.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <style>
    .back {
        margin: 1%;

    }

    .back a {
        text-decoration: none;
        color: black;
        color: gray;
    }
    </style>
</head>

<body>
    <div class="back">
        <a href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path
                    d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
            </svg> กลับหน้าหลัก</a>
    </div>
    <form action="./login_db.php" method="post" class="form-horizontal my-5">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <img src="./assets/img/icon.png" alt="logo" width="100">
                                </div>
                                <h1 class="fs-4 card-title fw-bold mb-4 mt-4 text-center">เข้าสู่ระบบสำหรับนักศึกษา</h1>

                                <!-- <div class="form-group mb-3">
                                    <label class="mb-2 text-muted" for="email">ประเภทผู้ใช้งาน</label>
                                    <select name="txt_role" class="form-control">
                                        <option value="" selected="selected">-- กรุณาเลือก --</option>
                                        <option value="นักศึกษาสหกิจศึกษา">นักศึกษาสหกิจศึกษา</option>
                                        <option value="นักศึกษาฝึกงาน">นักศึกษาฝึกงาน</option>
                                    </select>
                                </div> -->

                                <div class="form-group mb-3">
                                    <label class="mb-2 text-muted" for="email">อีเมล</label>
                                    <input type="text" name="txt_email" class="form-control" required placeholder="">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="mb-2 w-100">
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="password">รหัสผ่าน</label>
                                            <div class="input-group mb-2 w-100">
                                                <input type="password" id="password" name="txt_password"
                                                    class="form-control" required placeholder="">
                                                <span class="input-group-text">
                                                    <i class="bi bi-eye" id="signupEyeIcon"
                                                        onclick="togglePasswordVisibility('password', 'signupEyeIcon')"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <a href="./forgot_password.php" class="float-end">
                                            ลืมรหัสผ่าน?
                                        </a>
                                    </div>
                                </div> <br>

                                <div class="row p-2">
                                    <!-- <div class="mb-2 w-100"> -->
                                    <button type="submit" name="btn_login" class="btn btn-primary">
                                        เข้าสู่ระบบ
                                    </button>
                                </div>
                                <div class="text-center mt-2">
                                    มีบัญชีหรือยัง? <a href="./register_student.php">ลงทะเบียน</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    </div>
    <script>
    function togglePasswordVisibility(inputId, iconId) {
        var passwordInput = document.getElementById(inputId);
        var eyeIcon = document.getElementById(iconId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>