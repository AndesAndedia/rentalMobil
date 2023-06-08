<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ORental</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/style/font-awesome/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="style/AdminLTE/css/adminlte.css">
    <script src="style/AdminLTE/js/adminlte.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
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
                include './connection/koneksi.php';
                $nopol = $_GET['nopol'];
                $data = mysqli_query($con,"SELECT * FROM mobil WHERE nopol='$nopol'");
                while ($arr = mysqli_fetch_array($data)) {
            ?>
            <form action="editMobil.php" method="POST" enctype="multipart/form-data">
                <?php if (!empty($status)) { ?>
                    <div class="alert alert-<?php echo ($input) ? 'success' : 'danger'; ?>" role="alert">
                        <?php echo $status; ?>
                    </div>
                <?php } ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nopol">Nomor Polisi</label>
                        <input type="text" class="form-control" name="nopol" value="<?php echo $arr['nopol'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenisMobil">Jenis Mobil</label>
                        <input type="text" class="form-control" name="jenisMobil" value="<?php echo $arr['jenis']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hargaMobil">Harga</label>
                        <input type="text" class="form-control" name="hargaMobil" placeholder="<?php echo $arr['biaya']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gambarMobil">Gambar Mobil</label>
                        <br> <img src="<?php echo "file/".$arr['foto'];?>" alt="Foto Mobil" width='160' height='90'> <br> <br>
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
            <?php } ?>
            </form>
        </div>
    </div>

    <script>
        function updateLabel(input) {
            var fileName = input.files[0].name;
            var label = document.getElementById("gambarMobilLabel");
            label.innerHTML = fileName;
        }
    </script>
</body>

</html>