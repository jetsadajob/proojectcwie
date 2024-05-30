<?php

require_once "server.php";

session_start();

if (isset($_POST['btn_register'])) {
    $std_fname = $_POST['txt_std_fname'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];
    $role = $_POST['txt_role'];
    $major = $_POST['txt_major'];
    $std_prefix = $_POST['txt_std_prefix'];
    $std_lname = $_POST['txt_std_lname'];
    $std_id = $_POST['txt_std_id'];

    if (empty($std_fname)) {
        $errorMsg[] = "Please enter std_fname";
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
    } else if (empty($std_prefix)) {
        $errorMsg[] = "Please select std_prefix";
    } else if (empty($std_lname)) {
        $errorMsg[] = "Please select std_lname";
    } else if (empty($std_id)) {
        $errorMsg[] = "Please select std_id";
    } else {

        try {
            $select_stmt = $db->prepare("SELECT std_fname, email FROM login_student WHERE std_fname = :ustd_fname OR email = :uemail");
            $select_stmt->bindParam(":ustd_fname", $std_fname); // ใช้ตัวแปร $std_fname ที่ได้รับมาจากฟอร์ม
            $select_stmt->bindParam(":uemail", $email);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && isset($row['name'])) {
                $errorMsg[] = "Sorry name already exists";
            } else if ($row && isset($row['email'])) {
                $errorMsg[] = "Sorry email already exists";
            } else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO login_student(std_fname, email, password, role, major, std_prefix, std_lname, std_id) VALUES (:ustd_fname, :uemail, :upassword, :urole, :umajor, :ustd_prefix, :ustd_lname, :ustd_id)");
                $insert_stmt->bindParam(":ustd_fname", $std_fname);
                $insert_stmt->bindParam(":uemail", $email);
                $insert_stmt->bindParam(":upassword", $password);
                $insert_stmt->bindParam(":urole", $role);
                $insert_stmt->bindParam(":umajor", $major);
                $insert_stmt->bindParam(":ustd_prefix", $std_prefix);
                $insert_stmt->bindParam(":ustd_lname", $std_lname);
                $insert_stmt->bindParam(":ustd_id", $std_id);

                if ($role == "internship_student") {
                    if ($insert_stmt->execute()) {
                        $insert_email_stmt = $db->prepare("INSERT INTO company_detail(email) VALUES (:uemail)");
                        $insert_email_stmt->bindParam(":uemail", $email);
                        $insert_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO student_history (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO internship_book (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO internship_time (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO internship_certificate (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO internship_information (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $_SESSION['success'] = "Register Successfully...";
                        header("location: ./login_student.php");
                    }
                } else if ($role == "cooperative_student") {
                    if ($insert_stmt->execute()) {
                        $insert_email_stmt = $db->prepare("INSERT INTO petition_document(email) VALUES (:uemail)");
                        $insert_email_stmt->bindParam(":uemail", $email);
                        $insert_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO coop_application_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO coopperative_perental_consent_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO coopperative_education_report_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO student_acceptance_form (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO job_description_accommodation (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO cooperative_report_outline (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $update_email_stmt = $db->prepare("INSERT INTO supervision_recording_student (email) VALUES (:uemail)");
                        $update_email_stmt->bindParam(":uemail", $email);
                        $update_email_stmt->execute();

                        $_SESSION['success'] = "Register Successfully...";
                        header("location: ./login_student.php");
                    }
                } else {
                    echo "ไม่พบผู้ใช้งาน";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
