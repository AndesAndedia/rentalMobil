<?php include './connection/koneksi.php';
require 'head.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

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
  <script src="/script/custom-file.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>

<?php
include './connection/koneksi.php';

$status = isset($_POST['status']) ? $_POST['status'] : '';

// Fungsi untuk mengambil data pelanggan
function getPelangganData($con)
{
  $query = "SELECT nik FROM pelanggan";
  $result = mysqli_query($con, $query);

  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row['nik'];
  }

  return $data;
}

// Fungsi untuk mengambil data nomor polisi
function getMobilData($con)
{
  $query = "SELECT nopol FROM mobil";
  $result = mysqli_query($con, $query);

  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row['nopol'];
  }

  return $data;
}

$pelangganData = getPelangganData($con);
$mobilData = getMobilData($con);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $status = "";

  $id = $_POST['id'];
  $nik = $_POST['nik'];
  $tanggal = $_POST['tanggal'];
  $nopol = $_POST['nopol'];
  $durasi = $_POST['lama'];
  $status_kondisi = $_POST['kondisi'];


  function getBiayaRental($con, $nopol)
  {
    $query3 = "SELECT biaya FROM mobil WHERE nopol = '$nopol'";
    $result = mysqli_query($con, $query3);

    if ($result && mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_assoc($result);
      $biayaRental = $data['biaya'];
      return $biayaRental;
    }
  }

  if (empty($nik) || empty($nopol) || empty($durasi) || empty($tanggal)) {
    $status = "Semua field harus diisi!";
  } elseif (!preg_match("/^[0-9]{16}$/", $nik)) {
    $status = "NIK harus terdiri dari 16 digit angka!";
  }

  $totalBiaya = getBiayaRental($con, $nopol) * $durasi;


  if ($totalBiaya) {
    $query = mysqli_query($con, "UPDATE rental SET nik = '$nik', tanggal = '$tanggal', nopol = '$nopol', status = '$status_kondisi', lama = '$durasi', total = '$totalBiaya' WHERE id = '$id' ");
    $query2 = mysqli_query($con, "UPDATE mobil SET status = 1 WHERE nopol = '$nopol' ");
    if ($query && $query2) {
      $status = "Data berhasil diupdate!";
      header("Location: daftarTransaksi.php?edit_status=success");
      exit();
    } else {
      $status =  "Data gagal diupdate!";
      header("Location: formEditTransaksi.php?id=$id");
      exit();
    }
  } else {
    $status =  "Data gagal diupdate!";
    header("Location: formEditTransaksi.php?id=$id");
    exit();
  }
}
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
        <img src="assets/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MoovOn</span>
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
              <a href="daftarTransaksi.php" class="nav-link active">
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
              <h1 class="m-0">Edit Data Transaksi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>


      <?php
      include './connection/koneksi.php';
      $id = $_GET['id'];
      $data = mysqli_query($con, "SELECT * FROM rental WHERE id ='$id'");
      while ($arr = mysqli_fetch_array($data)) {
      ?>
        <form method="POST" enctype="multipart/form-data">
          <?php if (!empty($status)) { ?>
            <div class="alert alert-<?php echo ($input) ? 'success' : 'danger'; ?>" role="alert">
              <?php echo $status; ?>
            </div>
          <?php } ?>
          <div class="card-body">

            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" name="nik" id="nik" autocomplete="off" value="<?php echo $arr['nik']; ?>">
            </div>

            <script>
              $(function() {
                var pelangganData = <?php echo json_encode($pelangganData); ?>;

                $("#nik").autocomplete({
                  source: pelangganData
                });
              });
            </script>

            <script>
              $(document).ready(function() {
                $('.datepicker').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose: true
                });
              });
            </script>

            <div class="form-group">
              <label for="tanggal">Select Date:</label>
              <input type="text" class="form-control datepicker" name="tanggal" id="datepicker" placeholder="Select date" value="<?php echo $arr['tanggal']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nopol">Nomor Polisi</label>
              <input type="text" class="form-control" name="nopol" id="nopol" autocomplete="off" value="<?php echo $arr['nopol']; ?>">
            </div>
            <script>
              $(function() {
                var mobilData = <?php echo json_encode($mobilData); ?>;

                $("#nopol").autocomplete({
                  source: mobilData
                });
              });
            </script>


            <div class="form-group">
              <label for="lama">Durasi</label>
              <input type="text" class="form-control" name="lama" value="<?php echo $arr['lama']; ?>">
            </div>
            <div class="form-group">
              <label for="kondisi">Status</label> <br>
              <input type="radio" name="kondisi" value="0" <?php if ($arr['status'] == '0') echo "checked"; ?>> <label for="">Dipinjam</label> &nbsp;
              <input type="radio" name="kondisi" value="1" <?php if ($arr['status'] == '1') echo "checked"; ?>> <label for="">Selesai</label>
            </div>

          </div>
          <input type="hidden" name="id" value="<?php echo $id ?>" />
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        <?php } ?>
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