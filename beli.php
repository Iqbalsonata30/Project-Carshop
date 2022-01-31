<?php
require 'functions.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
$id = $_GET["id"];
$mobil = query("SELECT * FROM tbl_mobil WHERE $id = id")[0];
if (isset($_POST["beli"])) {
  if (beli($_POST) > 0) {
    echo "
    <script>
      alert('Pembelian Berhasil');
      document.location.href='halaman.php';
    </script>";
  } else {
    echo "
    <script>
      alert('Pembelian Gagal');
      document.location.href='halaman.php';
    </script>";
  }
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
  <link rel="icon" type="image/png" href="img/download.png">
  <link rel="stylesheet" href="carbook-master/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id=" ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="halaman.php">Dealer<span>Mobil</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="halaman.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="tambah.php" class="nav-link">Tambah Data</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="hero-wrap ftco-degree-bg" data-stellar-background-ratio="0.5"><img class="hero-wrap ftco-degree-bg" src="img/<?= $mobil["gambar"]; ?>">
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

  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12	featured-top">
          <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center">
              <form action="" method="POST" class="request-form ftco-animate bg-primary">
                <h2>Info Pembelian Mobil </h2>
                <div class="form-group">
                  <label for="mobil" class="label">Nama Mobil :</label>
                  <input type="text" class="form-control" name="merk" id="mobil" style="font-weight:bold;font-size:14px;" value="<?= $mobil["merk"]; ?>">
                </div>
                <div class=" form-group">
                  <label for="warna" class="label"> Warna :</label>
                  <input type="text" class="form-control" name="warna" id="warna" style="font-weight:bold;font-size:14px;" value="<?= $mobil["warna"]; ?>" disabled>
                </div>
                <div class=" form-group">
                  <label for="jumlah" class="label">Jumlah :</label>
                  <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Pembelian" required>
                </div>
                <div class="form-group">
                  <label for="nama" class="label">Nama Lengkap :</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Full Name" autofocus required>
                </div>
                <div class="form-group">
                  <label for="email" class="label">Email :</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="alamat" class="label">Alamat Anda</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                </div>
                <div class="d-flex">
                  <div class="form-group mr-2">
                    <label for="kota" class="label">Kota</label>
                    <input type="text" class="form-control" name="kota" id="kota" placeholder="Masukkan Kota">
                  </div>
                  <div class="form-group ml-2">
                    <label for="kodepos" class="label">Kode Pos</label>
                    <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Masukkan Kode Pos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nohp" class="label">No Handphone :</label>
                  <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Masukkan No Handphone" required>
                </div>

                <div class="form-group">
                  <button type="submit" name="beli" class="btn btn-secondary py-3 px-4">Beli Sekarang</button>
                </div>

              </form>
            </div>
            <div class="col-md-8 d-flex align-items-center">
              <div class="services-wrap rounded-right w-100">
                <h3 class="heading-section mb-4">Find a Perfect Cars for a Good Life</h3>
                <div class="row d-flex mb-4">
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Cepat Sampai Ke Tujuan</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Saling Mengutungkan</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Mobil Yang Berkualitas</h3>
                      </div>
                    </div>
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
            <h2 style="text-align:center;" class=" ftco-heading-2"><a href="#" class="logo">Dealer<span>Mobil</span></a>
            </h2>
            <p style="text-align:center;">Memberikan pelayanan yang berkualitas dan menyediakan mobil yang super
              berkualitas.</p>
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