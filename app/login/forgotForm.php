<?php
require 'database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

require 'session.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ){
        $_SESSION['message'] = "Korisnik s ovom e-mail adresom ne postoji.";
        header("location: error.php");
    } else {
        $user = $result->fetch_assoc();
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

	$mail = new PHPMailer();

	//Server settings
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host = 'smtp.zoho.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'kontakt@svatovi.online';
	$mail->Password = 'SWAT123!';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	//Recipients
	$mail->setFrom('kontakt@svatovi.online', 'Svatovi online');
	$mail->addAddress($email);

	//Content
	$mail->isHTML(true);
	$mail->Subject = 'Svatovi.online resetiranje lozinke';
	$mail->Body    = 'Postovani '.$first_name.',
		Zatrazili ste resetiranje lozinke za vas korisnicki racun.
		Molimo kliknite na link ispod kako bi resetirali vasu lozinku:
		https://www.svatovi.online/app/public/login/reset.php?email='.$email.'&hash='.$hash;

	if($mail->send()){
		$_SESSION['message'] = "Provjerite vaš e-mail za resetiranje lozinke.";
		header("location: message.php");
	}
  }
}

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<h1 class="automobili text-center">Roraos.ba</h1>
				<form class="d-flex flex-column swat-form" method="post" action="forgotForm.php" autocomplete="off">
					<div>
						<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
						<input type="email" name="email" placeholder="E-mail" required>
					</div>
					<button type="submit" class="submit_btn" name="login">Zatraži resetiranje</button>
				</form>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>