<?php
// Artichoke Plum — contact form handler
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: contact.html'); exit; }
if (!empty($_POST['company'])) { header('Location: contact.html?status=sent'); exit; } // honeypot

$name    = trim(strip_tags($_POST['name'] ?? ''));
$email   = trim($_POST['email'] ?? '');
$topic   = trim(strip_tags($_POST['topic'] ?? 'General'));
$message = trim(strip_tags($_POST['message'] ?? ''));

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contact.html?status=error'); exit;
}
$name  = str_replace(["\r", "\n"], ' ', $name);
$topic = str_replace(["\r", "\n"], ' ', $topic);

$to      = 'hello@artichokeplum.com';
$subject = 'Artichoke Plum enquiry: ' . $topic;
$body    = "Name: $name\nEmail: $email\nSubject: $topic\n\n$message\n";
$headers = "From: Artichoke Plum Website <no-reply@artichokeplum.com>\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

$ok = @mail($to, $subject, $body, $headers);
header('Location: contact.html?status=' . ($ok ? 'sent' : 'error'));
exit;
