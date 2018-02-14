if(!search_text){
  var search_text = '';
}

var byName = function (a, b){
  return a.car_name.localeCompare(b.car_name);
};

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    search: search_text,
    users : [],
    cars: [],
    inactiveCars: [],
    contracts: [],
    editCar: {},
    confirmCarId: undefined,
    deleteCarId: undefined,
    deleteContractId: undefined
  },
  methods: {
    getCars: function(){
      var self = this;
      $.get('../src/scripts/cars_JSON.php', function(data){
        self.cars = data;
      });
    },
    getInactiveCars: function(){
      var self = this;
      $.get('../src/scripts/inactive_cars_JSON.php', function(data){
        self.inactiveCars = data;
      });
    },
    getUsers: function(){
      var self = this;
      $.get('../src/scripts/users_JSON.php', function(data){
        self.users = data;
      });
    },
    getContracts: function(){
      var self = this;
      $.get('../src/scripts/contracts_JSON.php', function(data){
        self.contracts = data;
      });
    },
    setEditCar: function(car){
      this.editCar = car;
    },
    setConfirmCar: function(id){
      this.confirmCarId = id;
    },
    setDeleteCar: function(id){
      this.deleteCarId = id;
    },
    setDeleteContract: function(id){
      this.deleteContractId = id;
    },
    getUserNameById: function(owner_id){
      var owner;
      this.users.forEach(function(user){
        if(user.id == owner_id){
          owner = user;
        }
      })
      return owner.first_name + ' ' + owner.last_name;
    }
  },
  computed: {
    filterCars() {
      return this.cars.filter(car => {
        return car.car_name.toLowerCase().includes(this.search.toLowerCase())
      }).sort(byName);
    },
    myCars() {
      return this.cars.filter(car =>{
        return car.owner_id == userId;
      }).sort(byName);
    },
    sponsored() {
      return this.cars.filter(car =>{
        return car.sponsored == 1;
      }).sort(byName);
    },
    myReservations() {
        var reservations = [];
        var myContracts = this.contracts.filter(contract =>  {
          return contract.buyer_id == userId;
        })
        var self = this;
        myContracts.forEach(function(contract){
          var reservation = {
            contract: contract,
            car: self.cars.find(function(car){
              return car.id == contract.car_id;
            })
          }
          reservations.push(reservation);
        })
        return reservations;
    },
    myReceivedReservations(){
      var reservations = [];
      var myCars = this.cars.filter(car =>{
          return car.owner_id == userId;
        }).sort(byName);
      var self = this;
      myCars.forEach(function(car) {
        self.contracts.forEach(function(contract){
          if(contract.car_id == car.id){
            var reservation = {
              contract: contract,
              car : car
            }
            reservations.push(reservation);
          };
        });
      });
      return reservations;
    },
    inactiveCars(){
      return this.inactiveCars.sort(byName);
    },
    allCars(){
      return this.cars.sort(byName);
    },
    allReservations(){
      var reservations = [];
      var self = this;
      this.contracts.forEach(function(contract){
        var reservation = {
          contract: contract,
          car: self.cars.find(function(car){
            return car.id == contract.car_id;
          })
        }
        reservations.push(reservation);
      })
      return reservations;
    }
  },
  created() {
    this.getCars();
    this.getInactiveCars();
    this.getUsers();
    this.getContracts();
  }
});

$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});