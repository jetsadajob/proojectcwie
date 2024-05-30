<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForgotPassword</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
</head>

<body>

    <form action="login_db.php" method="post" class="form-horizontal my-5">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <img src="./assets/img/icon.png" alt="logo" width="100">
                                </div>
                                <h1 class="fs-4 card-title fw-bold mb-4 mt-4 text-center">ลืมรหัสผ่าน</h1>
                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">

                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="email">อีเมล</label>
                                        <input type="text" name="txt_email" class="form-control" required
                                            placeholder="">
                                    </div>

                                    <div class="row p-2">
                                        <!-- <div class="mb-2 w-100"> -->
                                        <button type="submit" name="btn_login" class="btn btn-primary">
                                            ยืนยัน
                                        </button>
                                    </div>
                                    <div class="text-center mt-2">
                                        จำรหัสผ่าน? <a href="login_student.php">เข้าสู่ระบบ</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>