<?php
include '../include_sweetalert.php';
include '../work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set('Asia/Bangkok');

    $id = $_POST['id'];

    // ดึงข้อมูลเดิมจากฐานข้อมูล
    $sql = "SELECT img, file FROM news WHERE a_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($currentImg, $currentFile);
    $stmt->fetch();
    $stmt->close();


    // ตั้งค่าเริ่มต้นเป็นข้อมูลจากฐานข้อมูล
    $title = $_POST['title'];
    $txtMessage = $_POST['txtMessage'];
    $img = $currentImg; // ใช้ค่าเดิมจากฐานข้อมูล
    $file = $currentFile; // ใช้ค่าเดิมจากฐานข้อมูล


    // หากมีการอัปโหลดรูปภาพใหม่
    if (isset($_FILES['img']) && $_FILES['img']['name'] != "") {
        $numrand = mt_rand();
        $date1 = date("Ymd_His");
        $path = "uploads/";
        $type = strrchr($_FILES['img']['name'], ".");
        $img = $numrand . $date1 . $type;
        $path_copy = $path . $img;

        if (!move_uploaded_file($_FILES['img']['tmp_name'], $path_copy)) {
            echo "<script>alert('ไม่สามารถอัพโหลดไฟล์รูปภาพได้!.');</script>";
            exit;
        }
    } else {
        // ใช้ชื่อไฟล์เดิมหากไม่มีการอัปโหลดใหม่
        $img = $currentImg; // ใช้ชื่อไฟล์เดิมหรือค่าว่างหากไม่มีการกำหนด
    }


    if (isset($_FILES['file']) && $_FILES['file']['name'] != "") {
        $numrand = mt_rand();
        $date1 = date("Ymd_His");
        $path = "uploads/";
        $type = strrchr($_FILES['file']['name'], ".");
        $file = $numrand . $date1 . $type;
        $path_copy = $path . $file;

        if (!move_uploaded_file($_FILES['file']['tmp_name'], $path_copy)) {
            echo "<script>alert('ไม่สามารถอัพโหลดไฟล์รูปภาพได้!.');</script>";
            exit;
        }
    } else {
        // ใช้ชื่อไฟล์เดิมหากไม่มีการอัปโหลดใหม่
        $file = $currentFile; // ใช้ชื่อไฟล์เดิมหรือค่าว่างหากไม่มีการกำหนด
    }


    

    // คำสั่ง SQL สำหรับการอัปเดตข้อมูล
    $sql = "UPDATE news SET title = ?, txtMessage = ?, img = ?, file = ? WHERE a_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $txtMessage, $img, $file, $id);


    if ($stmt->execute()) {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "อัปเดตข่าวสำเร็จ",
                type: "success"
            }, function() {
                window.location = "../tablenews.php"; // ส่งกลับไปยังหน้า detilcoop.php พร้อมกับ id
            });
        }, 1000);
    </script>';
    
        // header("Location: detilcoop.php?id=$email"); // ส่งกลับไปยังหน้า detilinterns.php พร้อมกับ id
        exit;
        // echo "<script>alert('เพิ่มข่าวเรียบร้อย'); window.location='../tablenews.php';</script>";
        // echo "<script>alert('อัปเดตข่าวเรียบร้อย'); window.location='../tablenews.php';</script>";
    } else {
        echo '<script>
        setTimeout(function() {
            swal({
                title: "ไม่สามารถอัปเดตข่าวได้
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
