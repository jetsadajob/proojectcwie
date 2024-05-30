<?php
include './work/dbwork.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['companyName'])) {
    $companyName = mysqli_real_escape_string($conn, $_GET['companyName']);

    $sql_students = "SELECT * FROM petition_document WHERE petition_organiztion_name = '$companyName'";
    $result_students = mysqli_query($conn, $sql_students);

    if ($result_students) {
        while ($row = mysqli_fetch_array($result_students)) {
            if (!empty($row["petition_lname"]) && !empty($row["petition_field_of_study"]) && !empty($row["email"])) {
                echo "<tr>";
                echo "<td><input type='checkbox' class='checkItem' name='selected_students[]' value='" . $row["petition_fname"] . "'></td>";
                echo "<td name='std_fname'>" . $row["petition_fname"] . "</td>";
                echo "<td name='std_lname'>" . $row["petition_lname"] . "</td>";
                echo "<td name='std_major'>" . $row["petition_field_of_study"] . "</td>";
                echo "<td name='std_email'>" . $row["email"] . "</td>";
                echo "<td>" . $row["petition_organiztion_name"] . "</td>";
                echo "</tr>";
            }
        }
    } else {
        // แสดงข้อความหากมีข้อผิดพลาดในการดึงข้อมูล
        echo "Error: " . mysqli_error($conn);
    }
}
?>
