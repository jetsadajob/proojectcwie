<?php
include '../work/dbwork.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected_students']) && !empty($_POST['selected_students'])) {
        $company_name = $_POST['company_name'];
        $company_address = $_POST['company_address'];
        $company_subdistrict = $_POST['company_subdistrict'];
        $company_district = $_POST['company_district'];
        $company_province = $_POST['company_province'];
        $company_zip = $_POST['company_zip'];

        foreach ($_POST['selected_students'] as $selected) {
            // ตรวจสอบว่าข้อมูลที่เกี่ยวข้องถูกต้องหรือไม่
            if (isset($selected['std_fname']) && isset($selected['std_lname']) && isset($selected['std_major']) && isset($selected['std_email'])) {
                $sql_insert = "INSERT INTO std_supervision (std_fname, std_lname, std_major, std_email, company_name, company_address, company_subdistrict, company_district, company_province, company_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_insert = mysqli_prepare($conn, $sql_insert);
                if ($stmt_insert) {
                    mysqli_stmt_bind_param($stmt_insert, 'ssssssssss', $selected['petition_fname'], $selected['petition_fname'], $selected['std_major'], $selected['std_email'], $company_name, $company_address, $company_subdistrict, $company_district, $company_province, $company_zip);
                    mysqli_stmt_execute($stmt_insert);
                    mysqli_stmt_close($stmt_insert);
                } else {
                    echo "Error preparing statement: " . mysqli_error($conn);
                }
            } else {
                echo "ข้อมูลนักศึกษาไม่ถูกต้อง";
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
    // $name_hr = $_POST['name_hr'];
    $supervisor_1 = $_POST['supervisor_1'];
    $supervisor_2 = $_POST['supervisor_2'];
    $supervisor_3 = $_POST['supervisor_3'];
    $supervisor_4 = $_POST['supervisor_4'];
    $supervisor_5 = $_POST['supervisor_5'];
    $supervisor_6 = $_POST['supervisor_6'];
    $date_supervision = $_POST['date_supervision'];
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
        -- name_hr, 
        supervisor_1, 
        supervisor_2, 
        supervisor_3, 
        supervisor_4, 
        supervisor_5, 
        supervisor_6, 
        date_supervision
    ) VALUES (?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?)";

   

    $stmt1 = mysqli_prepare($conn, $sql1);
    if ($stmt1) {
        mysqli_stmt_bind_param($stmt1, 'sssssssssssss', $company_name, $company_address, $company_subdistrict, $company_district, $company_province, $company_zip,  $supervisor_1, $supervisor_2, $supervisor_3, $supervisor_4, $supervisor_5, $supervisor_6 , $date_supervision);
        $result1 = mysqli_stmt_execute($stmt1);
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location='../supervisor.php';</script>";
    } else {
        // แสดงข้อผิดพลาดหากการเตรียมคำสั่ง SQL ไม่สำเร็จ
        echo "Error preparing statement 1: " . mysqli_error($conn);
    }

   



    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
}
