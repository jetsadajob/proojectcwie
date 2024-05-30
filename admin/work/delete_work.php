<?php
include '../include_sweetalert.php';
include 'dbwork.php';

$id = $_GET['id']; 

// สร้างคำสั่ง SQL สำหรับการเลือกข้อมูลรูปภาพและไฟล์จากตาราง job_recruitment โดยใช้ id เป็นเงื่อนไข
$query = "SELECT recruitment_company_image, recruitment_company_file FROM job_recruitment WHERE recruitment_id='$id'";
// ทำการ execute คำสั่ง SQL
$result = mysqli_query($conn, $query);

// ตรวจสอบว่ามีข้อมูลที่ค้นหาพบหรือไม่
if (mysqli_num_rows($result) > 0) {
    // ดึงข้อมูลแถวเดียวจากผลลัพธ์ที่ได้
    $row = mysqli_fetch_assoc($result);

    // ตรวจสอบว่ามีไฟล์ที่ต้องการลบหรือไม่
    if ($row['recruitment_company_image'] != '' || $row['recruitment_company_file'] != '') {
        // กำหนดเส้นทางไฟล์รูปภาพและไฟล์เอกสาร
        $img_path = './uploads/' . $row['recruitment_company_image'];
        $file_path = './uploads/' . $row['recruitment_company_file'];

        // ตรวจสอบว่าไฟล์รูปภาพมีอยู่หรือไม่ และทำการลบ
        if ($row['recruitment_company_image'] != '' && file_exists($img_path) && is_writable($img_path)) {
            unlink($img_path);
        }

        // ตรวจสอบว่าไฟล์เอกสารมีอยู่หรือไม่ และทำการลบ
        if ($row['recruitment_company_file'] != '' && file_exists($file_path) && is_writable($file_path)) {
            unlink($file_path);
        }
    }
}

// สร้างคำสั่ง SQL สำหรับลบข้อมูลจากตาราง job_recruitment โดยใช้ id เป็นเงื่อนไข
$sql = "DELETE FROM job_recruitment WHERE recruitment_id='$id'";
// ทำการ execute คำสั่ง SQL
if (mysqli_query($conn, $sql)) {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "ลบประกาศงานสำเร็จ",
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
?>
