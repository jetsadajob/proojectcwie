<?php 

    session_start();
    header("location: login_teacher.php");
    session_destroy();

?>