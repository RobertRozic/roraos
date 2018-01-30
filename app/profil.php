<?php
require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
		<div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
		<div class="row justify-content-center dashboard">
			<div class="col-10 col-md-3 d-flex flex-column justify-content-center align-items-center wrapper" id="myprofile">
				
			<div class="d-flex flex-row justify-content-between" id="options">
				<a href="login/logout.php">
					<i aria-hidden="true" class="fas fa-2x fa-sign-out-alt option"></i>
				</a>
				<a href="editForm.php">
					<i aria-hidden="true" class="fas fa-2x fa-edit option"></i>
				</a>
			</div>
			<img src="../src/img/blank-profile.png" class="img-fluid">
				<h5 class="text-center">Moj profil</h5>
				<p class="text-center">Hvala Vam na registraciji i strpljenju.<br>
				(Radovi na stranici su u tijeku!)</p>
			</div>
			<div class="col-10 col-md-7 d-flex flex-column align-items-center wrapper" id="myprofileblue">
				<div id="myprofileblue_top"></div>

				<br>
				<p class="text-center">Ovdje idu neki oglasi!</p>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>
