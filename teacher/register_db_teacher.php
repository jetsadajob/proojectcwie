<?php 

    require_once "connection.php";

    session_start();

    if (isset($_POST['btn_register'])) {
        $prefix = $_POST['prefix'];
        $name = $_POST['txt_name'];
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];
        $role = $_POST['txt_role'];
        $major = $_POST['txt_major'];

        if (empty($name)) {
            $errorMsg[] = "Please enter name";
        } else if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (strlen($password) < 6) {
            $errorMsg[] = "Password must be atleast 6 characters";
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
        } else if (empty($major)) {
            $errorMsg[] = "Please select major";
        } else if (empty($prefix)) {
            $errorMsg[] = "Please select prefix";
        } else {
            try {
                $select_stmt = $db->prepare("SELECT name, email FROM login_teacher WHERE name = :uname OR email = :uemail");
                $select_stmt->bindParam(":uname", $name);
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['name'] == $name) {
                    $errorMsg[] = "Sorry name already exists";
                } else if ($row['email'] == $email) {
                    $errorMsg[] = "Sorry email already exists";
                } else if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO login_teacher(prefix, name, email, password, role, major) VALUES (:prefix, :uname, :uemail, :upassword, :urole, :umajor)");
                    $insert_stmt->bindParam(":prefix", $prefix);
                    $insert_stmt->bindParam(":uname", $name);
                    $insert_stmt->bindParam(":uemail", $email);
                    $insert_stmt->bindParam(":upassword", $password);
                    $insert_stmt->bindParam(":urole", $role);
                    $insert_stmt->bindParam(":umajor", $major);

                    if ($insert_stmt->execute()) {
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: login_teacher.php");
                    }
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
?>
