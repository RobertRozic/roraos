var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    search: '',
    users : [],
    cars: []
  },
  methods: {
  	getCars: function(){
  		var self = this;
  		$.get('../src/scripts/auta_JSON.php', function(data){
    		self.cars = data;
  		});
  	},
    getUser: function(){
      var self = this;
      $.get('../src/scripts/user_JSON.php', function(data){
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
  }
})