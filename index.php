<?php
session_start();
require 'functions.php';

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  if ($key == hash('crc32', $row["username"])) {
    $_SESSION["login"] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: halaman.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result =  mysqli_query($conn, "SELECT * FROM tbl_user WHERE username ='$username'");
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;

      if (isset($_POST["remember"])) {
        setcookie('id', $row["id"], time() + 3600);
        setcookie('key', hash('crc32', $row["username"]), time() + 3600);
      }
      header("Location: halaman.php");
      exit;
    } else {
      $error = true;
    }
  }
  if (mysqli_num_rows($result) == 0) {
    $error = true;
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
  <link rel="stylesheet" href="Login_v1/css/main.css">
  <link rel="icon" type="image/png" href="Login_v1/images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="login_v1/images/img-01.png" alt="IMG">
        </div>
        <form class="login100-form validate-form" method="POST" action="">
          <span class="login100-form-title">Dealer Mobil</span>
          <div class="wrap-input100 validate-input">
            <input class="input100" style=margin-bottom:5px; type="text" name="username" id="username" placeholder="Masukkan Username" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i style="margin-top:-28px;" class=" fa fa-envelope" aria-hidden="true"></i>
            </span>
            <br>
          </div>
          <div class="wrap-input100  validate-input">
            <input class="input100" style=margin-bottom:5px; type="password" name="password" id="password" placeholder="Masukkan Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i style="margin-top:-28px;" class="fa fa-lock" aria-hidden="true"></i>
            </span>
            <br>
          </div>
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Remember Me</label>
          <Br>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type=" submit" name="login">
              Login
            </button>
          </div>
          <br>
          <?php if (isset($error)) : ?>
            <p class="validate-input" style=color:red;font-size:16px;><i>Username atau password yang anda masukkan salah</p>
          <?php endif; ?>
          <div class="text-center p-t-136">
            <p><a class="txt2" href="register.php"> Buat akun Baru</a></p>
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
  <script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="Login_v1/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>

</html>