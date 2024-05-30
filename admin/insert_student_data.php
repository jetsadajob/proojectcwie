<?php
include '../work/dbwork.php';

$data = json_decode(file_get_contents("php://input"));

$selectedStudents = $data->selected_students;
$companyName = $data->company_name;
$companyAddress = $data->company_address;
$companySubdistrict = $data->company_subdistrict;
$companyDistrict = $data->company_district;
$companyProvince = $data->company_province;
$companyZip = $data->company_zip;

foreach ($selectedStudents as $selected) {
    $sql_insert = "INSERT INTO std_supervision (std_fname, std_lname, std_major, std_email, company_name, company_address, company_subdistrict, company_district, company_province, company_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    if ($stmt_insert) {
        mysqli_stmt_bind_param($stmt_insert, 'ssssssssss', $selected->petition_fname, $selected->petition_lname, $selected->petition_field_of_study, $selected->email, $companyName, $companyAddress, $companySubdistrict, $companyDistrict, $companyProvince, $companyZip);
        mysqli_stmt_execute($stmt_insert);
        mysqli_stmt_close($stmt_insert);
    } else {
        $response = array("error" => "Error preparing statement: " . mysqli_error($conn));
        echo json_encode($response);
        exit;
    }
}

mysqli_close($conn);

$response = array("success" => "Data inserted successfully");
echo json_encode($response);
?>
