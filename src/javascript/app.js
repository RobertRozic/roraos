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
    cars: []
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
})