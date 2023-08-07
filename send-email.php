<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Konfigurasi email
$to = 'jainuri.it@gmail.com';
$subject = $_POST['subject'];
$message = $_POST['message'];
$fromName = $_POST['name'];
$fromEmail = $_POST['email'];

$mail = new PHPMailer();

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com'; // Ganti dengan alamat SMTP server Anda
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_smtp_username'; // Ganti dengan username SMTP server Anda
    $mail->Password   = 'your_smtp_password'; // Ganti dengan password SMTP server Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Gunakan `PHPMailer::ENCRYPTION_STARTTLS` jika diperlukan
    $mail->Port       = 465; // Ganti dengan port SMTP server Anda, misalnya 587 untuk TLS

    // Recipients
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($to);

    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Email berhasil terkirim.';
} catch (Exception $e) {
    echo "Terjadi kesalahan dalam mengirim email: {$mail->ErrorInfo}";
}
?>