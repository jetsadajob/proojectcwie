<?php
// เชื่อมต่อกับฐานข้อมูล
include 'connection.php';

// คำสั่ง SQL เพื่อดึงข้อมูลจำนวนนักศึกษาที่อาจารย์ที่ปรึกษาดูแล
$query = "
    SELECT
        login_teacher.teacher_fname,
        login_teacher.teacher_lname,
        COUNT(login_student.student_id) AS student_count
    FROM
        login_teacher
    LEFT JOIN
        login_student ON login_teacher.teacher_fname = login_student.name
        AND login_teacher.teacher_email = login_student.email
    GROUP BY
        login_teacher.teacher_fname,
        login_teacher.teacher_lname;
";

$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// ส่งข้อมูลในรูปแบบ JSON กลับไปยัง JavaScript
echo json_encode($data);

// ปิดการเชื่อมต่อกับฐานข้อมูล
mysqli_close($conn);
