<?php 

    require_once "connection.php";

    session_start();

    if (isset($_POST['btn_register'])) {
        $company = $_POST['txt_company'];
        $address = $_POST['txt_address'];
        $subdistrict = $_POST['txt_subdistrict'];
        $district = $_POST['txt_district'];
        $provice = $_POST['txt_province'];
        $zip = $_POST['txt_zip'];
        $role = $_POST['txt_role'];
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];

        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($company)) {
            $errorMsg[] = "Please enter company";
        } else if (empty($address)) {
            $errorMsg[] = "pelase select address";
        } else if (empty($subdistrict)) {
            $errorMsg[] = "pelase select subdistrict";
        } else if (empty($district)) {
            $errorMsg[] = "pelase select district";
        } else if (empty($provice)) {
            $errorMsg[] = "pelase select province";
        } else if (empty($zip)) {
            $errorMsg[] = "pelase select zip";
        } else if (empty($role)) {
            $errorMsg[] = "pelase select role";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (strlen($password) < 6) {
            $errorMsg[] = "Password must be atleast 6 characters";

        } else {
            try {
                $db->beginTransaction();
            
                // 1. เริ่มจากการเพิ่มข้อมูลลงในตาราง 'hr'
                $insert_hr_stmt = $db->prepare("INSERT INTO hr (role, email, password) VALUES (:role, :email, :password)");
                $insert_hr_stmt->bindParam(":role", $role);
                $insert_hr_stmt->bindParam(":email", $email);
                $insert_hr_stmt->bindParam(":password", $password);
            
                if ($insert_hr_stmt->execute()) {
                    // 2. จากนั้นเพิ่มข้อมูลลงในตาราง 'tbl_company'
                    $insert_company_stmt = $db->prepare("INSERT INTO tbl_company (company, address, subdistrict, district, province, zip) VALUES (:company, :address, :subdistrict, :district, :province, :zip)");
                    $insert_company_stmt->bindParam(":company", $company);
                    $insert_company_stmt->bindParam(":address", $address);
                    $insert_company_stmt->bindParam(":subdistrict", $subdistrict);
                    $insert_company_stmt->bindParam(":district", $district);
                    $insert_company_stmt->bindParam(":province", $provice);
                    $insert_company_stmt->bindParam(":zip", $zip);
            
                    if ($insert_company_stmt->execute()) {
                        $db->commit(); // บันทึกข้อมูลลงในทั้งสองตาราง
                        $_SESSION['success'] = "Register Successfully...";
                        header("location: login_company.php");
                    } else {
                        $db->rollBack(); // ถ้ามีปัญหาในการบันทึกในตาราง 'tbl_company' จะยกเลิกทั้งหมด
                    }
                } else {
                    $db->rollBack(); // ถ้ามีปัญหาในการบันทึกในตาราง 'hr' จะยกเลิกทั้งหมด
                }
            } catch(PDOException $e) {
                $e->getMessage();
                $db->rollBack(); // ถ้าเกิดข้อผิดพลาดจะยกเลิกทั้งหมด
            }
            
        }
    }


?>