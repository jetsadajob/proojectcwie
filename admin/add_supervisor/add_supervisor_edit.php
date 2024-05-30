<?php
include '../work/dbwork.php';

if (isset($_POST['submit'])) {
    if (!empty($_POST['selected_students'])) {
        // ดึงข้อมูลจากฟอร์มและฐานข้อมูล
        $company_name = $_POST['company_name']; // ตัวอย่างเท่านั้น คุณต้องใช้ชื่อฟิลด์จริงในฟอร์มของคุณ
        $company_address = $_POST['company_address']; // เช่นเดียวกันกับที่อยู่บริษัท
        $name_hr = $_POST['name_hr']; // เช่นเดียวกันกับที่อยู่บริษัท
        $company_subdistrict = $_POST['company_subdistrict'];
        $company_district = $_POST['company_district'];
        $company_province = $_POST['company_province'];
        $company_zip = $_POST['company_zip'];
        // ตัวแปรอื่น ๆ เช่น company_subdistrict, company_district, company_province, company_zip, name_hr ให้ใส่ค่าเหมาะสมจากฟอร์มของคุณ

        foreach ($_POST['selected_students'] as $selected) {
            $sql_student = "SELECT * FROM login_student WHERE name = ?";
            $sql_insert = "INSERT INTO std_supervision (std_name, std_major, std_email, company_name, company_address ,	name_hr ,company_subdistrict, 
            company_district,
            company_province,
            company_zip) VALUES (?, ?, ?, ?, ?, ? , ?, ?, ?, ?)";

            $stmt_student = mysqli_prepare($conn, $sql_student);
            $stmt_insert = mysqli_prepare($conn, $sql_insert);

            if ($stmt_student && $stmt_insert) {
                mysqli_stmt_bind_param($stmt_student, 's', $selected);
                mysqli_stmt_execute($stmt_student);
                $result_student = mysqli_stmt_get_result($stmt_student);
                $student_data = mysqli_fetch_assoc($result_student);

                mysqli_stmt_bind_param($stmt_insert, 'ssssssssss', $student_data['name'], $student_data['major'], $student_data['email'], $company_name, $company_address, $name_hr ,$company_subdistrict ,$company_district ,$company_province  ,$company_zip);
                mysqli_stmt_execute($stmt_insert);

                mysqli_stmt_close($stmt_student);
                mysqli_stmt_close($stmt_insert);
            } else {
                echo "Error preparing statement: " . mysqli_error($conn);
            }
        }
        echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "กรุณาเลือกข้อมูลที่ต้องการเพิ่ม";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม


    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $company_subdistrict = $_POST['company_subdistrict'];
    $company_district = $_POST['company_district'];
    $company_province = $_POST['company_province'];
    $company_zip = $_POST['company_zip'];
    $name_hr = $_POST['name_hr'];
    $supervisor_1 = $_POST['supervisor_1'];
    $supervisor_2 = $_POST['supervisor_2'];
    $supervisor_3 = $_POST['supervisor_3'];
    $supervisor_4 = $_POST['supervisor_4'];
    $supervisor_5 = $_POST['supervisor_5'];
    $supervisor_6 = $_POST['supervisor_6'];
    // $std_name = $_POST['std_name'];
    // $std_major = $_POST['std_major'];
    // $std_email = $_POST['std_email'];


    // สร้างคำสั่ง SQL สำหรับตาราง add_supervisor
    $sql1 = "INSERT INTO add_supervisor (
        company_name, 
        company_address, 
        company_subdistrict, 
        company_district,
        company_province,
        company_zip,
        name_hr, 
        supervisor_1, 
        supervisor_2, 
        supervisor_3, 
        supervisor_4, 
        supervisor_5, 
        supervisor_6
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // สร้างคำสั่ง SQL สำหรับตาราง std_supervision
    // $sql2 = "INSERT INTO std_supervision (
    //         company_name, 
    //         company_address, 
    //         company_subdistrict, 
    //         company_district,
    //         company_province,
    //         company_zip,
    //         name_hr, 
    //         std_name, 
    //         std_major, 
    //         std_email
    //     ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt1 = mysqli_prepare($conn, $sql1);
    if ($stmt1) {
        mysqli_stmt_bind_param($stmt1, 'sssssssssssss', $company_name, $company_address, $company_subdistrict, $company_district, $company_province, $company_zip, $name_hr, $supervisor_1, $supervisor_2, $supervisor_3, $supervisor_4, $supervisor_5, $supervisor_6);
        $result1 = mysqli_stmt_execute($stmt1);
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location='../add_supervisor.php';</script>";
    } else {
        // แสดงข้อผิดพลาดหากการเตรียมคำสั่ง SQL ไม่สำเร็จ
        echo "Error preparing statement 1: " . mysqli_error($conn);
    }

    // $stmt2 = mysqli_prepare($conn, $sql2);
    // if ($stmt2) {
    //     mysqli_stmt_bind_param($stmt2, 'ssssssssss', $company_name, $company_address, $company_subdistrict, $company_district, $company_province, $company_zip, $name_hr, $std_name, $std_major, $std_email);
    //     $result2 = mysqli_stmt_execute($stmt2);
    //     echo "<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location='../add_supervisor.php';</script>";
    // } else {

    //     echo "Error preparing statement 2: " . mysqli_error($conn);
    // }
    // // ปิด statement
    mysqli_stmt_close($stmt1);
    // mysqli_stmt_close($stmt2);



    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
}
