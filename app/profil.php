<?php
require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
  <div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
    <div class="row justify-content-center dashboard">
      <div class="col-10 col-lg-3 wrapper" id="myprofile">
        <div class="d-flex flex-row justify-content-between" id="options">
          <a href="login/logout.php">
            <i aria-hidden="true" class="fas fa-2x fa-sign-out-alt option-dark"></i>
          </a>
          <a href="editForm.php">
            <i aria-hidden="true" class="fas fa-2x fa-edit option-dark"></i>
          </a>
          <a href="admin.php" v-if="'{$account_type}' == 'admin'">
            <i aria-hidden="true" class="fas fa-2x fa-cog option-dark"></i>
          </a>
        </div>
        <div class="flex-center flex-column">
          <img src="../src/img/blank-profile.png" class="img-fluid">
        </div>
        <h5 class="text-center">$name</h5>
        <p id="profile-details">
          <i aria-hidden="true" class="fas fa-envelope"></i> $email<br>
          <i aria-hidden="true" class="fas fa-home"></i> $address<br>
          <i aria-hidden="true" class="fas fa-phone"></i> +387$phone<br>
        </p>
        <div class="row profil-oglasi flex-center flex-column add-car" data-toggle="modal" data-target="#myModal">
          <h2>Dodajte oglas</h2>
          <i class="fas fa-2x fa-plus-circle button-add"></i>
        </div>
      </div>
        <div class="col-10 col-lg-7 wrapper" id="myprofileblue">
            <ul class="nav nav-tabs nav-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profil_oglasi" role="tab">
                  Moji oglasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#izlazne" role="tab">
                  Izlazne rezervacije
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#ulazne" role="tab">
                  Ulazne rezervacije
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link disabled">
                  Dojmovi
                </a>
              </li>
            </ul>
          <div class="tab-content">
            <div class="container-fluid tab-pane active" role="tabpanel" id="profil_oglasi">
                <div v-for="car in myCars" class="row profil-oglasi flex-center">
                  <div class="col 12 d-flex justify-content-between">
                     <i data-toggle="modal" data-target="#deleteModal" aria-hidden="true" v-on:click="setDeleteCar(car.id)" class="option fas fa fa-times"></i>
                     <i data-toggle="modal" data-target="#editCarModal" aria-hidden="true" v-on:click="setEditCar(car)" class="option fas fa fa-edit"></i>
                  </div>
                  <h3 class="text-center col-12">{{ car.car_name }}</h3>
                  <div class="col-12 col-lg-4 flex-center flex-column">
                    <img :src="'../src/img/uploads/' + car.image" class="img-fluid" />
                  </div>
                  <p class="col-12 col-lg-4">
                    Marka : {{ car.brand }}<br>
                    Gorivo : {{ car.fuel }}<br>
                    Tip : {{ car.type }}<br>
                    Godina : {{ car.year_made}}<br>
                  </p>
                  <p class="col-12 col-lg-4">
                    Kilometraža : {{ car.mileage }}<br>
                    Snaga : {{ car.power }}<br>
                    Mjenjač : {{ car.transmission }}<br>
                    Cijena : {{ car.price }} KM/dan<br>
                  </p>
                </div>
            </div>
            <div class="container-fluid tab-pane" role="tabpanel" id="izlazne">
                <div v-for="reservation in myReservations" class="row profil-oglasi flex-center">
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
                        Vlasnik : {{ getUserNameById(reservation.car.owner_id) }} 
                      </p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="container-fluid tab-pane" role="tabpanel" id="ulazne">
                <div v-for="reservation in myReceivedReservations" class="row profil-oglasi flex-center">
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
                        Rezervirao : {{ getUserNameById(reservation.contract.buyer_id) }}
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
