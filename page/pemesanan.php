<?php 
  
  include '../php/pemesanan.php';

  if (isset($_POST["pesan"])) {
    if (pemesanan($_POST) === true) {
      echo "<script>
        alert('Terima Kasih Telah Memesan, Tolong cek email anda.');
        window.location.replace('index.php');
      </script>";
    } else {
      echo "<script>
        alert('gagal memesan, tolong cek kembali!');
      </script>";
    }
  }

 ?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

  <!-- my css -->
  <link rel="stylesheet" href="../style/pemesanan-style.css">

  <title>Pemesanan</title>
</head>

<body>

  <div class="wrapper">
    <h2>Pemesanan <?php echo $_GET['tipe']; ?></h2>

    <hr>

    <div class="form">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_GET['tipe']; ?>" name="tipe">
        <div class="nama-lengkap">
          <label for="namalengkap">Nama Lengkap</label>
          <input type="text" name="nama" id="namalengkap">
        </div>
        <div class="no-telp">
          <label for="notelp">No.Telp/Wa</label>
          <input type="text" name="notelp" id="notelp">
        </div>
        <div class="alamat-email">
          <label for="alamatemail">Alamat Email</label>
          <input type="text" name="email" id="alamatemail">
        </div>
        <div class="tipe">
          <label for="tipe">Jenis Website</label>
          <h5><?php echo $_GET['tipe']; ?></h5>
        </div>
        <div class="file-desain">
          <label for="filedesain">Desain</label>
          <input type="file" name="desain" id="filedesain">
        </div>
        <div class="catatan-user">
          <textarea name="catatan" id="catatan-user" cols="13" rows="2" placeholder="Catatan"></textarea>
        </div>
        <h5 class="harga">Harga: <span>Rp. <?php echo $_GET["harga"]; ?></span></h5>
        <input type="submit" name="pesan" class="button" value="Pesan">
      </form>
    </div>
  </div>

  <!-- bootstrap javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>