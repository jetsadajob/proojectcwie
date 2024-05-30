<html lang="en">

<head>
    <link rel="icon" href="img/logo.png" type="icon website">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตั้งรหัสผ่านใหม่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ตั้งรหัสผ่านใหม่</h5>
                        <form action="process_reset.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="otp" class="form-label">OTP:</label>
                                <input type="text" class="form-control" id="otp" name="otp" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่านใหม่:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="togglePasswordVisibility('password', 'password-eye')">
                                        <i class="bi bi-eye" id="password-eye"></i>
                                    </button>
                                </div>
                                <span id="password-error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">ยืนยันรหัสผ่านใหม่:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="togglePasswordVisibility('confirm_password', 'confirm-password-eye')">
                                        <i class="bi bi-eye" id="confirm-password-eye"></i>
                                    </button>
                                </div>
                                <span id="confirm-password-error" class="text-danger"></span>
                            </div>

                            <button type="submit" class="btn btn-primary">ตั้งรหัสผ่านใหม่</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
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
</script>
<script>
function togglePasswordVisibility(inputId, iconId) {
    var input = document.getElementById(inputId);
    var icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
</script>

</html>