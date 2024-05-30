<?php
include './work/dbwork.php';

$year = $_GET['year'];

if ($year === "ทั้งหมด" || $year === "all") {
    $sql = "SELECT teacher.name AS advisor_name, COUNT(student.id) AS student_count
            FROM login_teacher AS teacher
            LEFT JOIN login_student AS student ON teacher.email = student.teacher_email
            WHERE teacher.role = 'advisor'
            GROUP BY teacher.name";
} else {
    $sql = "SELECT teacher.name AS advisor_name, COUNT(student.id) AS student_count
            FROM login_teacher AS teacher
            LEFT JOIN login_student AS student ON teacher.email = student.teacher_email
            WHERE teacher.role = 'advisor' AND YEAR(student.created_at) = '$year'
            GROUP BY teacher.name";
}

$result = $conn->query($sql);

$advisor_data = [];

// ตรวจสอบว่ามีข้อมูลที่ส่งกลับมาหรือไม่
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $advisor_data[] = array($row['advisor_name'], intval($row['student_count']));
    }
} else {
    // ถ้าไม่มีข้อมูลในปีที่เลือก
    $advisor_data = [];
}

echo json_encode($advisor_data);
?>
