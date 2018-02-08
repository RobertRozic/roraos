<?php
  require 'db.php';
  session_start();

  $delete_contract = $mysqli->escape_string($_POST['delete_contract']);

  $sql = "DELETE from contract WHERE id='$delete_contract'";

  if ( $mysqli->query($sql) ) {
    $_SESSION['message'] = "Uspjesno ste izbrisali rezervaciju!";
    header("location: ../../app/login/message.php");
  } else {
    $_SESSION['message'] = 'Doslo je do pogreske!';
    header("location: ../../app/login/error.php");
  }
?>