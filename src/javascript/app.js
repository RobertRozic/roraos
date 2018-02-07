if(search_text){
  var search_text = '';
}

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
  		});
  	},
    myCars() {
      return this.cars.filter(car =>{
        return car.owner_id == userId;
      });
    }
  },
  beforeMount() {
  	this.getCars();
    this.getUsers();
  }
})