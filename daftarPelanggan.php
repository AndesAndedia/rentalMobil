<?php
include './connection/koneksi.php';
require 'head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoovOn | Pelanggan</title>

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

    <!-- Mengambil Informasi Status -->
    <?php
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    $deleteStatus = isset($_GET['delete_status']) ? $_GET['delete_status'] : '';
    $editStatus = isset($_GET['edit_status']) ? $_GET['edit_status'] : '';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <!-- Membuat Alert -->
    <?php if (!empty($status)) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $status; ?>
        </div>
      <?php } ?>
      <?php if ($deleteStatus == "success") { ?>
        <div class="alert alert-success" role="alert">
          <?php echo "Data Berhasil Dihapus"; ?>
        </div>
      <?php } ?>
      <?php if ($editStatus == "success") { ?>
        <div class="alert alert-success" role="alert">
          <?php echo "Data Berhasil Diedit"; ?>
        </div>
      <?php } ?>

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pelanggan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="card-header">
        <a href="formPelanggan.php"><button type="button" class="btn btn-primary">Tambah</button></a>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 500px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>NIK</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>SIM</th>
              <th>No Telp</th>
              <th>Alamat</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = mysqli_query($con, "SELECT * FROM pelanggan");
            while ($arr = mysqli_fetch_array($data)) {
            ?>
              <tr>
                <td><?php echo $arr['nik']; ?></td>
                <td><?php echo $arr['nama']; ?></td>
                <td><?php echo $arr['jk']; ?></td>
                <td><?php echo $arr['sim']; ?></td>
                <td><?php echo $arr['no_telp']; ?></td>
                <td><?php echo $arr['alamat']; ?></td>
                <td>
                  <a href="formEditPelanggan.php?nik=<?php echo $arr['nik'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPelangganModal-<?php echo $arr['nik']; ?>">Hapus</button>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="hapusPelangganModal-<?php echo $arr['nik']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPelangganModalLabel-<?php echo $arr['nik']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="hapusPelangganModalLabel-<?php echo $arr['nik']; ?>">Hapus Pelanggan</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda yakin ingin menghapus data pelanggan <?php echo $arr['nama']; ?>?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="hapusPelanggan.php?nik=<?php echo $arr['nik'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal -->
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Created by Andes Andedia</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="style/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="style/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="style/dist/js/adminlte.min.js"></script>
</body>

</html>