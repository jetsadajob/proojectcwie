<?php
include('../include_sweetalert.php');
include '../work/dbwork.php';

// ตรวจสอบว่ามีการส่งค่า POST หรือไม่
if (isset($_POST['submit'])) {


    // ตรวจสอบว่ามีการเลือกนักศึกษาหรือไม่
    if (!empty($_POST['selected_students'])) {
        // ดึงข้อมูลจากฟอร์ม
        $company_name = $_POST['company_name'];
        $company_address = $_POST['company_address'];
        $company_subdistrict = $_POST['company_subdistrict'];
        $company_district = $_POST['company_district'];
        $company_province = $_POST['company_province'];
        $company_zip = $_POST['company_zip'];

        // วนลูปเพื่อเพิ่มข้อมูลสำหรับนักศึกษาที่ถูกเลือก
        foreach ($_POST['selected_students'] as $selected) {
            // ทำคำสั่ง SQL เพื่อดึงข้อมูลของนักศึกษาที่เลือก
            $sql_student = "SELECT * FROM petition_document WHERE petition_fname = ?";
            $stmt_student = mysqli_prepare($conn, $sql_student);

            if ($stmt_student) {
                // ผูกค่าตัวแปร
                mysqli_stmt_bind_param($stmt_student, 's', $selected);
                // ประมวลผลคำสั่ง SQL
                mysqli_stmt_execute($stmt_student);
                // รับผลลัพธ์
                $result_student = mysqli_stmt_get_result($stmt_student);
                // ดึงข้อมูลนักศึกษา
                $student_data = mysqli_fetch_assoc($result_student);

                // เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในตาราง std_supervision
                $sql_insert = "INSERT INTO std_supervision (std_fname, std_lname, std_major, std_email, company_name, company_address, company_subdistrict, company_district, company_province, company_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_insert = mysqli_prepare($conn, $sql_insert);

                if ($stmt_insert) {
                    // ผูกค่าตัวแปร
                    mysqli_stmt_bind_param($stmt_insert, 'ssssssssss', $student_data['petition_fname'], $student_data['petition_lname'], $student_data['petition_field_of_study'], $student_data['email'], $company_name, $company_address, $company_subdistrict, $company_district, $company_province, $company_zip);
                    // ประมวลผลคำสั่ง SQL
                    mysqli_stmt_execute($stmt_insert);
                    // echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                // ปิด statement
                mysqli_stmt_close($stmt_insert);
                mysqli_stmt_close($stmt_student);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
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
    $date_supervision = $_POST['date_supervision'];

    // สร้างตัวแปรเพื่อเก็บ email และ major ของอาจารย์ที่ถูกเลือกจาก dropdown
    $supervisor_data = array();
    for ($i = 1; $i <= 6; $i++) {
        $supervisor_name = $_POST['supervisor_' . $i];
        // ตรวจสอบว่าชื่อของอาจารย์ถูกเลือกหรือไม่
        if (!empty($supervisor_name)) {
            // คำสั่ง SQL เพื่อดึง email และ major ของอาจารย์ที่ถูกเลือก
            $sql_email_major = "SELECT email, major FROM login_teacher WHERE name = ?";
            $stmt_email_major = mysqli_prepare($conn, $sql_email_major);
            mysqli_stmt_bind_param($stmt_email_major, "s", $supervisor_name);
            mysqli_stmt_execute($stmt_email_major);
            $result_email_major = mysqli_stmt_get_result($stmt_email_major);
            $row_email_major = mysqli_fetch_assoc($result_email_major);
            $supervisor_email = $row_email_major['email'];
            $supervisor_major = $row_email_major['major'];
            $supervisor_data[] = array("email" => $supervisor_email, "major" => $supervisor_major);
        } else {
            $supervisor_data[] = array("email" => "", "major" => ""); // เพิ่มค่าว่างถ้าไม่มีอาจารย์ถูกเลือก
        }
    }

    // สร้างคำสั่ง SQL สำหรับตาราง add_supervisor
    $sql_insert = "INSERT INTO add_supervisor (
        company_name, 
        company_address, 
        company_subdistrict, 
        company_district,
        company_province,
        company_zip,
        supervisor_1, 
        email_supervisor_1, 
        major_supervisor_1,
        supervisor_2, 
        email_supervisor_2, 
        major_supervisor_2,
        supervisor_3, 
        email_supervisor_3, 
        major_supervisor_3,
        supervisor_4, 
        email_supervisor_4, 
        major_supervisor_4,
        supervisor_5, 
        email_supervisor_5, 
        major_supervisor_5,
        supervisor_6, 
        email_supervisor_6, 
        major_supervisor_6,
        date_supervision
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";

    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    if ($stmt_insert) {
        mysqli_stmt_bind_param($stmt_insert, 'sssssssssssssssssssssssss', 
            $company_name, 
            $company_address, 
            $company_subdistrict, 
            $company_district, 
            $company_province, 
            $company_zip,  
            $_POST['supervisor_1'], 
            $supervisor_data[0]["email"], 
            $supervisor_data[0]["major"],
            $_POST['supervisor_2'], 
            $supervisor_data[1]["email"], 
            $supervisor_data[1]["major"],
            $_POST['supervisor_3'], 
            $supervisor_data[2]["email"], 
            $supervisor_data[2]["major"],
            $_POST['supervisor_4'], 
            $supervisor_data[3]["email"], 
            $supervisor_data[3]["major"],
            $_POST['supervisor_5'], 
            $supervisor_data[4]["email"], 
            $supervisor_data[4]["major"],
            $_POST['supervisor_6'], 
            $supervisor_data[5]["email"], 
            $supervisor_data[5]["major"],
            $date_supervision
        );
        $result_insert = mysqli_stmt_execute($stmt_insert);
        if ($result_insert) {
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "เพิ่มการออกนิเทศสำเร็จ",
                        type: "success"
                    }, function() {
                        window.location = "../supervisor.php "; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
                    });
                }, 1000);
            </script>';
        } else {
            // แสดงข้อผิดพลาดหากการ execute ไม่สำเร็จ
            echo "Error executing statement: " . mysqli_error($conn);
        }
    } else {
        // แสดงข้อผิดพลาดหากการเตรียมคำสั่ง SQL ไม่สำเร็จ
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
}
?>
