<?php 
    session_start();
    header("location: login_student.php");
    session_destroy();
?>