<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}


require 'functions.php';
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM tbl_mobil"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;

//   halaman =2 , halamaktif = 1, awaldata = 0,1,2
// halaman =1 ,  
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$mobil = query("SELECT * FROM tbl_mobil LIMIT $dataAwal, $jumlahDataPerHalaman");
if (isset($_POST["cari"])) {
  $mobil = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dealer Mobil</title>
  <link rel="stylesheet" href="carbook-master/css/style.css">
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
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="halaman.php">Dealer<span>Mobil</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>


      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="halaman.php" class="nav-link">Home </a></li>
          <li class="nav-item"><a href="tambah.php" class="nav-link">Tambah Data </a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php // ----------------------------------------------- 
  ?>
  <div class="hero-wrap ftco-degree-bg" style="background-image: url('carbook-master/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="col-lg-12">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-6">Dealer Mobil </h1>
            <p style="font-size: 18px;">Find a new car for good life </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php //------------------------------------------------------
  ?>
  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">

      <form method="POST" action="">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Kata Kunci" autocomplete="off">
        <button type="submit" name="cari">Cari Data </button>
      </form>
      <br>

      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <h2 class="mb-2">Pilih Mobil Favorit Anda</h2>
          <div class="row justify-content-center">
            <?php if ($halamanAktif > 1) : ?>
              <a style="margin:5px;" href="halaman.php?halaman=<?= $halamanAktif - 1; ?>">&lt</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
              <?php if ($i == $halamanAktif) : ?>
                <a class="a" style="margin:5px;font-weight:bold;color:maroon;" href=" halaman.php?halaman=<?= $i; ?>"><?= $i; ?>
                </a>
              <?php else : ?>
                <a style="margin:5px;a:hover:maroon;" href=" halaman.php?halaman=<?= $i; ?>"><?= $i; ?></a>
              <?php endif; ?>
            <?php endfor; ?>
            <?php if ($halamanAktif < $jumlahHalaman) : ?>
              <a style="margin:5px;" href="halaman.php?halaman=<?= $halamanAktif + 1; ?>"><i class="ion-ios-arrow-forward"></i></a>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="carousel">
              <div class="item">
                <div style="float:left; float:right;" class="car-wrap rounded ftco-animate">
                  <div id="text" class="text">
                    <?php foreach ($mobil as $mbl) : ?>
                      <h2 style="margin:20px;" class="mb-2"><?= $mbl["merk"]; ?></h2>
                      <div class="d-flex mb-3">
                        <div class="img rounded d-flex align-items-end">
                          <img src="img/<?= $mbl["gambar"]; ?>" width="225px">
                        </div>
                        <span class="cat"> <?= $mbl["warna"]; ?></span>
                        <p class="price">$<?= $mbl["harga"]; ?></p>
                      </div>
                      <form action="" method="post">
                        <p class="d-flex mb-0 d-block"><a href="beli.php?id=<?= $mbl["id"]; ?>" class="btn btn-primary py-2 mr-1">Beli Sekarang</a>
                          <a name="detail" href="details.php?id=<?= $mbl["id"]; ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                        </p>
                      </form>
                    <?php endforeach; ?>
                  </div>
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
            <h2 style="text-align:center;" class=" ftco-heading-2"><a href="" class="logo">Dealer<span>Mobil</span></a></h2>
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