<?php
require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
  <div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center" id="main-oglasi">
    <div class="row d-flex justify-content-center dashboard">
      <div class="col-10 carousel slide blue-panel" data-ride="carousel" id="carouselAuta">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-12 col-md-7 flex-center flex-column">
                <img class="img-fluid oglas-slika" src="../src/img/audi.jpg">
              </div>
              <div class="col-12 col-md-5 detalji">
                <h1 class="text-center">AUDI A4</h1>
                <p>
                  Vrsta vozila: Sedan<br>
                  Vrsta goriva: Benzin<br>
                  Jačina motora: 190KS<br>
                  Cijena: 120KM/dan
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-12 col-md-7 flex-center flex-column">
                <img class="img-fluid oglas-slika" src="../src/img/audi.jpg">
              </div>
              <div class="col-12 col-md-5 detalji">
                <h1 class="text-center">AUDI A6</h1>
                <p>
                  Vrsta vozila: Sedan<br>
                  Vrsta goriva: Benzin<br>
                  Jačina motora: 190KS<br>
                  Cijena: 120KM/dan
                </p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselAuta" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselAuta" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
HTML;

echo $html;

require 'footer.php';

?>
