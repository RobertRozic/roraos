<?php
require 'database.php';
require 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['login'])) {
		require 'login.php';
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
          <li class="nav-item option"><a class="nav-link" href="app/index.php">Prijava</a></li>
        </ul>
      </div>
    </nav>
		<div class="container-fluid sign_up_in">
			<div class="row d-flex flex-column justify-content-center align-items-center">
				<div class="col-10 col-md-6 col-lg-4 form_wrapper">
					<h1 class="automobili text-center">Roraos.ba</h1>
					<form class="d-flex flex-column swat-form" method="post" action="index.php" autocomplete="off">
						<div>
							<label><i class="fa fa-fw fa-envelope" aria-hidden="true"></i></label>
							<input type="email" name="email" placeholder="E-mail" required>
						</div>
						<div>
							<label><i class="fa fa-fw fa-lock" aria-hidden="true"></i></label>
							<input type="password" name="password" placeholder="Lozinka" required>
						</div>
						<a class="text-center" href="register.php">Nemate račun? Registrirajte se!</a>
						<button type="submit" class="submit_btn" name="login">Prijava</button>
					</form>
					<div class="d-flex flex-row justify-content-between swat_bottom">
						<a href="forgotForm.php" id="password_forgot">Zaboravili ste lozinku?</a>
						<a href="">Pomoć</a>
					</div>
				</div>
			</div>
		</div>
HTML;

echo $html;

require 'footer.php';

?>
