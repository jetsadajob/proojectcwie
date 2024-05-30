<?php 

$db_host = "localhost"; // โฮสต์ของ MySQL
$db_user = "root"; // ชื่อผู้ใช้ของ MySQL
$db_password = ""; // รหัสผ่านของ MySQL
$db_name = "projectcwie"; // ชื่อฐานข้อมูล


    try {
        $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        $e->getMessage();
    }

?>