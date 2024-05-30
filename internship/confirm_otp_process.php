<?php
include('server.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txt_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $user_otp = $_POST['otp'];

    // Check OTP
    $stmt = $conn->prepare("SELECT * FROM user_otp WHERE email = ? AND otp = ?");
    $stmt->bind_param("ss", $txt_email, $user_otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if role is not null
        if ($user['role'] != null) {
            // Move data from temporary table to main table
            $sql = "INSERT INTO login_student (role, std_prefix, std_fname, std_lname, std_id, year_of_study, major, std_project, email, password, otp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssss", $user['role'], $user['std_prefix'], $user['std_fname'], $user['std_lname'], $user['std_id'], $user['year_of_study'], $user['major'], $user['std_project'], $txt_email, $user['password'], $otp);

            // Insert email into other databases based on user role
            if ($user['role'] == "internship_student") {
                $insert_email_stmt = $conn->prepare("INSERT INTO internship_book (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO company_detail (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO internship_certificate (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO internship_parental_consent_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO internship_time (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO student_history (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();
                
            } elseif ($user['role'] == "cooperative_student") {
                $insert_email_stmt = $conn->prepare("INSERT INTO petition_document (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO coop_application_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO coopperative_parental_consent_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO coopperative_education_report_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO student_acceptance_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO job_description_accommodation (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO cooperative_report_outline (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO supervision_recording(email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO supervision_recording_teacher(email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO report_evaluation_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();

                $insert_email_stmt = $conn->prepare("INSERT INTO performance_appraisal_form (email) VALUES (?)");
                $insert_email_stmt->bind_param("s", $txt_email);
                $insert_email_stmt->execute();
            }



            if ($stmt->execute()) {
                // Delete data from temporary table
                $stmt = $conn->prepare("DELETE FROM user_otp WHERE email = ?");
                $stmt->bind_param("s", $txt_email);
                $stmt->execute();


                header("Location: login_student.php?verified=true");
                exit;
            } else {
                echo "Error moving data: " . $conn->error;
            }
        } else {
            echo "Role cannot be null";
        }
    } else {
        echo "Invalid OTP";
        echo $txt_email, $otp;
    }
} else {
    // If no POST data received, display OTP confirmation form or notification message here
}
