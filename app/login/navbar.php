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
          <li class="nav-item option"><a class="nav-link" href="index.php">Prijava</a></li>
        </ul>
      </div>
    </nav>
HTML;

echo $navbar;

?>