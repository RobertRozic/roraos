<?php
require 'db.php';

session_start();

$date_from = strtotime($mysqli->escape_string($_POST['date_from']));
$date_to = strototime($mysqli->escape_string($_POST['date_to']));
$from=date("Y-m-d",$date_from);
$to=date("Y-m-d",$date_to);
$buyer_id = $_SESSION['id'];
$car_id = $mysqli->escape_string($_POST['car_id']);
$price = $mysqli->escape_string($_POST['price']);


$sql = "INSERT INTO contract (date_from, date_to, buyer_id, car_id, price) "
			. "VALUES ('$from','$to','$buyer_id', '$car_id', '$price')";

if ( $mysqli->query($sql) ) {
	$_SESSION['message'] = 'Uspjesno ste potvrdili rezervaciju!';
	header("location: ../../app/login/message.php");
} else {
	$_SESSION['message'] = 'Doslo je do pogreske!';
	header("location: ../../app/login/error.php");
}

?>
