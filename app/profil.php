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
          <div id="myprofileblue_top">
            <ul class="nav nav-tabs nav-fill" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profil_oglasi" role="tab">
                  Moji oglasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#aktivne" role="tab">
                  Aktivne rezervacije
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link disabled">
                  Dojmovi
                </a>
              </li>
            </ul>
          </div>
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
            <div class="container-fluid tab-pane active" role="tabpanel" id="aktivne">
                <div v-for="reservation in myReservations" class="row profil-oglasi flex-center">
                  <div class="col 12 d-flex justify-content-between">
                     <i data-toggle="modal" data-target="#deleteContractModal" aria-hidden="true" v-on:click="setDeleteContract(reservation.contract.id)" class="option fas fa fa-times"></i>
                  </div>
                  <h3 class="text-center col-12">{{ reservation.car.car_name }}</h3>
                  <div class="col-12 col-lg-4 flex-center flex-column">
                    <img :src="'../src/img/uploads/' + reservation.car.image" class="img-fluid" />
                  </div>
                  <p class="col-12 col-lg-4">
                    Marka : {{ reservation.car.brand }}<br>
                    Gorivo : {{ reservation.car.fuel }}<br>
                    Tip : {{ reservation.car.type }}<br>
                    Godina : {{ reservation.car.year_made}}<br>
                  </p>
                  <p class="col-12 col-lg-4">
                    Kilometraža : {{ reservation.car.mileage }}<br>
                    Snaga : {{ reservation.car.power }}<br>
                    Mjenjač : {{ reservation.car.transmission }}<br>
                    Cijena : {{ reservation.car.price }} KM/dan<br>
                  </p>
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
        <h5 class="modal-title">Ispunite podatke</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column justify-content-center">
        <form class="d-flex flex-column roraos-form" method="post" action="../src/scripts/addCar.php" autocomplete="off" id="car-form" enctype="multipart/form-data">
          <div>
            <label>Ime automobila:</label>
            <input type="text" name="car_name" required>
          </div>
          <div>
            <label>Marka automobila:</label>
            <input type="text" name="brand" required>
          </div>
          <div class="justify-content-center radio-roraos">
            <label>Gorivo:</label>
            <input type="radio" name="fuel" value="diesel" required>Diesel
            <input type="radio" name="fuel" value="petrol" required>Benzin
          </div>
          <div>
            <label>Tip:</label>
            <select id="type" name="type">
              <option value="sedan">Sedan</option>
              <option value="cabrio">Kabriolet</option>
              <option value="sportback">Sportback</option>
              <option value="coupe">Coupe</option>
              <option value="karavan">Karavan</option>
            </select>
          </div>
          <div>
            <label>Godina:</label>
            <select class="year" name="year"></select>
          </div>
          <div>
            <label>Kilometraža:</label>
            <input type="text" name="mileage" required>
          </div>
          <div>
            <label>Konjskih snaga:</label>
            <input type="text" name="power" required>
          </div>
          <div class="justify-content-center radio-roraos">
            <label>Mjenjač</label>
            <input type="radio" name="transmission" value="manual" required>Manualni
            <input type="radio" name="transmission" value="automatic" required>Automatik
          </div>
          <div>
            <label>Cijena/Dan:</label>
            <input type="text" name="price" required>
          </div>  
          <div class="roraos-file">
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary">
                      Slika auta&hellip; <input type="file" id="fileToUpload" name="fileToUpload" required style="display: none;">
                  </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
          </div>
          <button type="submit" class="hide-button"></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="submit_btn" name="submit" onclick="addCar()">Potvrdi</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade roraos-modal" id="editCarModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content form_wrapper">
      <div class="modal-header">
        <h5 class="modal-title">Ispunite podatke</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column justify-content-center">
        <form class="d-flex flex-column roraos-form" method="post" action="../src/scripts/editCar.php" autocomplete="off" id="edit-car-form" enctype="multipart/form-data">
          <div>
            <label>Ime automobila:</label>
            <input type="text" name="car_name" :value="editCar.car_name" required>
          </div>
          <div>
            <label>Marka automobila:</label>
            <input type="text" name="brand" :value="editCar.brand" required>
          </div>
          <div class="justify-content-center radio-roraos">
            <label>Gorivo:</label>
            <input type="radio" name="fuel" value="diesel" v-model="editCar.fuel" required>Diesel
            <input type="radio" name="fuel" value="petrol" v-model="editCar.fuel" required>Benzin
          </div>
          <div>
            <label>Tip:</label>
            <select id="type" name="type" :value="editCar.type">
              <option value="sedan">Sedan</option>
              <option value="cabrio">Kabriolet</option>
              <option value="sportback">Sportback</option>
              <option value="coupe">Coupe</option>
              <option value="karavan">Karavan</option>
            </select>
          </div>
          <div>
            <label>Godina:</label>
            <select class="year" name="year" :value="editCar.year_made"></select>
          </div>
          <div>
            <label>Kilometraža:</label>
            <input type="text" name="mileage" :value="editCar.mileage" required>
          </div>
          <div>
            <label>Konjskih snaga:</label>
            <input type="text" name="power" :value="editCar.power" required>
          </div>
          <div class="justify-content-center radio-roraos">
            <label>Mjenjač</label>
            <input type="radio" name="transmission" value="manual" v-model="editCar.transmission" required>Manualni
            <input type="radio" name="transmission" value="automatic" v-model="editCar.transmission" required>Automatik
          </div>
          <div>
            <label>Cijena/Dan:</label>
            <input type="text" name="price" :value="editCar.price" required>
          </div>  
          <div class="roraos-file">
              <div class="input-group">
                <label class="input-group-btn">
                  <span class="btn btn-primary">
                      Nova slika auta&hellip;
                      <input type="file" id="fileToUpload" name="fileToUpload" style="display: none;">
                  </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
          </div>
          <input type="hidden" name="car_id" :value="editCar.id">
          <button type="submit" class="hide-button"></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="submit_btn" name="submit" onclick="editCar()">Potvrdi</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade roraos-modal" tabindex="-1" role="dialog" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Potvrda uklanjanja oglasa</h5>
            </div>
            <div class="modal-body">
              <p>Jeste li sigurni da želite ukloniti ovaj oglas?</p>
              <form class="d-flex flex-column roraos-form" method="post" action="../src/scripts/deleteCar.php" autocomplete="off" id="delete-car-form">
              <input type="hidden" name="delete_id" :value="deleteCarId">
              <button type="submit" class="hide-button"></button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" onclick="deleteCar()">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade roraos-modal" tabindex="-1" role="dialog" id="deleteContractModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Potvrda uklanjanja rezervacije</h5>
            </div>
            <div class="modal-body">
              <p>Jeste li sigurni da želite ukloniti rezervaciju?</p>
              <form class="d-flex flex-column roraos-form" method="post" action="../src/scripts/deleteContract.php" autocomplete="off" id="delete-contract-form">
              <input type="hidden" name="delete_contract" :value="deleteContractId">
              <button type="submit" class="hide-button"></button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" onclick="deleteContract()">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
  var addCar = function () {
    $("#car-form").find('[type="submit"]').trigger('click');
  }

  var editCar = function () {
    $("#edit-car-form").find('[type="submit"]').trigger('click');
  }

  var deleteCar = function () {
    $("#delete-car-form").find('[type="submit"]').trigger('click');
  }

  var deleteContract = function () {
    $("#delete-contract-form").find('[type="submit"]').trigger('click');
  }

  var end = 1930;
  var start = new Date().getFullYear();
  var options = "";
  for(var year = start ; year >= end; year--){
   options += "<option>"+ year +"</option>";
  }
  var input_year = document.getElementsByClassName("year")
  for(var i = 0; i < input_year.length; i++){
    input_year[i].innerHTML = options;
  }

</script>
HTML;

echo $html;

require 'footer.php';

?>
