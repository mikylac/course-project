<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    $to = "mikyla.cunanan3@gmail.com; // Replace with your email address
    $subject = "New Contact Form Submission from $name";
    $body = "You have received a new message from your website contact form.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Message: $message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank-you.html"); // Redirect to thank-you page
        exit;
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>

