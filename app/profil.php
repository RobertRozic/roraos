<?php
require 'session.php';

require 'header.php';

require 'navbar.php';

$html = '';

$html .= <<<HTML
        <div class="container-fluid dashboard-main d-flex flex-column justify-content-center align-items-center">
        <div class="row justify-content-center dashboard">
            <div class="col-10 col-lg-3 wrapper" id="myprofile">
                <div class="d-flex flex-row justify-content-between" id="options">
                    <a href="login/logout.php">
                        <i aria-hidden="true" class="fas fa-2x fa-sign-out-alt option"></i>
                    </a>
                    <a href="editForm.php">
                        <i aria-hidden="true" class="fas fa-2x fa-edit option"></i>
                    </a>
                </div>
                <div class="flex-center flex-column">
                    <img src="../src/img/blank-profile.png" class="img-fluid">
                </div>
                <h5 class="text-center">$name</h5>
                <p id="profile-details">
                    <i aria-hidden="true" class="fas fa-envelope option"></i> $email<br>
                    <i aria-hidden="true" class="fas fa-home option"></i> $address<br>
                    <i aria-hidden="true" class="fas fa-phone option"></i> +387$phone<br>
                </p>
            </div>
            <div class="col-10 col-lg-7 flex-center flex-column wrapper" id="myprofileblue">
                <div id="myprofileblue_top">
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Moji oglasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Aktivne rezervacije</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Povijest</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Dojmovi</a>
                        </li>
                    </ul>
                </div>
                <div class="container-fluid" >
                    <div v-for="car in myCars" class="row profil-oglasi flex-center">
                        <h3 class="text-center col-12">{{ car.car_name }}</h3>
                        <div class="col-12 col-lg-4 flex-center flex-column">
                            <img src="../src/img/audi.jpg" class="img-fluid" />
                        </div>
                        <p class="col-12 col-lg-4">
                                Marka : {{ car.brand }}<br>
                                Gorivo : {{ car.fuel }}<br>
                                Tip : {{ car.type }}<br>
                                Godina : {{ car.year_made}}<br>
                        </p>
                        <p class="col-12 col-lg-4">
                                Kilometraža : {{ car.mileage }}<br>
                                Snaga : {{ car.power }}<br>
                                Mjenjač : {{ car.transmission }}<br>
                                Cijena : {{ car.price }} KM/dan<br>
                        </p>
                    </div>
                    <div class="row profil-oglasi flex-center flex-column add-car">
                        <h2>Dodajte oglas</h2>
                        <i class="fas fa-2x fa-plus-circle button-add"></i>
                    </div>
                 </div>
            </div>
        </div>
        </div>

<template id="oglas">

</template>

HTML;

echo $html;

require 'footer.php';

?>
