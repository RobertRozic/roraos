<?php
session_start();
$name = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];

if($_SESSION['logged_in'] != 'true') {
	header('location: login/index.php');
}

?>
