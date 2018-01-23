<?php

require 'database.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['register'])) {
		require 'registration.php';
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
				<form class="d-flex flex-column swat-form" method="post" action="register.php" autocomplete="off">
					<div>
						<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
						<input type="email" name="email" placeholder="E-mail" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-user" aria-hidden="true"></i></label>
						<input type="text" name="name" placeholder="Ime i prezime" required>
					</div>
					<div class="phone_input">
						<label><i class="fa fa-fw fa-phone" aria-hidden="true"></i></label>
						<p>+387</p>
						<input type="text" name="phone" placeholder="" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
						<input type="password" name="password" placeholder="Lozinka" required>
					</div>
					<div>
						<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
						<input type="password" name="password_confirm" placeholder="Ponovno unesite lozinku" required>
					</div>
					<a class="text-center" href="index.php">Već ste registrirani? Prijavite se!</a>
					<button type="submit" class="submit_btn" name="register">Registriraj se</button>
				</form>
				<div class="d-flex flex-row justify-content-end swat_bottom">
					<a href="help.php">Pomoć</a>
				</div>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>