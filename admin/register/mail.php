<?php
$receiver = "jetsadajob.123@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "From:cwie.intern.cpkku@gmail.com";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>