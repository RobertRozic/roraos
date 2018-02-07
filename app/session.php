<?php
session_start();

$id = $_SESSION['id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$name = $first_name . " " . $last_name;
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];

if($_SESSION['logged_in'] != 'true') {
	header('location: login/index.php');
}

?>
