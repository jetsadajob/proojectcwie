<?php
// เชื่อมต่อกับฐานข้อมูล
include './work/dbwork.php';

if (isset($_GET['company_name'])) {
    $selected_company = $_GET['company_name'];

    $sql_students = "SELECT * FROM petition_document WHERE petition_organiztion_name = '$selected_company'";
    $result_students = mysqli_query($conn, $sql_students);

    $studentsData = array();

    if (mysqli_num_rows($result_students) > 0) {
        while ($row = mysqli_fetch_assoc($result_students)) {
            $student = array(
                'petition_fname' => $row['petition_fname'],
                'petition_lname' => $row['petition_lname'],
                'petition_field_of_study' => $row['petition_field_of_study'],
                'email' => $row['email']
            );
            $studentsData[] = $student;
        }
    } else {
        // ถ้าไม่พบนักศึกษาที่ทำงานในบริษัทที่เลือก
        $studentsData['error'] = "ไม่พบนักศึกษาที่ทำงานในบริษัทที่เลือก";
    }
    




    // ส่งข้อมูลนักศึกษากลับในรูปแบบ JSON
    echo json_encode($studentsData);
} else {
    // ถ้าไม่มีชื่อบริษัทที่ส่งมา
    echo json_encode(array('error' => 'Company name is not set'));
}


?>
