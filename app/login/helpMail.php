<?php

require 'database.php';
require 'help.php';
require 'session.php';
require 'header.php';


if (isset($_POST['submit'])) {
    if(!isset($_POST['email']) || 
        !isset($_POST['tekst'])) {
        echo "Žao nam je, ali Vaša poruka nije poslana. Pokušajte poslije opet."
    }
    
    $admin_email = "roraosauto@gmail.com";
    $subject = 'Kontakt forma';
    $email = $_POST['email'];
    $tekst = $_POST['tekst'];

    mail($admin_email, $subject, $tekst, "From:" . $email);

    echo "Hvala Vam što ste nas kontaktirali";
    
}


