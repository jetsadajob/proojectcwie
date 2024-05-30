<?php

require_once "connection.php";

session_start();

if (isset($_POST['btn_register'])) {
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
        $errorMsg[] = "Password must be at least 6 characters";
    } else if (empty($role)) {
        $errorMsg[] = "Please select role";
    } else if (empty($major)) {
        $errorMsg[] = "Please select major";
    } else {
        try {
            $select_stmt = $db->prepare("SELECT name, email FROM login_student WHERE name = :uname OR email = :uemail");
            $select_stmt->bindParam(":uname", $name);
            $select_stmt->bindParam(":uemail", $email);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['name'] == $name) {
                $errorMsg[] = "Sorry name already exists";
            } else if ($row['email'] == $email) {
                $errorMsg[] = "Sorry email already exists";
            } else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO login_student(name, email, password, role, major) VALUES (:uname, :uemail, :upassword, :urole, :umajor)");
                $insert_stmt->bindParam(":uname", $name);
                $insert_stmt->bindParam(":uemail", $email);
                $insert_stmt->bindParam(":upassword", $password);
                $insert_stmt->bindParam(":urole", $role);
                $insert_stmt->bindParam(":umajor", $major);

                if ($role == "internship_student") {
                    // ถ้า role เป็น "internship_student"
                    if ($insert_stmt->execute()) {
                        // เพิ่มข้อมูล email ลงในตาราง company_detail
                        $insert_email_stmt = $db->prepare("INSERT INTO company_detail(email) VALUES (:uemail)");
                        $insert_email_stmt->bindParam(":uemail", $email);
                        $insert_email_stmt->execute();
                
                        // เพิ่มข้อมูล email ลงในตาราง student_history
                        $update_email_stmt = $db->prepare("INSERT INTO student_history (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();
                
                        // เพิ่มข้อมูล email ลงในตาราง internship_book
                        $update_email_stmt = $db->prepare("INSERT INTO internship_book (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        // เพิ่มข้อมูล email ลงในตาราง internship_book
                        $update_email_stmt = $db->prepare("INSERT INTO internship_time (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        // เพิ่มข้อมูล email ลงในตาราง internship_book
                        $update_email_stmt = $db->prepare("INSERT INTO internship_certificate (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();
                
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: ./login_student.php");
                    }
                } else if ($role == "cooperative_student") {
                    // ถ้า role ไม่ใช่ "cooperative_student"
                    if ($insert_stmt->execute()) {
                        // ดำเนินการเพิ่มข้อมูลสำหรับ role อื่น ๆ ที่ไม่ใช่ "internship_student"
                        $insert_email_stmt = $db->prepare("INSERT INTO petition_document(email) VALUES (:uemail)");
                        $insert_email_stmt->bindParam(":uemail", $email);
                        $insert_email_stmt->execute();
                
                        // เพิ่มข้อมูล email ลงในตาราง student_history
                        $update_email_stmt = $db->prepare("INSERT INTO coop_application_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();
                
                        // เพิ่มข้อมูล email ลงในตาราง internship_book
                        $update_email_stmt = $db->prepare("INSERT INTO coopperative_perental_consent_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        // เพิ่มข้อมูล email ลงในตาราง internship_book
                        $update_email_stmt = $db->prepare("INSERT INTO coopperative_education_report_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();
                
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: ./login.php");
                        
                    }
                } else{
                    echo "ไม่พบผู้ใช้งาน" ;
                }
                
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>
