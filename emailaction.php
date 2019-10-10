<?php

session_start();

$subject = $_POST["subject"];
$message = $_POST["message"];
$from = $_POST["replyto"];
$fromname = $_POST["replyname"];

mail('skyscraperds@gmail.com',$subject,$message);


    require("class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->SMTPAuth   = true; // SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    $mail->Port       = 465; // SMTP Port
    $mail->Username   = "byu.it.dev.test@gmail.com"; // SMTP account username
    $mail->Password   = "Legoninjaman1";        // SMTP account password

    $mail->SetFrom('byu.it.dev.test@gmail.com', 'Nate Wilson'); // FROM
    $mail->AddReplyTo('byu.it.dev.test@gmail.com', 'Nate Wilson'); // Reply TO

    $mail->AddAddress( $from ); // recipient email

    $mail->Subject    = $subject; // email subject
    $mail->Body       = $message;

    if(!$mail->Send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }





//header('Location: Contact.php');
$conn->close();
?>

