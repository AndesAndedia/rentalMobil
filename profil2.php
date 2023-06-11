<?php
include './connection/koneksi.php';
require 'header2.php';
$uname = $_SESSION['username'];
$data = mysqli_query($con, "SELECT * FROM pelanggan RIGHT JOIN user ON user.nik = pelanggan.nik WHERE user.username = '$uname'");
$arr = mysqli_fetch_array($data);
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- Bootstrap style -->
    <!-- Templatemo style -->

    <title>Registrasi MoovOn</title>
</head>

<div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                            <img src="assets/logo4.png" alt="Site logo">
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="indexLogin.php#top">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="indexLogin.php#tm-section-3">Rental</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="daftarRental2.php">Daftar Rental</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="daftarTransaksi2.php">Daftar Transaksi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="profil2.php?nik=<?php echo $arr['nik'] ?>">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->
        <!-- Start Header form -->
        <div class="text-center pt-5">
            <img src="assets/logo.jpeg" alt="logo" width="72" height="72" />
            <h2>Profil</h2>
            <p>
                Pastikan Data Anda Tetap Up to Date
            </p>
        </div>
        <!-- End Header form -->

        <!-- Start Card -->
        <div class="card">
            <!-- Start Card Body -->
            <div class="card-body">
                <!-- Start Form -->
                <form id="bookingForm" action="editprofil2.php" method="POST" class="needs-validation" novalidate autocomplete="off">

                    <!-- Start Input NIK -->
                    <div class="form-group">
                        <label for="inputName">NIK</label>
                        <input type="text" class="form-control" id="inputName" name="nik" value="<?php echo $arr['nik']; ?>" required readonly />
                        <small class="form-text text-muted">Kami tidak akan memberikan nomor NIK anda ke siapapun</small>
                    </div>
                    <!-- End Input NIK -->

                    <!-- Start Input Name -->
                    <div class="form-group">
                        <label for="inputName">Nama</label>
                        <input type="text" class="form-control" id="inputName" name="nama" value="<?php echo $arr['nama']; ?>" required />
                        <small class="form-text text-muted">Silahkan isi nama anda</small>
                    </div>
                    <!-- End Input Name -->

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label> <br>
                        <input type="radio" name="jk" value="Laki-laki" <?php echo ($arr['jk'] == 'Laki-laki') ? 'checked' : '' ?>> &nbsp <label for="">Laki-laki</label> &nbsp
                        <input type="radio" name="jk" value="Perempuan" <?php echo ($arr['jk'] == 'Perempuan') ? 'checked' : '' ?>> &nbsp <label for="">Perempuan</label>
                    </div>

                    <!-- Start Input Telephone -->
                    <div class="form-group">
                        <label for="inputPhone">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="inputPhone" name="no_telp" value="<?php echo $arr['no_telp']; ?>" required />
                        <small class="form-text text-muted">Kami tidak akan memberikan nomor anda ke siapapun</small>
                    </div>
                    <!-- End Input Telephone -->


                    <!-- Start Input SIM -->
                    <div class="form-group">
                        <label for="inputName">SIM</label>
                        <input type="text" class="form-control" id="inputName" name="sim" value="<?php echo $arr['sim']; ?>" required />
                        <small class="form-text text-muted">Silahkan isi nomor SIM anda</small>
                    </div>
                    <!-- End Input SIM -->


                    <!-- Start Input Alamat -->
                    <div class="form-group">
                        <label for="inputName">Alamat</label>
                        <input type="text" class="form-control" id="inputName" name="alamat" value="<?php echo $arr['alamat']; ?>" required />
                        <small class="form-text text-muted">Silahkan isi Alamat anda</small>
                    </div>
                    <!-- End Input Alamat -->
                    <br>

                    <!-- Start Submit Button -->
                    <button class="btn btn-primary" type="submit">Update Data</button> <br> <br>
                    <!-- End Submit Button -->
                </form>
                <!-- End Form -->
            </div>
            <!-- End Card Body -->
        </div>
        <!-- End Card -->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Start Scritp for Form -->
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <!-- End Scritp for Form -->

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <!-- End Scritp for Form -->

        <script>
            // Optional JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <!-- End Scritp for Form -->
</body>

</html>