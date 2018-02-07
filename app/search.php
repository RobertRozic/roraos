<?php
require 'session.php';

require 'header.php';

$search_text = '';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET['search-text'])) {
		$search_text = $_GET['search'];
	}
}

require 'navbar.php';

$html = '';

$html .= <<<HTML
	<div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center" id="search-oglasi">
		<div class="row d-flex justify-content-center dashboard">
			<div class="col-10 col-md-10 d-flex flex-column align-items-center blue-panel">
				<div class="row" id="oglasi">
					<div v-for="car in filterCars" class="col-12 col-md-3 flex-center flex-column oglas">
						<div>
							<h3>{{ car.car_name }}</h3>
							<p> 
								Marka : {{ car.brand }}<br>
								Gorivo : {{ car.fuel }}<br>
								Tip : {{ car.type }}<br>
								Godina proizvodnje : {{ car.year_made}}<br>
								Kilometraža : {{ car.mileage }}<br>
								Snaga : {{ car.power }}<br>
								Mjenjač : {{ car.transmission }}<br>
								Cijena : {{ car.price }} KM/dan<br>
								<br>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
HTML;

echo $html;

require 'footer.php';

?>
