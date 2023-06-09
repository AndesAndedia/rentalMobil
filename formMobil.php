<?php include './connection/koneksi.php';
require 'head.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoovOn | Add Mobil</title>

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

  <?php
  // ...
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = "";

    // Validasi nomor polisi (wajib diisi)
    if (empty($_POST['nopol'])) {
      $status = "Nomor Polisi harus diisi!";
    } else {
      $nomor = $_POST['nopol'];
    }

    // Validasi jenis mobil (wajib diisi)
    if (empty($_POST['jenisMobil'])) {
      $status = "Jenis Mobil harus diisi!";
    } else {
      $jenis = $_POST['jenisMobil'];
    }

    // Validasi harga mobil (wajib diisi dan hanya angka)
    if (empty($_POST['hargaMobil'])) {
      $status = "Harga Mobil harus diisi!";
    } elseif (!is_numeric($_POST['hargaMobil'])) {
      $status = "Harga Mobil harus berupa angka!";
    } else {
      $harga = $_POST['hargaMobil'];
    }

    // Validasi merk mobil (wajib diisi)
    if (empty($_POST['merkMobil'])) {
      $status = "Merk Mobil harus diisi!";
    } else {
      $merk = $_POST['merkMobil'];
    }

    // Validasi gambar mobil (wajib diisi dan harus berupa file gambar dengan ekstensi yang diizinkan)
    if (empty($_FILES['gambarMobil']['name'])) {
      $status = "Gambar Mobil harus diunggah!";
    } else {
      $ekstensi_diperbolehkan = array('png', 'jpg');
      $nama = $_FILES['gambarMobil']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['gambarMobil']['size'];
      $file_tmp = $_FILES['gambarMobil']['tmp_name'];

      if (!in_array($ekstensi, $ekstensi_diperbolehkan)) {
        $status = "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
      } elseif ($ukuran > 52428800) { // 52428800 byte = 50MB
        $status = "UKURAN FILE TERLALU BESAR";
      } else {
        move_uploaded_file($file_tmp, 'file/' . $nama);
      }
    }

    // Jika tidak ada error validasi, lakukan proses penyimpanan data
    if (empty($status)) {
      $query = mysqli_query($con, "INSERT INTO mobil VALUES('$nomor','$jenis','$harga', '$merk', '1', '$nama')");
      if ($query) {
        $status = "Data berhasil diinput";
        echo "<script>window.location.href = 'daftarMobil.php?status=" . urlencode($status) . "';</script>";
        exit();
      } else {
        $status = "Data gagal diinput!";
      }
    }
  }
  ?>
</head>

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
              <a href="selesaiRental.php" class="nav-link">
                <i class="nav-icon fas bi-arrow-left-right"></i>
                <p>
                  Transaksi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
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
              <h1 class="m-0">Tambah Data Mobil</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Mobil</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <form action="formMobil.php" method="POST" enctype="multipart/form-data">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
          <?php if (!empty($status)) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $status; ?>
            </div>
          <?php } else { ?>
            <div class="alert alert-success" role="alert">
              Data berhasil diinput!
            </div>
          <?php } ?>
        <?php } ?>
        <div class="card-body">
          <div class="form-group">
            <label for="nopol">Nomor Polisi</label>
            <input type="text" class="form-control" name="nopol" placeholder="Plat Nomor Kendaraan">
          </div>
          <div class="form-group">
            <label for="jenisMobil">Jenis Mobil</label>
            <select class="form-control" name="jenisMobil">
              <option value="MPV">MPV</option>
              <option value="SUV">SUV</option>
              <option value="Sedan">Sedan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="hargaMobil">Harga</label>
            <input type="text" class="form-control" name="hargaMobil" placeholder="Harga Sewa Mobil">
          </div>
          <div class="form-group">
            <label for="merkMobil">Merk</label>
            <input type="text" class="form-control" name="merkMobil" placeholder="Merk Mobil">
          </div>
          <div class="form-group">
            <label for="gambarMobil">Gambar Mobil</label>
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
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
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