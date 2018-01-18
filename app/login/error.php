<?php
require 'session.php';

if(isset($_SESSION['message']) AND !empty($_SESSION['message'])):
	$message = $_SESSION['message'];
else:
	header( "location: index.php" );
endif;

require 'header.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<h1 class="automobili text-center">Roraos.ba</h1>
				<div class="d-flex flex-column justify-content-center">
					<h5 class="text-center message">{$message}</h5>
					<a href="javascript:history.back()"><button class="submit_btn">Pokušaj ponovno</button></a>
				</div>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>