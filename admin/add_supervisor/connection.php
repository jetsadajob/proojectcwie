<?php

$db_host = "localhost"; // โฮสต์ของ MySQL
$db_user = "root"; // ชื่อผู้ใช้ของ MySQL
$db_password = ""; // รหัสผ่านของ MySQL
$db_name = "projectcwie"; // ชื่อฐานข้อมูล

   try {
    $conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // รายงานว่าเชื่อมต่อสำเร็จ
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // รายงานข้อผิดพลาดในการเชื่อมต่อ
}

?>