var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    search: '',
    cars: []
  },
  methods: {
  	getCars: function(){
  		var self = this;
  		$.get('../src/scripts/auta_JSON.php', function(data){
    		self.cars = data;
  		});
  	}
  },
  computed: {
  	filterCars() {
  		return this.cars.filter(car => {
  			return car.brand.toLowerCase().includes(this.search.toLowerCase())
  		})
  	}
  },
  beforeMount() {
  	this.getCars();
  }
})