<?php

require '../../src/scripts/db.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['salji'])) {
		require 'helpMail.php';
	}
}

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<img src="../../src/img/logo.png" class="img-fluid logo"/>
				<h5 class="text-center">Kontaktiraj podršku</h5>
				<form class="d-flex flex-column roraos-form " method="post" action="help.php" autocomplete="off" >
					<div>
						<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
						<input type="email" name="email" placeholder="Unesite Vaš E-mail" required>
					</div>
					<textarea id="textPomoc" name="tekst" rows="6" placeholder="Dje gori .." required></textarea>
					<button type="submit" class="submit_btn" name="salji">Pošalji mail</button>
				</form>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';


?>