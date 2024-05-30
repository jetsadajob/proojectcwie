<?php
require_once "./connection.php";

session_start();

function generateRandomPassword($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company = $_POST['txt_company'];
    $address = $_POST['txt_address'];
    $subdistrict = $_POST['txt_subdistrict'];
    $district = $_POST['txt_district'];
    $province = $_POST['txt_province'];
    $zip = $_POST['txt_zip'];
    $role = $_POST['txt_role'];
    $namehr = $_POST['txt_namehr'];
    $email = $_POST['txt_email'];
    $password = generateRandomPassword(); // สร้างรหัสผ่านสุ่ม

    try {
        $conn->beginTransaction();

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $insert_hr_stmt = $conn->prepare("INSERT INTO hr (role, namehr, email, password) VALUES (:role, :namehr, :email, :password)");
        $insert_hr_stmt->bindParam(":role", $role);
        $insert_hr_stmt->bindParam(":email", $email);
        $insert_hr_stmt->bindParam(":namehr", $namehr);
        $insert_hr_stmt->bindParam(":password", $passwordHash);

        if ($insert_hr_stmt->execute()) {
            $insert_company_stmt = $conn->prepare("INSERT INTO tbl_company (company, address, subdistrict, district, province, zip) VALUES (:company, :address, :subdistrict, :district, :province, :zip)");
            $insert_company_stmt->bindParam(":company", $company);
            $insert_company_stmt->bindParam(":address", $address);
            $insert_company_stmt->bindParam(":subdistrict", $subdistrict);
            $insert_company_stmt->bindParam(":district", $district);
            $insert_company_stmt->bindParam(":province", $province);
            $insert_company_stmt->bindParam(":zip", $zip);

            if ($insert_company_stmt->execute()) {
                $conn->commit(); // บันทึกข้อมูลลงในทั้งสองตาราง
                $_SESSION['success'] = "Register Successfully...";
                header("location: ../addcompany.php"); // แก้ไขตาม URL ที่ถูกต้อง
            } else {
                $conn->rollBack(); // ถ้ามีปัญหาในการบันทึกในตาราง 'tbl_company' จะยกเลิกทั้งหมด
            }
        } else {
            $conn->rollBack(); // ถ้ามีปัญหาในการบันทึกในตาราง 'hr' จะยกเลิกทั้งหมด
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn->rollBack();
    }
}


?>
