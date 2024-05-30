<?php
include './work/dbwork.php';

$year = $_GET['year'];

if($year === "ทั้งหมด" || $year === "all") {
    $sql = "SELECT role, COUNT(*) AS count FROM login_teacher GROUP BY role";
} else {
    $sql = "SELECT role, COUNT(*) AS count FROM login_teacher WHERE YEAR(created_at) = '$year' GROUP BY role";
}

$result = $conn->query($sql);

$graphData1 = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $graphData1[] = $row;
    }
}

echo json_encode($graphData1);
?>
