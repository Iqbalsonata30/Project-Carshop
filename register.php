<?php
require 'functions.php';
if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "
    <script>
    alert('User berhasil dibuat!!');
    document.location.href='index.php';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
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
  <link rel="Stylesheet" href="colorlib-regform-5/css/main.css">
  <link href="colorlib-regform-5/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="colorlib-regform-5/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="colorlib-regform-5/vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="colorlib-regform-5/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
  <link rel="text/css" href="register.css">
  <link rel="icon" type="image/png" href="img/download.png">

<body>
  <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
      <div class="card card-5">
        <div class="card-heading">
          <h2 class="title">Register</h2>
        </div>
        <div class=" card-body">
          <form method="POST" action="">
            <div class="form-row m-b-55">
              <div class="name">Username :</div>
              <div class="value">
                <div class="row row-space">
                  <div class="col-2">
                    <div class="input-group-desc">
                      <input class="input--style-5" type="text" name="username" id="username" placeholder="Username">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="name">Password:</div>
              <div class="value">
                <div class="row row-space">
                  <div class="col-2">
                    <div class="input-group-desc">
                      <input class="input--style-5" type="password" name="password" id="password" placeholder="Password">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="name">Konfirmasi Password:</div>
              <div class="value">
                <div class="row row-space">
                  <div class="col-2">
                    <div class="input-group-desc">
                      <input class="input--style-5" style=margin-top:5px; type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <button class="btn btn--radius-2 btn--red" style=margin-top:10px; type="submit" name="register" id="submit">Register</button>
            </div>
          </form>
          <div class="form-row p-t-20">
            <label style="text-align:center;" class=" label label--block"> <a style="text-decoration: none;color:#555;" href="index.php">Kembali ke Login</a></label>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="colorlib-regform-5/vendor/jquery/jquery.min.js"></script>
  <!-- colorlib-regform-5/Vendor JS-->
  <script src="colorlib-regform-5/vendor/select2/select2.min.js"></script>
  <script src="colorlib-regform-5/vendor/datepicker/moment.min.js"></script>
  <script src="colorlib-regform-5/vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="colorlib-regform-5/js/global.js"></script>

</body>

</html>