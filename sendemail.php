<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Replace with your Titan email address
    $to = "your-email@rbconstructionservices.com.au";

    // Sanitize and get form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare email
    $full_subject = "Contact Form: " . $subject;
    $body = "You have received a new message from your website contact form.\n\n"
          . "Name: $name\n"
          . "Email: $email\n"
          . "Subject: $subject\n\n"
          . "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $full_subject, $body, $headers)) {
        echo "Your message has been sent. Thank you!";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    echo "Invalid request.";
}
?>
