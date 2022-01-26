<?php
$conn = mysqli_connect("localhost", "root", "", "dbase_mobil");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($tambah)
{
  global $conn;

  $merk = htmlspecialchars($tambah["merk"]);
  $harga = htmlspecialchars($tambah["harga"]);
  $warna = htmlspecialchars($tambah["warna"]);
  $kecepatan = htmlspecialchars($tambah["kecepatan"]);
  $transmisi = htmlspecialchars($tambah["transmisi"]);
  $duduk = htmlspecialchars($tambah["duduk"]);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO tbl_mobil VALUES('','$merk','$harga','$gambar','$warna','$kecepatan','$transmisi','$duduk')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  $error = $_FILES['gambar']['error'];

  if ($error == 4) {
    echo "
    <Script>
    alert('Pilih Gambar Terlebih Dahulu');
    </script>
    ";
    return false;
  }


  $ektensiGambarValid = ['jpg', 'png', 'jpeg'];
  $ektensiGambar = explode('.', $namaFile);
  $ektensiGambar = strtolower(end($ektensiGambar));

  if (!in_array($ektensiGambar, $ektensiGambarValid)) {
    echo "
    <script>
      alert('File yang diupload bukan gambar!!');
    </script>
    ";
    return false;
  }

  if ($ukuranFile >= 2000000) {
    echo "
    <script>
      alert('Ukuran gambar terlalu besar!!!');
    </script>
    ";
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ektensiGambar;
  move_uploaded_file($tmpName, "img/" . $namaFileBaru);
  return $namaFileBaru;
}

function hapus($id)
{
  global $conn;
  $query = "DELETE FROM tbl_mobil WHERE id = $id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  $id = $data["id"];
  $merk = htmlspecialchars($data["merk"]);
  $harga = htmlspecialchars($data["harga"]);
  $warna = htmlspecialchars($data["warna"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  $query = "UPDATE tbl_mobil SET
            merk = '$merk',
            harga = '$harga',
            warna = '$warna',
            gambar = '$gambar'
            WHERE $id = id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function cari($keyword)
{
  global $conn;
  $jumlahDataPerHalaman = 2;
  $jumlahData = count(query("SELECT * FROM tbl_mobil"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  $halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;

  //   halaman =2 , halamaktif = 1, awaldata = 0,1,2
  // halaman =1 ,  
  $dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
  $query = "SELECT * FROM tbl_mobil WHERE 
                merk LIKE '%$keyword%' ||
                harga LIKE '%$keyword%' ||
                warna LIKE '%$keyword%' ||
                gambar LIKE '%$keyword%'
                LIMIT $dataAwal, $jumlahDataPerHalaman";
  return query($query);
}

function beli($data)
{
  global $conn;
  $namamobil = $data["merk"];
  $jumlah = $data["jumlah"];
  $nama = $data["nama"];
  $nohp = $data["nohp"];
  $alamat = $data["alamat"];
  $kodepos = $data["kodepos"];
  $kota = $data["kota"];
  $email = $data["email"];


  $beli = "INSERT INTO tbl_beli VALUES ('','$namamobil','$jumlah','$nama',$nohp,'$alamat','$kodepos','$kota','$email')";
  mysqli_query($conn, $beli);
  return mysqli_affected_rows($conn);
}





function register($registrasi)
{
  global $conn;
  $username = strtolower(stripslashes($registrasi["username"]));
  $password = mysqli_real_escape_string($conn, $registrasi["password"]);
  $password2 = mysqli_real_escape_string($conn, $registrasi["password2"]);

  $result = mysqli_query($conn, "SELECT USERNAME FROM tbl_user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('Username sudah terdaftar!!');
    </script>
    ";
    return false;
  }

  if ($password != $password2) {
    echo "
    <script> 
    alert('Password yang dimasukkan berbeda!!!');
    </script>
    ";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
  $password2 = password_hash($password2, PASSWORD_DEFAULT);

  $query = "INSERT INTO tbl_user VALUES ('','$username','$password','$password2')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
