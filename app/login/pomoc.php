<?php

require 'database.php';

require 'session.php';
require 'header.php';


/*#textPomoc {
	background-color: transparent;
	color: #fff;
}
*/

$html = '';
$html .= <<<HTML
	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<h1 class="automobili text-center">Roraos.ba</h1>
				<h5 class="automobili text-center">Kontaktiraj podršku</h5>
				<form class="d-flex flex-column swat-form " method="post" action="PomocSend.php" autocomplete="off" >
				<div>
						<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
						<input type="email" name="email" placeholder="  Unesite Vaš E-mail" required>
					</div>

				

					<textarea id="textPomoc" rows="6" placeholder="Dje gori .."></textarea>
					<button type="submit" class="submit_btn" name="SaljiMail">Pošalji mail</button>
					</form>

					
					
				
			</div>
		</div>
	</div>
HTML;

echo $html;
require 'footer.php';


?>