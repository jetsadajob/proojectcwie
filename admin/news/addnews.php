<?php
include '../include_sweetalert.php';
include 'dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set('Asia/Bangkok');

    $title = $_POST['title'];
    $txtMessage = $_POST['txtMessage'];
    $imgName = $imgName = ''; 
    $fileName = $fileName = ''; // กำหนดค่าเริ่มต้นเป็นสตริงว่าง

    // การอัปโหลดรูปภาพ
    if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
        $numrand = mt_rand();
        $date1 = date("Ymd_His");
        $path = "uploads/";
        $type = strrchr($_FILES['img']['name'], ".");
        $imgName = $numrand . $date1 . $type; // แก้ไขตรงนี้
        $path_copy = $path . $imgName;

        if (!move_uploaded_file($_FILES['img']['tmp_name'], $path_copy)) {
            echo "<script>alert('ไม่สามารถอัพโหลดไฟล์รูปภาพได้!.');</script>";
            exit;
        }
    }

// การอัปโหลดไฟล์อื่นๆ
if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
    $numrand = mt_rand();
    $date1 = date("Ymd_His");
    $path = "uploads/";
    $type = strrchr($_FILES['file']['name'], ".");
    $fileName = $numrand . $date1 . $type;
    $path_copy = $path . $fileName;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $path_copy)) {
        echo "<script>alert('ไม่สามารถอัพโหลดไฟล์ได้!.');</script>";
        exit;
    }
}

$sql = "INSERT INTO news (title, txtMessage, file, img) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $title, $txtMessage, $fileName, $imgName);

if ($stmt->execute()) {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "เพิ่มข่าวสำเร็จ",
            type: "success"
        }, function() {
            window.location = "../tablenews.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
        });
    }, 1000);
</script>';

    // header("Location: detilcoop.php?id=$email"); // ส่งกลับไปยังหน้า detilinterns.php พร้อมกับ id
    exit;
    // echo "<script>alert('เพิ่มข่าวเรียบร้อย'); window.location='../tablenews.php';</script>";
} else {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "เกิดข้อผิดพลาดไม่สามารถเพิ่มข่าวได้
        }, function() {
            window.location = "../tablenews.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
        });
    }, 1000);
</script>';
    // echo "<script>alert('ไม่สามารถอัปเดตข่าวได้: " . $conn->error . "'); window.location='../tablenews.php';</script>";
}

$stmt->close();
$conn->close();
}
?>

