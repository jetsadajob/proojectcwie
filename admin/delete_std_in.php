<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
   
    
    <?php
    include './work/dbwork.php';

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        // Assuming that 'email' is a unique identifier
        $email = $_GET['id'];

        // SQL query to delete a student
        $sql = "DELETE login_student, company_detail, internship_book, internship_certificate, internship_time, student_history
    FROM login_student
    LEFT JOIN company_detail ON login_student.email = company_detail.email
    LEFT JOIN internship_book ON login_student.email = internship_book.email
    LEFT JOIN internship_certificate ON login_student.email = internship_certificate.email
    LEFT JOIN internship_time ON login_student.email = internship_time.email
    LEFT JOIN student_history ON login_student.email = student_history.email
    WHERE login_student.email = '$email'";


        if (mysqli_query($conn, $sql)) {
            echo "<script> window.location.href = './submitinternship.php'; </script>";
        } else {
            echo "Error deleting student: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid or missing 'id' parameter.";
    }

    mysqli_close($conn);
    ?>
