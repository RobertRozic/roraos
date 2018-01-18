<?php

require 'database.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['register'])) {
		require 'registration.php';
	}
}

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<h1 class="svatovi text-center">Svatovi.online</h1>
				<form class="d-flex flex-column swat-form" method="post" action="register.php" autocomplete="off">
					<div>
						<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
						<input type="email" name="email" placeholder="E-mail" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-user" aria-hidden="true"></i></label>
						<input type="text" name="name" placeholder="Ime i prezime" required>
					</div>
					<div class="phone_input">
						<label><i class="fa fa-fw fa-phone" aria-hidden="true"></i></label>
						<p>+387</p>
						<input type="text" name="phone" placeholder="" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
						<input type="password" name="password" placeholder="Lozinka" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
						<input type="password" name="password_confirm" placeholder="Ponovno unesite lozinku" required>
					</div>
					<a class="text-center" href="index.php">Već ste registrirani? Prijavite se!</a>
					<button type="submit" class="submit_btn" name="register">Registriraj se</button>
				</form>
				<div class="fb_login text-center">
					<i class="fa fa-facebook-official"></i>&nbsp;Prijavi se putem facebooka
				</div>
				<div class="d-flex flex-row justify-content-end swat_bottom">
					<a href="">Pomoć</a>
				</div>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>