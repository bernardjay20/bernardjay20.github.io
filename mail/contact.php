<?php
if (empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit();
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

$to = "bernzkie080820@gmail.com"; // Change this email to your desired email address
$subject = "$subject: $name";
$body = "You have received a new message from your website contact form.\n\n";
$body .= "Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage: $message";
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $body, $headers)) {
    http_response_code(200);
} else {
    http_response_code(500);
}
?>
