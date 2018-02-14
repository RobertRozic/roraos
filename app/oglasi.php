        <div class="row" id="oglasi">
          <div class="card oglas col-12 col-md-6 col-lg-3 flex-center flex-column" v-for="car in filterCars">
            <img class="card-img-top" :src="'../src/img/uploads/' + car.image" alt="Card image cap">
            <div class="card-block">
              <h4 class="card-title">{{ car.car_name }}</h4>
              <p class="card-text">
                Marka : {{ car.brand }}<br>
                Gorivo : {{ car.fuel }}<br>
                Tip : {{ car.type }}<br>
                Godina proizvodnje : {{ car.year_made}}<br>
                Kilometraža : {{ car.mileage }}<br>
                Snaga : {{ car.power }} KS<br>
                Mjenjač : {{ car.transmission }}<br>
                Cijena : {{ car.price }} KM/dan<br>
                Vlasnik : {{ app.getUserNameById(car.owner_id) }}<br>
                Objavljeno : {{ car.date_added }}
              </p>
              <button class="btn btn-primary" v-on:click = "updatePrice(car.price); updateCar(car.id)" data-toggle="modal" data-target="#myModal">Rezerviraj</button>
            </div>
          </div>
        </div>