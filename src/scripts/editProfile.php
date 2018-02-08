<?php
session_start();

include 'db.php';

$id = $_SESSION['id'];
$currentMail = $_SESSION['email'];

$check = $mysqli->query("SELECT * FROM users WHERE email='$currentMail'") or die($mysqli->error());
if($check->num_rows > 0){
    $user = $check->fetch_assoc();
    if($user['hash'] != $_SESSION['hash']){
        $_SESSION['message'] = 'Neispravan zahtjev!';
        header("location: ../../app/login/error.php");
    }
} else {
    $_SESSION['message'] = 'Neispravan zahtjev!';
    header("location: ../../app/login/error.php");
}

$newMail  = $mysqli->real_escape_string($_POST['newMail']);
$newName  = $mysqli->real_escape_string($_POST['newName']);
$newPhone = $mysqli->real_escape_string($_POST['newPhone']);
$newAddress  = $mysqli->real_escape_string($_POST['newAddress']);

$newName  = explode(" ", $newName);
if (count($newName) < 2) {
    $_SESSION['message'] = 'Unesite puno ime i prezime!';
    header("location: ../../app/login/error.php");
    die();
}
$new_first_name = $newName[0];
$new_last_name  = $newName[1];

if ($currentMail != $newMail) {
    $result = $mysqli->query("SELECT * FROM users WHERE email='$newMail'") or die($mysqli->error());
    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Korisnik s ovom e-mail adresom već postoji.";
        echo $_SESSION['message'];
    } else {
        $sql = "UPDATE users
              SET first_name = '$new_first_name', last_name = '$new_last_name', email = '$newMail', phone = '$newPhone', address = '$address', status = '0'
              WHERE id = $id";
        $mysqli->query($sql);

        $to      = $email;
        $subject = 'Roraos potvrda racuna';
        $message_body = 'Postovani '.$first_name.',
            Zahtjevali ste promjenu e-maila na vašem računu.
            Molimo kliknite na link ispod kako bi potvrdili vas korisnicki racun.
            https://roraos.amplius.tech/app/login/verify.php?email='.$email.'&hash='.$hash;

        if ( mail($to, $subject, $message_body, 'From: no-reply@roraos.tech') ) {
            header("location: ../../app/login/logout.php");
        } else {
            $_SESSION['message'] = 'Registracija nije uspjela.';
            header("location: ../../app/login/error.php");
        }
    }
} else if ( $new_first_name != $_SESSION['first_name'] || 
            $new_last_name != $_SESSION['last_name'] || 
            $newPhone != $_SESSION['phone'] ||
            $newAddress != $_SESSION['address'] ) {
    $sql = "UPDATE users
        SET first_name = '$new_first_name', last_name = '$new_last_name',
        phone = '$newPhone', address = '$newAddress'
        WHERE id = $id";
    $mysqli->query($sql);
    $_SESSION['first_name'] = $new_first_name;
    $_SESSION['last_name'] = $new_last_name;
    $_SESSION['phone'] = $newPhone;
    $_SESSION['address'] = $newAddress;
    header("location: ../../app/index.php");
} else {
    header("location: ../../app/index.php");
}

?>