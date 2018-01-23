<?php

require 'database.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['salji'])) {
		require 'helpMail.php';
	}
}

require 'header.php';

$html = '';

$html .= <<<HTML
	<nav id="myNavbar" class="navbar fixed-top navbar-expand-md navbar-inverse">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item option"><a class="nav-link" href="../../index.php#home">Naslovnica</a></li>
          <li class="nav-item option"><a class="nav-link" href="../../index.php#about">O nama</a></li>
          <li class="nav-item option"><a class="nav-link" href="../../index.php#contact">Kontakt</a></li>
          <li class="nav-item option"><a class="nav-link" href="../index.php">Prijava</a></li>
        </ul>
      </div>
    </nav>

	<div class="container-fluid sign_up_in">
		<div class="row d-flex flex-column justify-content-center align-items-center">
			<div class="col-10 col-md-6 col-lg-4 form_wrapper">
				<img src="../../src/img/logo.png" class="img-fluid logo"/>
				<h5 class="automobili text-center">Kontaktiraj podršku</h5>
				<form class="d-flex flex-column swat-form " method="post" action="help.php" autocomplete="off" >
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