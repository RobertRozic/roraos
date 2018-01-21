<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'database.php';
require 'pomoc.php';
require 'session.php';
require 'header.php';
require 'PHPMailerAutoload.php';

$msg = '';
if (array_key_exists('submit', $_POST)) {
    
    
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 25;
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('roraosauto@gmail.com');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress($email);
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'])) {
        $mail->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Message: {$_POST['tekst']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Vaša poruka nije poslana. Molim Vas pokušajte opet poslije.';
            echo $msg;
        } elseif {
            $msg = 'Poruka poslana. Hvala vam što ste nas kontaktirali';
            echo $msg;
        }
     else {
        $msg = 'Pogresna email adresa.';
        echo $msg;
    } }
}





/*
$mail = new PHPMailer;
$mail->setFrom($email);
$mail->addAddress('roraosauto@gmail.com');
$mail->Subject  ='Pomoc';
$mail->Body     = $tekst;
if(!$mail->send()) {
  echo 'Poruka nije poslana.';
  echo 'Greška ' . $mail->ErrorInfo;
} else {
  echo 'Poruka je poslana.';
}
/*$mail = new PHPMailer(true);
		try {

		//Server settings
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'roraosauto@gmail.com';
		$mail->Password = 'ostamararoza';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		//Recipients
		$mail->setFrom($email);
		$mail->addAddress('roraosauto@gmail.com');

		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Pomoc';
		$mail->Body    = $tekst;

		$mail->send();
   		echo 'Primili smo Vašu poruku';
   	}
   	catch (Exception $e) {
    echo 'Poruka nije poslana', $mail->ErrorInfo;
	}

?>
