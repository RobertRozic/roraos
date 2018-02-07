<?php

$navbar = '';

$navbar .= <<<HTML
    <nav id="myNavbar" class="navbar fixed-top navbar-expand-md navbar-inverse">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <form class="form-inline" method="get" id="search-form" action="search.php">
          <input class="form-control mr-sm-6" v-model="search" type="search" placeholder="Pretražite oglase" aria-label="Search" name="search">
          <button class="btn" type="submit"><i class="fa fa-2x fa-search"></i></button>
        </form>
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item option"><a class="nav-link" href="../index.php#home">Naslovnica</a></li>
          <li class="nav-item option"><a class="nav-link" href="../index.php#about">O nama</a></li>
          <li class="nav-item option"><a class="nav-link" href="../index.php#contact">O projektu</a></li>
          <li class="nav-item option"><a class="nav-link" href="../vizija.php">Vizija</a></li>
          <li class="nav-item dropdown option">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="../src/img/blank-profile.png" class="img-fluid">
            </a>
            <div id="profile-menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="profil.php">Moj profil - {$first_name}</a>
              <a class="dropdown-item" href="login/help.php">Pomoć</a>
              <a class="dropdown-item" href="login/logout.php">Odjava</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
HTML;

echo $navbar;

?>