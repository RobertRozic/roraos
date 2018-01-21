<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$email = $mysqli->escape_string($_POST['email']);
$name = $mysqli->escape_string($_POST['name']);
$name =  explode(" ", $name);
if(count($name) < 2){
	$_SESSION['message'] = 'Unesite puno ime i prezime!';
	header("location: error.php");
	die();
}

$first_name = $name[0];
$last_name = $name[1];

$phone = $mysqli->escape_string($_POST['phone']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0,1000)));

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

if ( $result->num_rows > 0 ) {
	$_SESSION['message'] = 'Korisnik s ovom e-mail adresom već postoji!';
	header("location: error.php");
} else if($_POST['password'] != $_POST['password_confirm']){
	$_SESSION['message'] = "Lozinke se ne podudaraju!";
	header("location: error.php");
} else {
	$sql = "INSERT INTO users (first_name, last_name, email, phone, password, hash) "
			. "VALUES ('$first_name','$last_name','$email', '$phone', '$password', '$hash')";

	if ($mysqli->query($sql)){

		$mail = new PHPMailer();

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
		$mail->setFrom('roraosauto@gmail.com', 'Roraos');
		$mail->addAddress($email);

		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Roraos potvrda racuna';
		$mail->Body    = 'Postovani '.$first_name.',
				Hvala vam na registraciji na nas servis.
				Molimo kliknite na link ispod kako bi potvrdili vas korisnicki racun.
				https://domena.com/app/login/verify.php?email='.$email.'&hash='.$hash;

		if($mail->send()){
			$_SESSION['message'] = "Provjerite vaš e-mail za potvrdu računa.";
			header("location: message.php");
		}

	} else {
		$_SESSION['message'] = "Registracija nije uspjela.";
		header("location: error.php");
	}

	die();
}

?>