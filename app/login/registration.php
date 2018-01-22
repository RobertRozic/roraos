<?php

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

		$to      = $email;
		$subject = 'Roraos potvrda racuna';
		$message_body = 'Postovani '.$first_name.',
			Hvala vam na registraciji na nas servis.
			Molimo kliknite na link ispod kako bi potvrdili vas korisnicki racun.
			https://roraos.amplius.tech/app/login/verify.php?email='.$email.'&hash='.$hash;

		if(mail($to, $subject, $message_body, 'From: no-reply@roraos.tech')){
			$_SESSION['message'] = "Provjerite vaš e-mail za potvrdu računa.";
			header("location: message.php");
		} else {
			$_SESSION['message'] = "Greška pri slanju maila za potvrdu.";
			header("location: message.php");
		}

	} else {
		$_SESSION['message'] = "Registracija nije uspjela.";
		header("location: error.php");
	}

	die();
}

?>
