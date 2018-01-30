<?php

$navbar = '';

$navbar .= <<<HTML
    <nav id="myNavbar" class="navbar fixed-top navbar-expand-md navbar-inverse">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item option"><a class="nav-link" href="../../index.php#home">Naslovnica</a></li>
          <li class="nav-item option"><a class="nav-link" href="../../index.php#about">O nama</a></li>
          <li class="nav-item option"><a class="nav-link" href="../../index.php#contact">O projektu</a></li>
          <li class="nav-item option"><a class="nav-link" href="../../vizija.php">Vizija</a></li>
          <li class="nav-item dropdown option">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img id="profileDropImg" src="../src/img/blank-profile.png" class="img-fluid">
            </a>
            <div id="profile-menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="profile.php">Moj profil - {$first_name}</a>
              <a class="dropdown-item" href="#">Pomoć</a>
              <a class="dropdown-item" href="#">Odjava</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
HTML;

echo $navbar;

?>