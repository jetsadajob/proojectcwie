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
                $sql_update = "UPDATE std_supervision SET 
                                    std_fname = ?, 
                                    std_lname = ?, 
                                    std_major = ?, 
                                    std_email = ?, 
                                    company_name = ?, 
                                    company_address = ?, 
                                    company_subdistrict = ?, 
                                    company_district = ?, 
                                    company_province = ?, 
                                    company_zip = ? 
                                WHERE 
                                    std_id = ?";

                $stmt_update = mysqli_prepare($conn, $sql_update);

                if ($stmt_update) {
                    // ผูกค่าตัวแปร
                    mysqli_stmt_bind_param($stmt_update, 'ssssssssssi', 
                        $student_data['petition_fname'], 
                        $student_data['petition_lname'], 
                        $student_data['petition_field_of_study'], 
                        $student_data['email'], 
                        $company_name, 
                        $company_address, 
                        $company_subdistrict, 
                        $company_district, 
                        $company_province, 
                        $company_zip,
                        $student_data['std_id']
                    );
                    // ประมวลผลคำสั่ง SQL
                    mysqli_stmt_execute($stmt_update);
                    // echo "อัปเดตข้อมูลเรียบร้อยแล้ว";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                // ปิด statement
                mysqli_stmt_close($stmt_update);
                mysqli_stmt_close($stmt_student);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        // echo "กรุณาเลือกข้อมูลที่ต้องการเพิ่ม";
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

    // สร้างคำสั่ง SQL สำหรับตรวจสอบการอัปเดต
    $sql_check = "SELECT * FROM add_supervisor WHERE company_name = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $company_name);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if(mysqli_num_rows($result_check) > 0) {
        // มีข้อมูลในฐานข้อมูล จึงต้องทำการอัปเดต
        // ตรวจสอบว่ามีการเปลี่ยนแปลงข้อมูลหรือไม่
        $row_check = mysqli_fetch_assoc($result_check);
        if ($row_check['company_address'] != $company_address || 
            $row_check['company_subdistrict'] != $company_subdistrict || 
            $row_check['company_district'] != $company_district || 
            $row_check['company_province'] != $company_province || 
            $row_check['company_zip'] != $company_zip || 
            $row_check['supervisor_1'] != $_POST['supervisor_1'] || 
            $row_check['email_supervisor_1'] != $supervisor_data[0]["email"] || 
            $row_check['major_supervisor_1'] != $supervisor_data[0]["major"] || 
            $row_check['supervisor_2'] != $_POST['supervisor_2'] || 
            $row_check['email_supervisor_2'] != $supervisor_data[1]["email"] || 
            $row_check['major_supervisor_2'] != $supervisor_data[1]["major"] || 
            $row_check['supervisor_3'] != $_POST['supervisor_3'] || 
            $row_check['email_supervisor_3'] != $supervisor_data[2]["email"] || 
            $row_check['major_supervisor_3'] != $supervisor_data[2]["major"] || 
            $row_check['supervisor_4'] != $_POST['supervisor_4'] || 
            $row_check['email_supervisor_4'] != $supervisor_data[3]["email"] || 
            $row_check['major_supervisor_4'] != $supervisor_data[3]["major"] || 
            $row_check['supervisor_5'] != $_POST['supervisor_5'] || 
            $row_check['email_supervisor_5'] != $supervisor_data[4]["email"] || 
            $row_check['major_supervisor_5'] != $supervisor_data[4]["major"] || 
            $row_check['supervisor_6'] != $_POST['supervisor_6'] || 
            $row_check['email_supervisor_6'] != $supervisor_data[5]["email"] || 
            $row_check['major_supervisor_6'] != $supervisor_data[5]["major"] || 
            $row_check['date_supervision'] != $date_supervision) {
                // มีการเปลี่ยนแปลงข้อมูล จึงทำการอัปเดต
                // สร้างคำสั่ง SQL สำหรับอัปเดตข้อมูล
                $sql_update = "UPDATE add_supervisor SET 
                    company_address = ?, 
                    company_subdistrict = ?, 
                    company_district = ?, 
                    company_province = ?, 
                    company_zip = ?, 
                    supervisor_1 = ?, 
                    email_supervisor_1 = ?, 
                    major_supervisor_1 = ?, 
                    supervisor_2 = ?, 
                    email_supervisor_2 = ?, 
                    major_supervisor_2 = ?, 
                    supervisor_3 = ?, 
                    email_supervisor_3 = ?, 
                    major_supervisor_3 = ?, 
                    supervisor_4 = ?, 
                    email_supervisor_4 = ?, 
                    major_supervisor_4 = ?, 
                    supervisor_5 = ?, 
                    email_supervisor_5 = ?, 
                    major_supervisor_5 = ?, 
                    supervisor_6 = ?, 
                    email_supervisor_6 = ?, 
                    major_supervisor_6 = ?, 
                    date_supervision = ? 
                WHERE 
                    company_name = ?";

                $stmt_update = mysqli_prepare($conn, $sql_update);
                if ($stmt_update) {
                    mysqli_stmt_bind_param($stmt_update, 'sssssssssssssssssssssssss', 
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
                        $date_supervision, 
                        $company_name
                    );
                    $result_update = mysqli_stmt_execute($stmt_update);
                    if ($result_update) {
                        echo '<script>
                            setTimeout(function() {
                                swal({
                                    title: "อัปเดตข้อมูลสำเร็จ",
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
        } else {
            // ไม่มีการเปลี่ยนแปลงข้อมูล ไม่ต้องทำการอัปเดต
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "ไม่มีการเปลี่ยนแปลงข้อมูล",
                        type: "warning"
                    }, function() {
                        window.location = "../supervisor.php "; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
                    });
                }, 1000);
            </script>';
        }
    } else {
        // ไม่มีข้อมูลในฐานข้อมูล จึงต้องทำการเพิ่มข้อมูลใหม่
        // นำโค้ดการเพิ่มข้อมูลมาวางที่นี่
    }

    // ปิด statement
    mysqli_stmt_close($stmt_check);
}

?>
