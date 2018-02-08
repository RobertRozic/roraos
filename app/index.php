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
            <div class="row profil-oglasi flex-center flex-column add-car" v-on:click = "updatePrice(car.price); updateCar(car.id)" data-toggle="modal" data-target="#myModal">
              <h2>Rezerviraj</h2>
              <i class="fas fa-2x fa-plus-circle button-add"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade roraos-modal" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content form_wrapper">
        <div class="modal-header">
          <h5 class="modal-title">Ispunite podatke za rezervaciju!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column justify-content-center">
          <form class="d-flex flex-column roraos-form" method="post" action="../src/scripts/addContract.php" autocomplete="off" id="contract-form">
            <div>
              <label>Datum od:</label>
              <input type="date" name="date_from" id="date_from" v-on:change="updateTotal()" required>
            </div>
            <div>
              <label>Datum do:</label>
              <input type="date" name="date_to" id="date_to" v-on:change="updateTotal()" required>
            </div>
            <input type="hidden" name="car_id" id="car_id">
            <input type="hidden" name="price" id="price">
            <button type="submit" class="hide-button"></button>
          </form>
          <div class="d-flex flex-row justify-content-between">
            <p>Ukupna cijena je:</p>
            <div id="totalPrice"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="submit_btn" name="submit" onclick="addContract()">Potvrdi</button>
        </div>
      </div>
    </div>
  </div>
<script>

  var dateTo;
  var dateFrom;
  var cijena;
  var totalPrice = 0;

  var updatePrice = function (price) {
    cijena = price;
    document.getElementById("date_from").min = new Date().toISOString().split('T')[0]; 
    document.getElementById("date_to").min = new Date().toISOString().split('T')[0];
  }

  var updateTotal = function (){
    var dateFromInput = document.getElementById("date_from"); 
    var dateToInput = document.getElementById("date_to");

    dateToInput.min=dateFromInput.value;

    if(dateFromInput.value>dateToInput.value) dateToInput.value=dateFromInput.value;

    dateFrom = new Date(dateFromInput.value);
    dateTo = new Date(dateToInput.value);

    if(dateFromInput.value==dateToInput.value){
      console.log("dobro je sve");
      dateTo.setDate(dateTo.getDate() + 1);
      dateToInput.value=dateTo.toISOString().split('T')[0];

    };

    var timeDiff = Math.abs(dateTo.getTime()-dateFrom.getTime());
    var diffDays = Math.ceil(timeDiff/(1000*3600*24));

    totalPrice = diffDays*cijena;

    if (!isNaN(totalPrice)){ 
      document.getElementById("totalPrice").innerHTML = totalPrice + " KM";
      document.getElementById("price").value = totalPrice;
    }
  };

  var updateCar = function (id){
    var carId=id;
    document.getElementById("car_id").value=carId;
  }

  var addContract = function () {
    $("#contract-form").find('[type="submit"]').trigger('click');
  }
</script>
HTML;

echo $html;

require 'footer.php';

?>
