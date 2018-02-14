<?php
require 'session.php';

if($account_type != 'admin'){
  header("location: profil.php");
}

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
  <div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
    <div class="row justify-content-center dashboard">
      <div class="col-10 col-lg-7 blue-panel wrapper">

        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#svi_oglasi" role="tab">
              Svi oglasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#nepotvrdjeni" role="tab">
              Nepotvrđeni oglasi
            </a>
          </li>
          <li class="nav-item">
            <a a class="nav-link" data-toggle="tab" href="#rezervacije" role="tab">
              Rezervacije
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="container-fluid tab-pane active" role="tabpanel" id="svi_oglasi">
            <div v-for="car in allCars" class="row profil-oglasi flex-center">
              <div class="col-12 d-flex justify-content-between">
                  <i data-toggle="modal" data-target="#deleteModal" aria-hidden="true" v-on:click="setDeleteCar(car.id)" class="option fas fa fa-times"></i>
                  <i data-toggle="modal" data-target="#editCarModal" aria-hidden="true" v-on:click="setEditCar(car)" class="option fas fa fa-edit"></i>
              </div>
              <h3 class="text-center col-12">{{ car.car_name }}</h3>
              <div class="col-12 col-lg-4 flex-center flex-column">
                <img :src="'../src/img/uploads/' + car.image" class="img-fluid" />
              </div>
              <div class="col-12 col-lg-8">
                <div class="row">
                  <p class="col-12 col-lg-6">
                    Marka : {{ car.brand }}<br>
                    Gorivo : {{ car.fuel }}<br>
                    Tip : {{ car.type }}<br>
                    Godina : {{ car.year_made}}<br>
                  </p>
                  <p class="col-12 col-lg-6">
                    Kilometraža : {{ car.mileage }}<br>
                    Snaga : {{ car.power }}<br>
                    Mjenjač : {{ car.transmission }}<br>
                    Cijena : {{ car.price }} KM/dan<br>
                  </p>
                  <p class="col-12">
                    Objavio : {{ getUserNameById(car.owner_id) }}<br>
                    Dana : {{ car.date_added }}
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid tab-pane" role="tabpanel" id="nepotvrdjeni">
            <div v-for="car in inactiveCars" class="row profil-oglasi flex-center">
              <div class="col-12 d-flex justify-content-between">
                  <i data-toggle="modal" data-target="#deleteModal" aria-hidden="true" v-on:click="setDeleteCar(car.id)" class="option fas fa fa-times"></i>
                  <i data-toggle="modal" data-target="#editCarModal" aria-hidden="true" v-on:click="setEditCar(car)" class="option fas fa fa-edit"></i>
                  <i data-toggle="modal" data-target="#confirmModal" aria-hidden="true" v-on:click="setConfirmCar(car.id)" class="option fas fa fa-check"></i>
              </div>
              <h3 class="text-center col-12">{{ car.car_name }}</h3>
              <div class="col-12 col-lg-4 flex-center flex-column">
                <img :src="'../src/img/uploads/' + car.image" class="img-fluid" />
              </div>
              <div class="col-12 col-lg-8">
                <div class="row">
                  <p class="col-12 col-lg-6">
                    Marka : {{ car.brand }}<br>
                    Gorivo : {{ car.fuel }}<br>
                    Tip : {{ car.type }}<br>
                    Godina : {{ car.year_made}}<br>
                  </p>
                  <p class="col-12 col-lg-6">
                    Kilometraža : {{ car.mileage }}<br>
                    Snaga : {{ car.power }}<br>
                    Mjenjač : {{ car.transmission }}<br>
                    Cijena : {{ car.price }} KM/dan<br>
                  </p>
                  <p class="col-12">
                    Objavio : {{ getUserNameById(car.owner_id) }}<br>
                    Dana : {{ car.date_added }}
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid tab-pane" role="tabpanel" id="rezervacije">
            <div v-for="reservation in allReservations" class="row profil-oglasi flex-center">
              <div class="col 12 d-flex justify-content-between">
                <i data-toggle="modal" data-target="#deleteContractModal" aria-hidden="true" v-on:click="setDeleteContract(reservation.contract.id)" class="option fas fa fa-times"></i>
              </div>
              <h3 class="text-center col-12">{{ reservation.car.car_name }}</h3>
              <div class="col-12 col-lg-4 flex-center flex-column">
                <img :src="'../src/img/uploads/' + reservation.car.image" class="img-fluid" />
              </div>
              <div class="col-12 col-lg-8">
                <div class="row">
                  <p class="col-12 col-lg-6">
                    Marka : {{ reservation.car.brand }}<br>
                    Gorivo : {{ reservation.car.fuel }}<br>
                    Tip : {{ reservation.car.type }}<br>
                    Godina : {{ reservation.car.year_made}}<br>
                  </p>
                  <p class="col-12 col-lg-6">
                    Kilometraža : {{ reservation.car.mileage }}<br>
                    Snaga : {{ reservation.car.power }}<br>
                    Mjenjač : {{ reservation.car.transmission }}<br>
                    Cijena : {{ reservation.car.price }} KM/dan<br>
                  </p>
                  <p class="col-12 col-lg-6">
                    Datum od : {{ reservation.contract.date_from }}<br>
                    Datum do : {{ reservation.contract.date_to }}<br>
                  </p>
                  <p class="col-12 col-lg-6">
                    Saldo : {{ reservation.contract.price }} KM<br>
                    Vlasnik : {{ getUserNameById(reservation.car.owner_id) }}<br>
                    Kupac : {{ getUserNameById(reservation.contract.buyer_id) }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
HTML;

echo $html;

require 'modals.php';
require 'footer.php';

?>