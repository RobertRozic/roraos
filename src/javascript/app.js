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
    editCar: {}
  },
  methods: {
    getCars: function(){
      var self = this;
      $.get('../src/scripts/cars_JSON.php', function(data){
        self.cars = data;
      });
    },
    getUsers: function(){
      var self = this;
      $.get('../src/scripts/users_JSON.php', function(data){
        self.users = data;
      });
    },
    setEditCar: function(car){
      this.editCar = car;
      console.log(car);
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
    }
  },
  beforeMount() {
    this.getCars();
    this.getUsers();
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