<?php
require 'session.php';

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
		<div class="row d-flex justify-content-center dashboard">
			<div class="col-10 col-md-5 d-flex flex-column justify-content-center align-items-center">
				<div class="row d-flex flex-row justify-content-between">
					<a href="login/logout.php">
						<i aria-hidden="true" class="fas fa-2x fa-sign-out-alt option"></i>
					</a>
				</div>
				<h2>Dobrodošli na stranicu Roraos!</h2>
				<p>Hvala Vam na registraciji i strpljenju. (Radovi na stranici su u tijeku!)</p>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>
