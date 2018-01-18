<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Automobili</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/main.css" type="text/css">
  </head>
  <body>
    <nav id="myNavbar" class="navbar fixed-top navbar-expand-md navbar-inverse">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item option"><a class="nav-link" href="#home">Naslovnica</a></li>
          <li class="nav-item option"><a class="nav-link" href="#about">O nama</a></li>
          <li class="nav-item option"><a class="nav-link" href="#contact">Kontakt</a></li>
          <li class="nav-item option"><a class="nav-link" href="./login.php">Prijava</a></li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">

      <section id="home" class="row d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center">RoRaOs.ba</h1>
        <p class="text-center">Mi Vas pokrećemo!</p>
        <a href="app/public/index.php"><button type="button" class="start" name="button">Registracija</button></a>
      </section>

      <section id="about">
        <h2 class="text-center">O nama</h2>
        <p class="text-center">Povezujemo Vas s drugim ljudima i njihovim automobilima. Bilo kada i bilo gdje Vam dajemo mogućnost da iznajmite automobil drugih korisnika ili pak da njima iznajmite svoj i tako zaradite nešto dodatnog novca!</p>
        <div class="columns row">
          <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center">
            <i class="fa fa-3x fa-car about_icon"></i>
            <p class="text-justify">Na našoj stranici će te pronaći raznovrstan izbor automobila koje u svakom trenutku mođete iznajmiti i koristiti. Isto tako, omogućili smo i Vama da vlastiti automobil iznajmite drugima u vrijeme kada ga ne koristite i tako profitirate. Izbor automobila seže od malih gradskih auta, preko terenaca, do luksuznih limuzina. Povezujemo i pokrećemo ljude na vrlo jednostavan i bezbolan način. U samo nekoliko klikova i par unešenih podataka možete postati koristnik naših usluga!
          </div>
          <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center">
            <i class="fa fa-3x fa-list about_icon"></i>
            <p class="text-justify">
			<h2>F.A.Q.</h2>
				<ul>
					<li>Kako se mogu prijavit na vašu stranicu?</li>
					<li>Vrlo jednostavno. Gumb za prijavu vas čeka na samoj naslovnici. Kroz daljnji proces registracije ćemo vas postepeno voditi nakon što ga kliknete!</li>
					<br/>
					<li>Koliko će me registracija i korištenje vaših usluga koštati?</li>
					<li>Sve naše usluge su potpuno besplatne za korisnike!</li>
					<br/>
					<li>Čini se jednostavno. Je li par klikova stvarno sve što mi je potrebno?</li>
					<li>Naravno, u samo 10 minuta možete početi koristiti našu stranicu. Iznajmiti vozila od drugih, i iznajmljivati Vaše vozilo drugima!</li>
					<br/>
				<ul>
              </p>
          </div>
          <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center">
            <i class="fa fa-3x fa-usd about_icon"></i>
            <p class="text-justify">Nema potrebe da se brinete za Vaš novac! Plaćanje dogovarate s osobom kod koje automobil iznajmljujete. Tako ste sigurni da Vaš novac nitko neće uzeti preko interneta. Mi Vam dajemo račun i osiguranje u online formatu, te isti taj račun šaljemo drugoj strani. Na taj način ste osigurani da je cijena koju vidite na našoj stranici ona koju će te zapravo i platiti!
              </p>
          </div>
        </div>
      </section>

      <section id="contact">
          <h2 class="text-center text-white">Kontaktirajte nas</h2>
          <div class="row d-flex flex-row justify-content-center align-items-stretch">
            <div class="col-12 col-md-6 contact_info text-white">
                Telefon:<br>
                +387 63 123 456<br><br>
                Mobitel:<br>
                +387 63 123 456<br><br>
                Email:<br>
                kontakt@automobili.ba<br><br>
                Adresa<br>
                Neka ulica u Mostaru bb, 88 000 Mostar
            </div>

            <iframe class="col-12 col-md-6 map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1450.6378487836903!2d17.79208444744115!3d43.35034338999815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sba!4v1508950177271" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
      </section>
    </div>
    <script src="https://use.fontawesome.com/f1e7ae096d.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/index.js"></script>
  </body>
</html>
