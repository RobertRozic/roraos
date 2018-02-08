<?php
require 'db.php';

session_start();

$car_id = $mysqli->escape_string($_POST['car_id']);

$car_name = $mysqli->escape_string($_POST['car_name']);
$type = $mysqli->escape_string($_POST['type']);
$brand = $mysqli->escape_string($_POST['brand']);
$fuel = $mysqli->escape_string($_POST['fuel']);
$price = $mysqli->escape_string($_POST['price']);
$year_made = $mysqli->escape_string($_POST['year']);
$mileage = $mysqli->escape_string($_POST['mileage']);
$power = $mysqli->escape_string($_POST['power']);
$transmission = $mysqli->escape_string($_POST['transmission']);

$check = $mysqli->query("SELECT * FROM cars WHERE id='$car_id'");
if($check->num_rows > 0){
    $car = $check->fetch_assoc();
    if($car['owner_id'] != $_SESSION['id']){
        $_SESSION['message'] = 'Neispravan zahtjev!';
        header("location: ../../app/login/error.php");
    }
} else {
    $_SESSION['message'] = 'Neispravan zahtjev!';
    header("location: ../../app/login/error.php");
}

$sql = "UPDATE cars SET type = '$type', brand = '$brand', fuel='$fuel', price = '$price', year_made = '$year_made', mileage = '$mileage', power = '$power', transmission = '$transmission', car_name = '$car_name' WHERE id = '$car_id'";

/*if ( isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"])) {
	include 'uploadImage.php';
	$mysqli->query("UPDATE cars SET image = '$image' WHERE id = '$car_id'");
}*/

if ( $mysqli->query($sql) ) {
	$_SESSION['message'] = 'Uspjesno ste uredili oglas!';
	header("location: ../../app/login/message.php");
} else {
	$_SESSION['message'] = 'Doslo je do pogreske!';
	header("location: ../../app/login/error.php");
}

?>
