<?php
include './connection/koneksi.php';
require 'head.php';

$status = isset($_POST['status']) ? $_POST['status'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $status = "";

  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $sim = $_POST['sim'];
  $no = $_POST['no_telp'];
  $alamat = $_POST['alamat'];

  // Validasi NIK
  if (!preg_match("/^[0-9]{16}$/", $nik)) {
    $status = "NIK harus terdiri dari 16 digit angka!";
  }

  // Validasi Nomor Telepon
  if (!preg_match("/^[0-9]{10,14}$/", $no)) {
    $status = "Nomor Telepon harus terdiri dari 10-14 digit angka!";
  }

  if (empty($nik) || empty($nama) || empty($jk) || empty($sim) || empty($no) || empty($alamat)) {
    $status = "Silakan lengkapi semua field!";
  } else {
    $query = mysqli_query($con, "UPDATE pelanggan SET nama = '$nama', jk = '$jk', sim = '$sim', no_telp = '$no', alamat = '$alamat' WHERE nik = '$nik'");
    if ($query) {
      $status = "Data berhasil diupdate!";
      header("Location: daftarPelanggan.php?edit_status=success");
      exit();
    } else {
      $status =  "Data gagal diupdate!";
    }
  }
}

// Ambil data pelanggan dari database
$nomor = isset($_GET['nik']) ? $_GET['nik'] : '';
$query = mysqli_query($con, "SELECT * FROM pelanggan WHERE nik = '$nomor'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoovOn | Edit Pelanggan</title>

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
              <a href="daftarPelanggan.php" class="nav-link active">
                <i class="nav-icon fas bi-people-fill"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="daftarMobil.php" class="nav-link">
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
        </nav>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Data Pelanggan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
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
            <label for="nik">NIK</label>
            <input type="text" class="form-control" name="nik" value="<?php echo $data['nik']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
          </div>

          <div class="form-group">
            <label for="jk">Jenis Kelamin</label> <br>
            <input type="radio" name="jk" value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki') echo "checked"; ?>> &nbsp <label for="">Laki-laki</label> &nbsp
            <input type="radio" name="jk" value="Perempuan" <?php if ($data['jk'] == 'Perempuan') echo "checked"; ?>> &nbsp <label for="">Perempuan</label>
          </div>

          <div class="form-group">
            <label for="sim">SIM</label>
            <input type="text" class="form-control" name="sim" value="<?php echo $data['sim']; ?>">
          </div>
          <div class="form-group">
            <label for="no_telp">Nomor Telepon</label>
            <input type="text" class="form-control" name="no_telp" value="<?php echo $data['no_telp']; ?>">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="style/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="style/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="style/AdminLTE/js/adminlte.min.js"></script>
</body>

</html>