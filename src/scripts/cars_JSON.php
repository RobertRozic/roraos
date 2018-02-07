<?php
header('Content-Type: application/json; charset=utf-8;');

require 'db.php';

$sql = "SELECT * FROM cars";

$result = $mysqli->query($sql);

$json_array = array();

while($row = $result->fetch_assoc()){
    $json_array[] = $row;
}

echo json_encode($json_array);

?>