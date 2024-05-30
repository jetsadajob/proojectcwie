<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
</head>
<body>
    <h2>Send Email</h2>
    <form action="send.php" method="post">
        <label for="recipient_email">Recipient Email:</label><br>
        <input type="email" id="recipient_email" name="recipient_email" required><br><br>

        <label for="sender_name">Your Name:</label><br>
        <input type="text" id="sender_name" name="sender_name" required><br><br>

        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>

        <input type="submit" value="Send Email">
    </form>
</body>
</html>
