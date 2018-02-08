<?php

$email  = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows == 0) { // if user doesn't exist
	$_SESSION['message'] = "Korisnik s ovom e-mail adresom ne postoji.";
	header("location: error.php");
} else { // if user exists
	$user = $result->fetch_assoc();
	if (password_verify($_POST['password'], $user['password'])) {
		$_SESSION['id'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['first_name'] = $user['first_name'];
		$_SESSION['last_name'] = $user['last_name'];
		$_SESSION['phone'] = $user['phone'];
		$_SESSION['address'] = $user['address'];
		$_SESSION['hash'] = $user['hash'];
		$_SESSION['account_type'] = $user['account_type'];
		$_SESSION['status'] = $user['status'];

		if ($_SESSION['status'] == '1') {
			$_SESSION['logged_in'] = true;
			header("location: ../index.php");
		} else {
			$_SESSION['message'] = "Korisnički račun nije potvrđen!";
			header("location: error.php");
		}
		
	} else {
		$_SESSION['message'] = "Neispravna lozinka.";
		header("location: error.php");
	}
}

?>