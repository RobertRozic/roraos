<?php
require 'db.php';

session_start();

$car_name = $mysqli->escape_string($_POST['car_name']);
$type = $mysqli->escape_string($_POST['type']);
$brand = $mysqli->escape_string($_POST['brand']);
$fuel = $mysqli->escape_string($_POST['fuel']);
$price = $mysqli->escape_string($_POST['price']);
$year = $mysqli->escape_string($_POST['year']);
$mileage = $mysqli->escape_string($_POST['mileage']);
$fuel = $mysqli->escape_string($_POST['power']);
$transmission = $mysqli->escape_string($_POST['transmission']);
$owner_id = $_SESSION['id'];

$sql = "INSERT INTO cars (type, brand, fuel, price, owner_id, year_made, mileage, power, transmission, car_name) "
			. "VALUES ('$type','$brand','$fuel', '$price', '$owner_id', '$year_made', '$mileage', '$power', '$transmission', '$car_name')";

if ( $mysqli->query($sql) ) {
	$_SESSION['message'] = 'Uspjesno ste dodali oglas!';
	header("location: ../../app/login/message.php");
} else {
	$_SESSION['message'] = 'Doslo je do pogreske!';
	header("location: ../../app/login/error.php");
}

?>
