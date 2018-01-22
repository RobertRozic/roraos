<?php

    $admin_email = "roraosauto@gmail.com";
    $subject = 'Kontakt forma';
    $email = $_POST['email'];
    $tekst = "Poslao: " . $email . " " . $_POST['tekst'];

    if(mail($admin_email, $subject, $tekst, "From: pomoc@roraos.tech")){
        $_SESSION['message'] = "Hvala Vam što ste nas kontaktirali";
        header("location: message.php");
    } else {
        $_SESSION['message'] = "Žao nam je, ali Vaša poruka nije poslana. Pokušajte poslije opet.";
        header("location: error.php");
    }

?>

