<?php
include_once 'dbConfig.php';

if (isset($_POST['importSubmit'])) {
    $csvMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the header as we do not need it
            fgetcsv($csvFile);

            // Import data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                // Check if all necessary columns are set in the CSV data
                if (isset($line[0], $line[1], $line[2], $line[3], $line[4], $line[5])) {
                    $id = $line[0];
                    $std_id = $line[1];
                    $name = $line[2];
                    $status = $line[3];
                    $advisor = $line[4];
                    $major = $line[5]; // Major field from CSV

                    // Check if the student data already exists in the database
                    $prevQuery = "SELECT id FROM import_member WHERE std_id = ?";
                    $stmt = $db->prepare($prevQuery);
                    $stmt->bind_param("s", $std_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // If data already exists, update it
                        $updateQuery = "UPDATE import_member SET name = ?, advisor = ?, status = ?, major = ?, modified = NOW() WHERE std_id = ?";
                        $updateStmt = $db->prepare($updateQuery);
                        $updateStmt->bind_param("sssss", $name, $advisor, $status, $major, $std_id);
                        $updateStmt->execute();
                    } else {
                        // If data doesn't exist, insert a new record
                        $insertQuery = "INSERT INTO import_member (std_id, name, advisor, status, major, created, modified) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
                        $insertStmt = $db->prepare($insertQuery);
                        $insertStmt->bind_param("sssss", $std_id, $name, $advisor, $status, $major);
                        $insertStmt->execute();
                    }
                }
            }

            fclose($csvFile);
            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else {
        $qstring = '?status=invalid_file';
    }
    header("Location: ../importinfor.php" . $qstring);
}
?>