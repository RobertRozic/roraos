<?php
  require 'db.php';

  $id = $mysqli->escape_string($_POST['id']);

  $sql = "DELETE from cars WHERE id='$id'";

  if ( $mysqli->query($sql) ) {
    $_SESSION['message'] = 'Uspjesno ste potvrdili rezervaciju!';
    header("location: ../../app/login/message.php");
  } else {
    $_SESSION['message'] = 'Doslo je do pogreske!';
    header("location: ../../app/login/error.php");
  }
?>