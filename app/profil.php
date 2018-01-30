<?php
require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
		<div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
		<div class="row justify-content-center dashboard">
			<div class="col-10 col-md-3 d-flex flex-column justify-content-center align-items-center wrapper" id="myprofile">
				<a href="login/logout.php">
					<i aria-hidden="true" class="fas fa-2x fa-sign-out-alt option"></i>
				</a>
				<h2 class="text-center">Dobrodošli na stranicu Roraos!</h2>
				<p class="text-center">Hvala Vam na registraciji i strpljenju.<br>
				(Radovi na stranici su u tijeku!)</p>
			</div>
			<div class="col-10 col-md-7 d-flex flex-column align-items-center wrapper" id="myprofileblue">
				<div id="myprofileblue_top"></div>

				<h2 class="text-center">Dobrodošli na stranicu Roraos!</h2>
				<p class="text-center">Hvala Vam na registraciji i strpljenju.<br>
				(Radovi na stranici su u tijeku!)</p>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>
