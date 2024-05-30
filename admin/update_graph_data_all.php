<?php
// Include database connection file
include './work/dbwork.php';

// SQL query to retrieve all data
$sql_all_data = "SELECT major, role, COUNT(*) AS count FROM login_student GROUP BY major, role";
$result_all_data = $conn->query($sql_all_data);

// Initialize an empty array to store data
$allData = array();

// Check if there are results
if ($result_all_data->num_rows > 0) {
    // Fetch data and add it to the array
    while ($row = $result_all_data->fetch_assoc()) {
        $allData[] = $row;
    }
}

// Send the data back as JSON
echo json_encode($allData);
?>
