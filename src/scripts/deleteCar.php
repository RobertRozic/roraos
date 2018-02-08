<?php
  require 'db.php';
  session_start();

  $delete_id = $mysqli->escape_string($_POST['delete_id']);

  $sql = "DELETE from cars WHERE id='$delete_id'";

  if ( $mysqli->query($sql) ) {
    $_SESSION['message'] = "Uspjesno ste izbrisali oglas!";
    header("location: ../../app/login/message.php");
  } else {
    $_SESSION['message'] = 'Doslo je do pogreske!';
    header("location: ../../app/login/error.php");
  }
?>