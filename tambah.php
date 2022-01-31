<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
require 'functions.php';
if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "
    <script>
    alert('Data Berhasil Ditambahkan..!!');
    document.location.href='halaman.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Data Gagal Ditambahkan...!!');
    document.location.href='halaman.php';
    </script>
    ";
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
  <link rel="icon" type="image/png" href="img/download.png">
  <link href="navbar/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="halaman.php">DealerMobil</a>
      <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="halaman.php">Home</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="tambah.php">Tambah Data</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <h1 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tambah Data Mobil</h1>
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-floating mb-3">
          <input type="text" name="merk" id="merk" placeholder="Merk Mobil">
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Mobil">
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="warna" id="warna" placeholder="Masukkan Warna Mobil">
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="kecepatan" id="kecepatan" placeholder="Masukkan Jarak Tempuh Mobil">
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="transmisi" id="tranmisi" placeholder="Masukkan Tranwmisi Mobil">
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="duduk" id="duduk" placeholder="Masukkan Seats Mobil">
        </div>
        <label for="gambar" style="color:lightskyblue;font-size:18px;font-family:Copperplate Gothic Bold;">Gambar :</label>
        <div class=" form-floating mb-3">
          <input style="margin-left:100px;" type="FILE" name="gambar" id="gambar" placeholder="Masukkan Gambar Mobil">
        </div>

        <div class="text-center mt-4">
          <button class="btn btn-xl btn-outline-light" type="submit" name="submit" id="submit">Tambah Data</button>
        </div>
      </form>

      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>

      <p class="masthead-subheading font-weight-light mb-0">DEALER MOBIL</p>
    </div>
  </header>


  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4"></h4>
          <p class="lead mb-0">
          </p>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0 text-center">
          <h4 class="text-uppercase mb-4">Alamat</h4>
          <p class="lead mb-0">
            Sebanga, Gang Nangka
            <br />
            Indonesia
          </p>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; Iqbal Sonata <script>
          document.write(new Date().getFullYear());
        </script> </small></div>
  </div>



</body>

</html>