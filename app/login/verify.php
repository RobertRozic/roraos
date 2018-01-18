<?php

require 'database.php';
require 'session.php';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
	$email = $mysqli->escape_string($_GET['email']);
	$hash = $mysqli->escape_string($_GET['hash']);

	$result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND status='0'");

	if ( $result->num_rows == 0 ){
		$_SESSION['message'] = "Korisnički račun je već potvrđen ili je link neispravan.";
		header("location: message.php");
	} else {
		$mysqli->query("UPDATE users SET status='1' WHERE email='$email'") or die($mysqli->error);
		$_SESSION['status'] = 1;
		$_SESSION['message'] = "Uspješno ste potvrdili vaš račun!";
		header("location: message.php");
	}
} else {
	$_SESSION['message'] = "Neispravni parametri.";
	header("location: message.php");
}

?>