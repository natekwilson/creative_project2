<?php
require 'phpmailer/PHPMailerAutoload.php';

session_start();

$subject = $_POST["subject"];
$message = $_POST["message"];
$from = $_POST["replyto"];
$fromname = $_POST["replyname"];

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = "smtp.gmail.com"; // SMTP server  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'byu.it.dev.test@gmail.com';                 // SMTP username
$mail->Password = 'Bass2thefac3';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->setFrom('byu.it.dev.test@gmail.com', 'Mailer');
$mail->addAddress('byu.it.dev.test@gmail.com', 'Nate');     // Add a recipient
$mail->addAddress( $from);               // Name is optional
$mail->addReplyTo('byu.it.dev.test@gmail.com', 'Nate');


$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    =  $message;


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	header('Location: Contact.php');
}
