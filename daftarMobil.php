<!-- <!DOCTYPE html>
<?php include './connection/koneksi.php';
require 'header.php'; ?>

<html>
<head>
	<title>Daftar Pelanggan</title>
</head>
<body>
	<h1 align="center" style="font-family: verdana;">DAFTAR USER</h1>
<table border="1" align="center" style="border-collapse: collapse; font-family: verdana; font-size: 20px;">
	<tr>
		<th>Kode Pelanggan</th>
		<th>Nama</th>
		<th>No. Telepon</th>
		<th>Action</th>
	</tr>
	<?php
  include './connection/koneksi.php';
  $data = mysqli_query($con, "SELECT * FROM pelanggan");
  while ($arr = mysqli_fetch_array($data)) {

  ?>
<tr>
	<td><?php echo $arr['kode']; ?></td>
	<td><?php echo $arr['nama']; ?></td>
	<td><?php echo $arr['notelp']; ?></td>
	<td><a href="formeditpelanggan.php?kode=<?php echo $arr['kode'] ?>">EDIT</a>&nbsp<a href="deletepelanggan.php?kode=<?php echo $arr['kode'] ?>">DELETE</a></td>
</tr>
<?php } ?>
</table>

<h3 align="center"><a href="formpelanggan.php">+ Tambah User</a></h3>
</body>
</html> -->


<!-- <!DOCTYPE html>
<?php include './connection/koneksi.php';
require 'header.php'; ?>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<h1>Selamat Datang </h1>
<img src="rental2.jpg">
<img src="rental3.jpg">
<img src="rental4.jpg">
<img src="rental5.jpg">
<img src="rental6.jpg">
<img src="rental7.jpg">
</body>
</html> -->

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light layout-navbar-fixed">
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
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
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
        <a href="formMobil.php"><button type="button" class="btn btn-primary">Tambah</button></a>
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
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Nomor Polisi</th>
              <th>Jenis Mobil</th>
              <th>Harga</th>
              <th>Gambar</th>
              <th>Status</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>183</td>
              <td>John Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-success">Approved</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-danger">Delete</button></th>
            </tr>
            <tr>
              <td>219</td>
              <td>Alexander Pierce</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-warning">Pending</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
            <tr>
              <td>657</td>
              <td>Bob Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-primary">Approved</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
            <tr>
              <td>175</td>
              <td>Mike Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-danger">Denied</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
            <tr>
              <td>134</td>
              <td>Jim Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-success">Approved</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
            <tr>
              <td>494</td>
              <td>Victoria Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-warning">Pending</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
            <tr>
              <td>832</td>
              <td>Michael Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-primary">Approved</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
            <tr>
              <td>982</td>
              <td>Rocky Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-danger">Denied</span></td>
              <td>Bacon ipsum dolor sit</td>
              <th><button>Edit</button></th>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://www.linkedin.com/in/andes-andedia/">Andes A F</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>