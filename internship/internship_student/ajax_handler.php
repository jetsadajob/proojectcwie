<?php
include('../server.php');

if (isset($_POST['function'])) {
    switch ($_POST['function']) {
        case 'provinces':
            $id = $_POST['id'];
            $sql = "SELECT * FROM amphures WHERE province_id='$id'";
            $query = mysqli_query($conn, $sql);
            $options ='<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $options .= '<option value="'.$row['id'].'">'.$row['name_th'].'</option>';
            }
            echo $options;
            break;
        case 'amphures':
            $id = $_POST['id'];
            $sql = "SELECT * FROM districts WHERE amphure_id='$id'";
            $query = mysqli_query($conn, $sql);
            $options ='<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
            
            while ($row = mysqli_fetch_assoc($query)) {
                $options .= '<option value="'.$row['id'].'">'.$row['name_th'].'</option>';
            }
            echo $options;
            break;
        case 'districts':
            $id = $_POST['id'];
            $sql = "SELECT * FROM districts WHERE id='$id'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            if ($result) {
                echo $result['zip_code'];
            }
            break;
    }
    exit();
}
?>
