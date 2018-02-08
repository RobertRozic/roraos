<?php

require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
  <div class="container-fluid dashboard-main flex-center flex-column">
    <div class="row d-flex justify-content-center dashboard">
      <div class="col-10 carousel slide blue-panel" data-ride="carousel" id="carouselAuta">
        <h1 class="text-center">Sponzorirano</h1>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item" v-for="(car, index) in sponsored" :class="{ 'active': index === 0 }">
            <div class="row">
              <div class="col-12 col-md-7 flex-center flex-column">
                <img class="img-fluid oglas-slika" :src="'../src/img/uploads/' + car.image">
              </div>
              <div class="col-12 col-md-5 detalji">
                <h3 class="text-center">{{ car.car_name }}</h3>
                <p>
                  Marka : {{ car.brand }}<br>
                  Gorivo : {{ car.fuel }}<br>
                  Tip : {{ car.type }}<br>
                  Godina proizvodnje : {{ car.year_made}}<br>
                  Kilometraža : {{ car.mileage }}<br>
                  Snaga : {{ car.power }} KS<br>
                  Mjenjač : {{ car.transmission }}<br>
                  Cijena : {{ car.price }} KM/dan<br>
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
      <div class="col-10 d-flex flex-column align-items-center blue-panel">
        <h1 class="text-center">Oglasi</h1>
        <div class="row" id="oglasi">
          <div v-for="car in filterCars" class="col-12 col-md-6 col-lg-3 flex-center flex-column oglas">
            <div>
              <img :src="'../src/img/uploads/' + car.image" class="img-fluid">
              <h3>{{ car.car_name }}</h3>
              <p> 
                Marka : {{ car.brand }}<br>
                Gorivo : {{ car.fuel }}<br>
                Tip : {{ car.type }}<br>
                Godina proizvodnje : {{ car.year_made}}<br>
                Kilometraža : {{ car.mileage }}<br>
                Snaga : {{ car.power }} KS<br>
                Mjenjač : {{ car.transmission }}<br>
                Cijena : {{ car.price }} KM/dan<br>
              </p>
            </div>
          </div>
        </div>
    </div>
  </div>
HTML;

echo $html;

require 'footer.php';

?>
