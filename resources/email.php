<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once dirname(__DIR__).'/vendor/autoload.php';

$Receive_email = "top4lyfe@atomicmail.io";

function send_report($to, $subject, $message) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = getenv('MAIL_HOST');
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv('MAIL_USERNAME');
    $mail->Password   = getenv('MAIL_PASSWORD');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = getenv('MAIL_PORT');
    $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
}
