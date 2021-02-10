<?php

date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.lottemart.co.id';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "username";
$mail->Password = "password";


$mail->setFrom('no-reply@lottemart.co.id', 'OFS');
$mail->addAddress('malik@gmail.com', 'Malik Sukmo Satrio');
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML("<b>JUST SENT<b>");
$mail->AltBody = 'This is a plain-text message body';


if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
