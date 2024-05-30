<?php
include 'dbwork.php';
include '../include_sweetalert.php';

$id = $_GET['id']; 

// สร้างคำสั่ง SQL สำหรับการเลือกข้อมูลรูปภาพและไฟล์จากตาราง news โดยใช้ id เป็นเงื่อนไข
$query = "SELECT img, file FROM news WHERE a_id='$id'";
// ทำการ execute คำสั่ง SQL
$result = mysqli_query($conn, $query);

// ตรวจสอบว่ามีข้อมูลที่ค้นหาพบหรือไม่
if (mysqli_num_rows($result) > 0) {
    // ดึงข้อมูลแถวเดียวจากผลลัพธ์ที่ได้
    $row = mysqli_fetch_assoc($result);

    // ตรวจสอบว่ามีไฟล์ที่ต้องการลบหรือไม่
    if ($row['img'] != '' && $row['file'] != '') {
        // กำหนดเส้นทางไฟล์รูปภาพและไฟล์เอกสาร
        $img_path = './uploads/' . $row['img'];
        $file_path = './uploads/' . $row['file'];

        // ตรวจสอบว่าไฟล์รูปภาพมีอยู่หรือไม่ และทำการลบ
        if (file_exists($img_path) && is_writable($img_path)) {
            unlink($img_path);
        }

        // ตรวจสอบว่าไฟล์เอกสารมีอยู่หรือไม่ และทำการลบ
        if (file_exists($file_path) && is_writable($file_path)) {
            unlink($file_path);
        }
    } elseif ($row['img'] != '') {
        // ถ้ามีเฉพาะไฟล์รูปภาพและไม่มีไฟล์เอกสาร
        $img_path = './uploads/' . $row['img'];
        
        if (file_exists($img_path) && is_writable($img_path)) {
            unlink($img_path);
        }
    } elseif ($row['file'] != '') {
        // ถ้ามีเฉพาะไฟล์เอกสารและไม่มีไฟล์รูปภาพ
        $file_path = './uploads/' . $row['file'];
        
        if (file_exists($file_path) && is_writable($file_path)) {
            unlink($file_path);
        }
    }
}

// สร้างคำสั่ง SQL สำหรับลบข้อมูลจากตาราง news โดยใช้ id เป็นเงื่อนไข
$sql = "DELETE FROM news WHERE a_id='$id'";
// ทำการ execute คำสั่ง SQL
if (mysqli_query($conn, $sql)) {
    // ปิดการเชื่อมต่อกับฐานข้อมูล
    mysqli_close($conn);
    echo '<script>
    setTimeout(function() {
        swal({
            title: "ลบข่าวสำเร็จ",
            type: "success"
        }, function() {
            window.location = "../tablenews.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
        });
    }, 1000);
</script>';
exit;
} else {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "เกิดข้อผิดพลาดไม่สามารถลบเพิ่มข่าวได้
        }, function() {
            window.location = "../tablenews.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
        });
    }, 1000);
</script>';
}
?>
