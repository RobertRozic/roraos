<?php
require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
		<div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
		<div class="row justify-content-center dashboard">

			<div class="col-10 col-md-10 d-flex flex-column align-items-center wrapper" id="searchblue">

					<div class="row justify-content-center dashboard">

						<div class="col-2 col-md-2 oglas"><p>Oglas nekog auta!</p></div>

						<div class="col-2 col-md-2 oglas"><p>Oglas nekog auta!</p></div>

						<div class="col-2 col-md-2 oglas"><p>Oglas nekog auta!</p></div>

					</div>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>
