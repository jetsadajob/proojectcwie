<?php
include '../include_sweetalert.php';
include 'dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['recruitment_id'])) {
        $recruitment_id = mysqli_real_escape_string($conn, $_POST['recruitment_id']);
    } else {
        echo "ไม่พบค่า recruitment_id";
        exit;
    }

    $sql = "SELECT * FROM job_recruitment WHERE recruitment_id = '$recruitment_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "ไม่พบข้อมูลที่ต้องการอัปเดต";
        exit;
    }

    $target_dir = "./uploads/";

    function uploadFile($fileField, $oldFile, $targetDir) {
        if (isset($_FILES[$fileField]) && $_FILES[$fileField]['error'] == UPLOAD_ERR_OK) {
            if (!empty($oldFile) && file_exists($targetDir . $oldFile)) {
                unlink($targetDir . $oldFile); // ลบไฟล์เดิม
            }
            $fileName = time() . '_' . basename($_FILES[$fileField]["name"]);
            $targetFilePath = $targetDir . $fileName;
            if (move_uploaded_file($_FILES[$fileField]["tmp_name"], $targetFilePath)) {
                return $fileName;
            }
        }
        return $oldFile; // ไม่เปลี่ยนแปลงหากไม่มีการอัพโหลดใหม่
    }

    $imageFileName = uploadFile('recruitment_company_image', $row['recruitment_company_image'], $target_dir);
    $fileFileName = uploadFile('recruitment_company_file', $row['recruitment_company_file'], $target_dir);

    // ปรับปรุงคำสั่ง SQL ให้รวมข้อมูลใหม่
    $sqlUpdate = "UPDATE job_recruitment SET
            recruitment_company_image = '$imageFileName', 
            recruitment_company_file = '$fileFileName',
            recruitment_type_company = '" . mysqli_real_escape_string($conn, $_POST['recruitment_type_company']) . "', 
            recruitment_company_name = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_name']) . "', 
            recruitment_company_address = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_address']) . "', 
            recruitment_company_phone = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_phone']) . "', 
            recruitment_company_email = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_email']) . "', 
            recruitment_company_detail = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_detail']) . "', 
            recruitment_company_form_of_work = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_form_of_work']) . "', 
            recruitment_company_role = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_role']) . "', 
            recruitment_company_amout = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_amout']) . "', 
            recruitment_company_salary = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_salary']) . "', 
            recruitment_company_experienc = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_experienc']) . "', 
            recruitment_company_gender = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_gender']) . "', 
            recruitment_company_education = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_education']) . "', 
            recruitment_company_location = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_location']) . "', 
            recruitment_company_detailjob = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_detailjob']) . "', 
            recruitment_company_subdistrict = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_subdistrict']) . "', 
            recruitment_company_district = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_district']) . "', 
            recruitment_company_province = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_province']) . "', 
            recruitment_company_typejob = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_typejob']) . "', 
            recruitment_company_zip = '" . mysqli_real_escape_string($conn, $_POST['recruitment_company_zip']) . "' 
        WHERE recruitment_id = '$recruitment_id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "อัพเดทประกาศงานสำเร็จ",
                type: "success"
            }, function() {
                window.location = "../hr.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
    exit;

    } else {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาดไม่สามารถเพิ่มข่าวได้
            }, function() {
                window.location = "../hr.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
    }

    mysqli_close($conn);
}
?>
