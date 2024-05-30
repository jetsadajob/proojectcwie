<?php
include('../include_sweetalert.php');
include_once '../functions.php';

$usernamecheck = new DB_con();

$username = $_POST['name'];

$username = $_POST['email'];

$sql = $usernamecheck->usernamemeavailable($username);

$num = mysqli_num_rows($sql);
if ($num > 0){
    echo "<span style='color: red'> มีในระบบแล้ว </span>";
    echo "<script>$('submit').prop('disabled','true');</script>";
}else{
    echo "<span style='green: red'> ยังไม่มีชื่อผู้ใช้ </span>";
    echo "<script>$('submit').prop('disabled','false');</script>";

}

?>