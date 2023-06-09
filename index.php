<?php include './connection/koneksi.php';
require 'head.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoovOn | Home</title>

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

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
        <img src="assets/logo.jpeg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <?php
            include './connection/koneksi.php';

            $query = "SELECT count(id) AS totalTransaksi FROM rental";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $totalTransaksi = $row['totalTransaksi'];
            } else {
              $totalTransaksi = 0;
            }
            ?>
            <!-- jumlah transaksi -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo "$totalTransaksi" ?></h3>

                  <p>Total Transaksi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pricetag"></i>
                </div>
                <a href="daftarTransaksi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>


            <?php
            include './connection/koneksi.php';

            $query = "SELECT count(nopol) AS totalMobil FROM mobil";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $totalMobil = $row['totalMobil'];
            } else {
              $totalMobil = 0;
            }
            ?>
            <!-- jumlah aset -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo "$totalMobil" ?><sup style="font-size: 20px"></sup></h3>

                  <p>Jumlah Aset</p>
                </div>
                <div class="icon">
                  <i class="fa fa-car"></i>
                </div>
                <a href="daftarMobil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <?php
            include './connection/koneksi.php';

            $query = "SELECT count(nopol) AS tersedia FROM mobil WHERE status = '1'";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $tersedia = $row['tersedia'];
            } else {
              $tersedia = 0;
            }
            ?>

            <!-- jumlah mobil tersedia -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo "$tersedia" ?></h3>

                  <p>Mobil Tersedia</p>
                </div>
                <div class="icon">
                  <i class="fa fa-car"></i>
                </div>
                <a href="daftarMobil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <?php
            include './connection/koneksi.php';

            $query = "SELECT count(nopol) AS dirental FROM mobil WHERE status = '2'";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $dirental = $row['dirental'];
            } else {
              $dirental = 0;
            }
            ?>

            <!-- jumlah mobil dirental -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo "$dirental" ?></h3>

                  <p>Mobil Dirental</p>
                </div>
                <div class="icon">
                  <i class="fa fa-car"></i>
                </div>
                <a href="daftarMobil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <?php
            include './connection/koneksi.php';

            $query = "SELECT SUM(total) AS totalBiaya FROM rental";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $totalBiaya = $row['totalBiaya'];
            } else {
              $totalBiaya = 0;
            }
            ?>
            <!-- jumlah pendapatan -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>Rp. <?php echo "$totalBiaya" ?><sup style="font-size: 20px"></sup></h3>

                  <p>Total Pemasukan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
                <a href="selesaiRental.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- AdminLTE App -->

</body>

</html>