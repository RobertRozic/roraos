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

<div class="modal fade roraos-modal" tabindex="-1" role="dialog" id="confirmModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Potvrda oglasa</h5>
            </div>
            <div class="modal-body">
              <p>Jeste li sigurni da želite omogućiti ovaj oglas?</p>
              <form class="d-flex flex-column roraos-form" method="post" action="../src/scripts/confirmCar.php" autocomplete="off" id="confirm-car-form">
              <input type="hidden" name="confirm_id" :value="confirmCarId">
              <button type="submit" class="hide-button"></button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary btn-ok" onclick="confirmCar()">Yes</a>
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

  var confirmCar = function () {
    $("#confirm-car-form").find('[type="submit"]').trigger('click');
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