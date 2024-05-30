<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

</head>

<body>

    <form action="register.php" method="post" class="form-horizontal my-5">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <img src="./assets/img/icon.png" alt="logo" width="100">
                                </div>
                                <h1 class="fs-4 card-title fw-bold mb-4 mt-4 text-center">ลงทะเบียนสำหรับนักศึกษา</h1>
                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">

                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="email">ประเภทผู้ใช้งาน</label>
                                        <select name="txt_role" class="form-control">
                                            <option value="" selected="selected">-- กรุณาเลือก --</option>
                                            <option value="นักศึกษาสหกิจศึกษา">นักศึกษาสหกิจศึกษา</option>
                                            <option value="นักศึกษาฝึกงาน">นักศึกษาฝึกงาน</option>
                                        </select>

                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="email">คำนำหน้า</label>
                                        <select name="txt_std_prefix" class="form-control">
                                            <option value="" selected="selected">-- กรุณาเลือก --</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="std_fname">ชื่อ</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="std_fname" name="txt_std_fname" class="form-control"
                                                required placeholder="">
                                            <div id="fnameError" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="std_lname">นามสกุล</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="std_lname" name="txt_std_lname" class="form-control"
                                                required placeholder="">
                                            <div id="lnameError" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="std_id">รหัสนักศึกษา</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="studentIdInput" name="txt_std_id"
                                                class="form-control" required placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="require" for="inputState" class="form-label">ชั้นปี</label>
                                        <select id="inputState" class="form-select" name="txt_year_of_study" required>
                                            <option selected>-- เลือก --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="std_id">เบอร์โทร</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="studentIdInput" name="txt_std_phone" class="form-control" required placeholder="">
                                        </div>
                                    </div> -->

                                    <div class="form-group mb-3">
                                        <label class="require" class="mb-2 text-muted" for="major">สาขาวิชา</label>
                                        <select class="form-select" name="txt_major" required>
                                            <option selected>-- กรุณาเลือก --</option>
                                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                            <option value="ภูมิสารสนเทศศาสตร์">ภูมิสารสนเทศศาสตร์</option>
                                            <option value="ปัญญาประดิษฐ์">ปัญญาประดิษฐ์</option>
                                            <option value="ความมั่นคงปลอดภัยไซเบอร์">ความมั่นคงปลอดภัยไซเบอร์</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="require" class="mb-2 text-muted" for="major">โครงการ</label>
                                        <select class="form-select" name="txt_std_project" required>
                                            <option selected>-- กรุณาเลือก --</option>
                                            <option value="โครงการปกติ">โครงการปกติ</option>
                                            <option value="โครงการพิเศษ">โครงการพิเศษ</option>
                                        </select>
                                    </div>



                                    <div class="form-group mb-3">
                                        <label class="mb-2 text-muted" for="email">อีเมล</label>
                                        <input type="text" name="txt_email" class="form-control" required
                                            placeholder="">
                                    </div>

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
                                    <div id="password-error" class="error-message text-danger"></div>


                                    <div class="form-group mb-3">
                                        <label class="text-muted" for="confirmPassword">ยืนยันรหัสผ่าน</label>
                                        <div class="input-group mb-2 w-100">

                                            <input type="password" id="confirm_password" name="txt_confirm_password"
                                                class="form-control" required placeholder="">
                                            <span class="input-group-text">
                                                <i class="bi bi-eye" id="confirmPasswordEyeIcon"
                                                    onclick="togglePasswordVisibility('confirm_password', 'confirmPasswordEyeIcon')"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="confirm-password-error" class="error-message text-danger"></div>



                                    <div class="row p-2">
                                        <!-- <div class="mb-2 w-100"> -->
                                        <button type="submit" name="btn_register" class="btn btn-primary">
                                            ลงทะเบียน
                                        </button>
                                    </div>
                                    <div class="text-center mt-2">
                                        มีบัญชีอยู่แล้ว? <a href="login_student.php">เข้าสู่ระบบ</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </form>



    <script>
    document.getElementById('std_lname').addEventListener('input', function() {
        var lnameInput = document.getElementById('std_lname');
        var lnameError = document.getElementById('lnameError');

        if (lnameInput.value.includes(' ')) {
            lnameError.innerHTML = 'กรุณากรอกสกุลโดยไม่มีการเว้นวรรค';
        } else {
            lnameError.innerHTML = '';
        }
    });
    </script>

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


    <script>
    document.getElementById('std_fname').addEventListener('input', function() {
        var fnameInput = document.getElementById('std_fname');
        var fnameError = document.getElementById('fnameError');

        if (fnameInput.value.includes(' ')) {
            fnameError.innerHTML = 'กรุณากรอกชื่อโดยไม่มีการเว้นวรรค';
        } else {
            fnameError.innerHTML = '';
        }
    });
    </script>

    <script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const passwordError = document.getElementById('password-error');
    const confirmError = document.getElementById('confirm-password-error');

    passwordInput.addEventListener('input', () => {
        const password = passwordInput.value;
        if (password.length < 8) {
            passwordError.textContent = 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว';
        } else {
            passwordError.textContent = '';
        }
    });

    confirmPasswordInput.addEventListener('input', () => {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            confirmError.textContent = 'รหัสผ่านไม่ตรงกัน';
        } else {
            confirmError.textContent = '';
        }
    });

    function hashPassword(password) {
        // ทำการแปลงรหัสผ่านเป็น MD5 โดยใช้ไลบรารี CryptoJS
        return CryptoJS.MD5(password).toString();
    }
    </script>
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