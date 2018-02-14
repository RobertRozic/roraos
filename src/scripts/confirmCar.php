<?php
  require 'db.php';
  session_start();

  $confirm_id = $mysqli->escape_string($_POST['confirm_id']);

  $sql = "UPDATE cars SET active = 1 WHERE id='$confirm_id'";

  if ( $mysqli->query($sql) ) {
    $_SESSION['message'] = "Uspjesno ste potvrdili oglas!";
    header("location: ../../app/login/message.php");
  } else {
    $_SESSION['message'] = 'Doslo je do pogreske!';
    header("location: ../../app/login/error.php");
  }
?>