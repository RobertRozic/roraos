<?php
require 'database.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['login'])) {
		require 'login.php';
	}
}

require 'header.php';

$html = '';

$html .= <<<HTML
		<div class="container-fluid sign_up_in">
			<div class="row d-flex flex-column justify-content-center align-items-center">
				<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<img src="../../src/img/logo.png" class="img-fluid logo"/>
					<form class="d-flex flex-column swat-form" method="post" action="index.php" autocomplete="off">
						<div>
							<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
							<input type="email" name="email" placeholder="E-mail" required>
						</div>
						<div>
							<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
							<input type="password" name="password" placeholder="Lozinka" required>
						</div>
						<a class="text-center" href="register.php">Nemate račun? Registrirajte se!</a>
						<button type="submit" class="submit_btn" name="login">Prijava</button>
					</form>
					<div class="d-flex flex-row justify-content-between swat_bottom">
						<a href="forgotForm.php" id="password_forgot">Zaboravili ste lozinku?</a>
						<a href="help.php">Pomoć</a>
					</div>
				</div>
			</div>
		</div>
HTML;

echo $html;

require 'footer.php';

?>
