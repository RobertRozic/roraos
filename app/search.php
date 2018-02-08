<?php
require 'session.php';

require 'header.php';

$search_text = '';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET['search'])) {
		$search_text = $_GET['search'];
	}
}

require 'navbar.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid dashboard-main flex-center flex-column">
		<div class="row d-flex justify-content-center dashboard">
			<div class="col-10 col-md-10 d-flex flex-column align-items-center blue-panel">
				<div class="row" id="oglasi">
					<div v-for="car in filterCars" class="col-12 col-md-6 col-lg-3 flex-center flex-column oglas">
						<div>
							<img :src="'../src/img/uploads/' + car.image" class="img-fluid">
							<h3>{{ car.car_name }}</h3>
							<p> 
								Marka : {{ car.brand }}<br>
								Gorivo : {{ car.fuel }}<br>
								Tip : {{ car.type }}<br>
								Godina proizvodnje : {{ car.year_made}}<br>
								Kilometraža : {{ car.mileage }}<br>
								Snaga : {{ car.power }} KS<br>
								Mjenjač : {{ car.transmission }}<br>
								Cijena : {{ car.price }} KM/dan<br>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var search_text = '$search_text';
	</script>
HTML;

echo $html;

require 'footer.php';

?>
