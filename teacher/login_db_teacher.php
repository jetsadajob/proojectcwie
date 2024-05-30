<?php
    require_once 'connection.php';

    session_start();

    if(isset($_POST['btn_login'])) {
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];
        $role = $_POST['txt_role'];

        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        }else if (empty($password)){
            $errorMsg[] = "Please enter password";
        }else if (empty($role)){
            $errorMsg[] = "Please select role";
        }else if ($email AND $password AND $role){
            try{
                $select_stmt = $db->prepare("SELECT email, password, role FROM login_teacher WHERE email = :uemail AND password = :upassword AND role = :urole");
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->bindParam(":urole", $role);
                $select_stmt->execute();

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $dbrole = $row['role'];
                }
                if ($email != null AND $password != null AND $role != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($email == $dbemail AND $password == $dbpassword AND $role == $dbrole) {
                            switch($dbrole){
                                case 'admin':
                                    $_SESSION['admin_login'] = $email;
                                    $_SESSION['success'] = "Admin...Successfully Login....";
                                    header("location: admin/admin_home.php");
                                    break;
                                case 'cooperative_student':
                                    $_SESSION['cooperative_student_login'] = $email;
                                    $_SESSION['success'] = "Cooperative Student...Successfully Login....";
                                    header("location: cooperative_student/cooperative_student_home.php");
                                    break;
                                case 'internship_student':
                                    $_SESSION['internship_student_login'] = $email;
                                    $_SESSION['success'] = "Internship Student...Successfully Login....";
                                    header("location: internship_student/internship_student_home.php");
                                break;
                                case 'supervision_teacher':
                                    $_SESSION['supervision_teacher_login'] = $email;
                                    $_SESSION['success'] = "Supervision Teacher...Successfully Login....";
                                    header("location: supervision_teacher/supervision_teacher_home.php");
                                break;
                                case 'advisor':
                                    $_SESSION['advisor_login'] = $email;
                                    $_SESSION['success'] = "Advisor...Successfully Login....";
                                    header("location: ./advisor/advisor_home.php");
                                break;
                                case 'course_instructor':
                                    $_SESSION['course_instructor_login'] = $email;
                                    $_SESSION['success'] = "Course_instructor...Successfully Login....";
                                    header("location: ./course_instructor/course_instructor_home.php");
                                break;
                                case 'hr':
                                    $_SESSION['hr_login'] = $email;
                                    $_SESSION['success'] = "HR...Successfully Login....";
                                    header("location: hr/hr_home.php");
                                break;
                                case 'staff':
                                    $_SESSION['staff_login'] = $email;
                                    $_SESSION['success'] = "Staff...Successfully Login....";
                                    header("location: staff/staff_home.php");
                                break;
                                default:
                                    $_SESSION['error'] = "Wrong email or password or role";
                                    header("location: login_teacher.php");
                            }
                        }
                    } else {
                        $_SESSION['error'] = "Wrong email or password or role";
                            header("location: login_teacher.php");

                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>