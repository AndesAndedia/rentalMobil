<?php include './connection/koneksi.php';
require 'head.php';
require 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ORental</title>


    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/style/font-awesome/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="style/AdminLTE/css/adminlte.css">
    <script src="style/AdminLTE/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script untuk nama file -->
    <script src="/Script/custom-file.js"></script>

</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Mobil</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Mobil</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- form start -->
    <form action="formMobil.php" method="POST">
        <?php if (!empty($status)) { ?>
            <div class="alert alert-<?php echo ($input) ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $status; ?>
            </div>
        <?php } ?>
        <div class="card-body">
            <div class="form-group">
                <label for="nopol">Nomor Polisi</label>
                <input type="text" class="form-control" name="nopol" placeholder="Plat Nomor Kendaraan">
            </div>
            <div class="form-group">
                <label for="jenisMobil">Jenis Mobil</label>
                <input type="text" class="form-control" name="jenisMobil" placeholder="Jenis dan Type Mobil">
            </div>
            <div class="form-group">
                <label for="hargaMobil">Harga</label>
                <input type="text" class="form-control" name="hargaMobil" placeholder="Harga Sewa Mobil">
            </div>
            <div class="form-group">
                <label for="gambarMobil">Gambar Mobil</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambarMobil">
                        <label class="custom-file-label" for="gambarMobil">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require 'footer.php' ?>