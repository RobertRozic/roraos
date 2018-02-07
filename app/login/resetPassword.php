<?php

require '../../src/scripts/db.php';
require 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ( $_POST['new_password'] == $_POST['new_password_confirm'] ) {

        $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $email = $_SESSION['email'];
        $hash = $_SESSION['hash'];
        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {
          $_SESSION['message'] = "Vaša lozinka je uspješno resetirana!";
          header("location: message.php");
        }
    }

    else {
        $_SESSION['message'] = "Lozinke se ne podudaraju.";
        header("location: error.php");
    }
}

?>