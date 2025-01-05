<?php
// Sanitize and validate inputs
$name = htmlspecialchars(trim($_POST['name']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($_POST['phone']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));

// Validate email address format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // If email is not valid, show an error message
    die("Invalid email format.");
}

// Construct the email message
$email_message = "
Name: $name
Email: $email
Phone: $phone
Subject: $subject
Message: $message
";


$to = "isbbydior@gmail.com"; 
$subject = "New Message from Contact Form";

// Send the email and check if it was successful
if (mail($to, $subject, $email_message)) {
    // Redirect to success page
    header("Location: ../mail-success.html");
    exit; // Make sure to call exit after header redirection
} else {
    // Handle mail sending failure
    echo "Error sending email. Please try again later.";
}
?>
