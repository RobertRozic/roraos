<?php
require 'session.php';

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
		<div class="row d-flex justify-content-center dashboard">
			<div class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-stretch blue-panel" id="profile">
				<div class="row d-flex flex-row justify-content-between">
					<a href="login/logout.php"><i aria-hidden="true" class="fas fa-2x fa-sign-out-alt option"></i></a>
					<a href="editForm.php"><i aria-hidden="true" class="fas fa-2x fa-edit option"></i></a>
				</div>
				<div class="d-flex flex-column align-items-center"><img class="img-fluid" src="../src/img/blank-profile.png"></div>
				<div class="profile-details">
					<i class="fa fa-fw fa-user" aria-hidden="true"></i><p>{$name}</p>
				</div>
				<div class="profile-details">
					<i class="fa fa-fw fa-envelope" aria-hidden="true"></i><p>{$email}</p>
				</div>
				<div class="profile-details">
					<i class="fa fa-fw fa-phone" aria-hidden="true"></i><p>+387{$phone}</p>
				</div>
				<div class="profile-details">
					<i class="fa fa-fw fa-home" aria-hidden="true"></i><p>{$address}</p>
				</div>
			</div>
			<div class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center white-panel" id="reservations">
				<h2 class="title text-center">Moje rezervacije</h2>
				<div class="d-flex flex-column justify-content-center align-items-center">
					<a href="insertDate.php"><i aria-hidden="true" class="fa fa-4x fa-plus-circle add-icon"></i></a>
					<p>Trenutno nemate rezervacija!<br>
					Pritisnite &quot;+&quot; da biste započeli.</p>
				<div>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>
