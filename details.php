<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
require 'functions.php';
$id = $_GET["id"];
$mobil = query("SELECT * FROM tbl_mobil WHERE id = $id")[0];
$stock = query("SELECT * FROM tbl_stok WHERE id = $id")[0];

if (!isset($_GET["id"])) {
  header("Location: halaman.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dealer Mobil</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="carbook-master/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="carbook-master/css/animate.css">

  <link rel="stylesheet" href="carbook-master/css/owl.carousel.min.css">
  <link rel="stylesheet" href="carbook-master/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="carbook-master/css/magnific-popup.css">

  <link rel="stylesheet" href="carbook-master/css/aos.css">

  <link rel="stylesheet" href="carbook-master/css/ionicons.min.css">

  <link rel="stylesheet" href="carbook-master/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="carbook-master/css/jquery.timepicker.css">


  <link rel="stylesheet" href="carbook-master/css/flaticon.css">
  <link rel="stylesheet" href="carbook-master/css/icomoon.css">
  <link rel="stylesheet" href="carbook-master/css/style.css">
  <link rel="icon" type="image/png" href="img/download.png">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="halaman.php">Dealer<span>Mobil</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="halaman.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="tambah.php" class="nav-link">Tambah Data</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav -->

  <!-- ibarat jumbotron -->
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('carbook-master/images/image_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="halaman.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">
            <span>
              <li class="navbar-brand" style="display:block"><?= $mobil["merk"]; ?></li>
            </span>
          </h1>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section ftco-car-detailocalls">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="car-details">
            <div class="img rounded"><img class="img rounded" src="img/<?= $mobil["gambar"]; ?>">
            </div>
            <div class="text text-center">
              <h2>
                <span class="subheading"><?= $mobil["warna"]; ?></span>
                <li style="display:block;"><?= $mobil["merk"]; ?></li>
              </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
              <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                <div class="text">
                  <h3 class="heading mb-0 pl-3">
                    Jarak Tempuh
                    <li style="display:block;"><?= $mobil["kecepatan"]; ?> KM</li>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
              <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                <div class="text">
                  <h3 class="heading mb-0 pl-3">
                    Transmisi
                    <span>
                      <li style="display:block;"><?= $mobil["transmisi"]; ?></li>
                    </span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
              <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                <div class="text">
                  <h3 class="heading mb-0 pl-3">
                    <span>
                      <li style="display:block;"> <?= $mobil["duduk"]; ?> Seats </li>
                    </span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
              <div class="d-flex mb-3 align-items-center">
                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                <div class="text">
                  <h3 style="margin-top:-5px;" class="heading mb-0 pl-3">
                    Stock <br>
                    <span><?= $stock["jumlah"]; ?> Pcs</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 pills">
          <div class="bd-example bd-example-tabs">
            <div class="d-flex justify-content-center">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a style="margin-top:-60px;margin-left:-6px;" href="beli.php?id=<?= $id; ?>" class="btn btn-primary py-2 mr-1">Beli Sekarang</a>
                  <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                </li>
              </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="features">
                      <li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Music</li>
                    </ul>
                  </div>
                  <div class="col-md-4">
                    <ul class="features">
                      <li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
                      <li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Water</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
                      <li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
                    </ul>
                  </div>
                  <div class="col-md-4">
                    <ul class="features">
                      <li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
                      <li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 style="text-align:center;" class=" ftco-heading-2"><a href="#" class="logo">Dealer<span>Mobil</span></a></h2>
            <p style="text-align:center;">Memberikan pelayanan yang berkualitas dan menyediakan mobil yang super berkualitas.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script> <small>Iqbal Sonata</small>
          </p>
        </div>
      </div>
    </div>
  </footer>



  <script src="carbook-master/js/jquery.min.js"></script>
  <script src="carbook-master/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="carbook-master/js/popper.min.js"></script>
  <script src="carbook-master/js/bootstrap.min.js"></script>
  <script src="carbook-master/js/jquery.easing.1.3.js"></script>
  <script src="carbook-master/js/jquery.waypoints.min.js"></script>
  <script src="carbook-master/js/jquery.stellar.min.js"></script>
  <script src="carbook-master/js/owl.carousel.min.js"></script>
  <script src="carbook-master/js/jquery.magnific-popup.min.js"></script>
  <script src="carbook-master/js/aos.js"></script>
  <script src="carbook-master/js/jquery.animateNumber.min.js"></script>
  <script src="carbook-master/js/bootstrap-datepicker.js"></script>
  <script src="carbook-master/js/jquery.timepicker.min.js"></script>
  <script src="carbook-master/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="carbook-master/js/google-map.js"></script>
  <script src="carbook-master/js/main.js"></script>
</body>

</html>