<?php include './connection/koneksi.php';
require 'head.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoovOn | Edit Mobil</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="style/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="style/AdminLTE/css/adminlte.css">
  <script src="style/AdminLTE/js/adminlte.min.js"></script>

  <!-- Script untuk nama file -->
  <script src="/Script/custom-file.js"></script>

</head>

<?php
include './connection/koneksi.php';

$status = isset($_POST['status']) ? $_POST['status'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $status = "";

  $nomor = $_POST['nopol'];
  $jenis = $_POST['jenisMobil'];
  $harga = $_POST['hargaMobil'];
  $merk = $_POST['merkMobil'];
  $gambarMobil = $_FILES['gambarMobil']['name'];

  // Validasi input
  if (empty($nomor) || empty($jenis) || empty($harga) || empty($merk)) {
    $status = "Semua field harus diisi.";
  } else if (!is_numeric($harga)) {
    $status = "Harga Mobil harus berupa angka!";
  } else {
    if ($gambarMobil != "") {
      $ekstensi_diperbolehkan = array('png', 'jpg');
      $nama = $_FILES['gambarMobil']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['gambarMobil']['size'];
      $file_tmp = $_FILES['gambarMobil']['tmp_name'];

      // Periksa apakah file gambar telah diunggah
      if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 52428800) {
          move_uploaded_file($file_tmp, 'file/' . $nama);
          $query = mysqli_query($con, "UPDATE mobil SET biaya = '$harga', jenis = '$jenis', foto = '$nama', merk = '$merk' where nopol = '$nomor'");
          if ($query) {
            $status = "Data berhasil diupdate!";
            header("Location: daftarMobil.php?edit_status=success");
            exit();
          } else {
            $status =  "Data gagal diupdate!";
          }
        } else {
          $status = 'Ukuran file terlalu besar.';
        }
      } else {
        $status = 'Ekstensi file yang diupload tidak diizinkan.';
      }
    } else {
      $query = mysqli_query($con, "UPDATE mobil SET biaya = '$harga', merk = '$merk', jenis = '$jenis' WHERE nopol = '$nomor'");
      if ($query) {
        $status = "Data berhasil diupdate!";
        header("Location: daftarMobil.php?edit_status=success");
        exit();
      } else {
        $status =  "Data gagal diupdate!";
      }
    }
  }
}

// Ambil data mobil dari database
$nomor = isset($_GET['nopol']) ? $_GET['nopol'] : '';
$query = mysqli_query($con, "SELECT * FROM mobil WHERE nopol = '$nomor'");
$data = mysqli_fetch_array($query);

?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="https://www.linkedin.com/in/andes-andedia/" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Logo -->
      <a href="#" class="brand-link">
        <img src="assets/logo.jpeg" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MoovOn</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/user.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas bi-speedometer2"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="daftarPelanggan.php" class="nav-link">
                <i class="nav-icon fas bi-people-fill"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="daftarMobil.php" class="nav-link active">
                <i class="nav-icon fas bi-car-front-fill"></i>
                <p>
                  Mobil
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="formRental.php" class="nav-link">
                <i class="nav-icon fas bi bi-cart"></i>
                <p>
                  Daftar Rental
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="daftarTransaksi.php" class="nav-link">
                <i class="nav-icon fas bi-arrow-left-right"></i>
                <p>
                  Transaksi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="selesaiRental.php" class="nav-link">
                <i class="nav-icon fas bi-card-checklist"></i>
                <p>
                  Selesai Rental
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas bi-door-closed-fill text-danger"></i>
                <p class="text">Log Out</p>
              </a>
            </li>
          </ul>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Data Mobil</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Mobil</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <?php
      if (!empty($status)) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $status; ?>
        </div>
      <?php } ?>

      <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="nopol">Nomor Polisi:</label>
            <input type="text" class="form-control" name="nopol" value="<?php echo $data['nopol']; ?>" readonly>
          </div>
          <?php
          $defaultValue = $data['jenis']; // Nilai default dari database atau variabel

          $jenisMobilOptions = ["MPV", "SUV", "Sedan"];
          ?>

          <div class="form-group">
            <label for="jenisMobil">Jenis Mobil</label>
            <select class="form-control" name="jenisMobil">
              <?php
              foreach ($jenisMobilOptions as $option) {
                $selected = ($option == $defaultValue) ? "selected" : "";
                echo "<option value=\"$option\" $selected>$option</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="hargaMobil">Harga Mobil:</label>
            <input type="text" class="form-control" name="hargaMobil" value="<?php echo $data['biaya']; ?>">
          </div>
          <div class="form-group">
            <label for="merkMobil">Merk Mobil:</label>
            <input type="text" class="form-control" name="merkMobil" value="<?php echo $data['merk']; ?>">
          </div>
          <div class="form-group">
            <label for="gambarMobil">Gambar Mobil</label>
            <br> <img src="<?php echo "file/" . $data['foto']; ?>" alt="Foto Mobil" width='160' height='90'> <br> <br>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="gambarMobil" id="gambarMobil" onchange="updateLabel(this)">
                <label class="custom-file-label" id="gambarMobilLabel">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <script>
    function updateLabel(input) {
      var fileName = input.files[0].name;
      var label = document.getElementById("gambarMobilLabel");
      label.innerHTML = fileName;
    }
  </script>

</body>

</html>