<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    if (empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($subject) OR empty($message)) {
        // Handle error here
        echo "Please fill all fields correctly.";
        exit;
    }

    $recipient = "akshay.atam@gmail.com"; // Replace with your email
    $headers = "From: $name <$email>";

    if (mail($recipient, $subject, $message, $headers)) {
        echo "Thank You! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, we couldn't send your message.";
    }
} else {
    // Not a POST request, handle accordingly
    echo "Invalid request";
}
?>
