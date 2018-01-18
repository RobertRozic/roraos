<?php
require 'database.php';
require 'session.php';

if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) ){
    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 ){
        $_SESSION['message'] = "Pogrešan URL.";
        header("location: message.php");
    } else {
    	$user = $result->fetch_assoc();
    	$_SESSION['email'] = $user['email'];
    	$_SESSION['hash'] = $user['hash'];
    }
} else {
    $_SESSION['message'] = "Verifikacija nije uspješna.";
    header("location: message.php");
}

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<h1 class="svatovi text-center">Svatovi.online</h1>
				<form class="d-flex flex-column swat-form" method="post" action="resetPassword.php" autocomplete="off">
					<div>
						<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
						<input type="password" name="new_password" placeholder="Lozinka" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
						<input type="password" name="new_password_confirm" placeholder="Ponovno unesite lozinku" required>
					</div>
					<button type="submit" class="submit_btn" name="login">Resetiraj lozinku</button>
				</form>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>