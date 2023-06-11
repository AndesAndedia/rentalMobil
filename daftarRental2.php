<?php
include './connection/koneksi.php';
require 'header2.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rental Mobil MoovOn</title>
    <!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/templatemo-style.css"> <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>
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
                                    <a class="nav-link active" href="indexLogin.php#top">Home <span class="sr-only">(current)</span></a>
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
                                    <a class="nav-link" href="profil2.php?nik=<?php echo $arr['nik'] ?>">Profil</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->




        <!-- /.content-header -->
        <div class="jumbotron">
            <h3>Daftar Rental</h3>
            <hr class="my-2">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Nopol</th>
                        <th>Merk</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Lama(Hari)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nik = $arr['nik'];
                    $data = mysqli_query($con, "SELECT * FROM rental RIGHT JOIN  mobil ON rental.nopol = mobil.nopol  WHERE rental.nik = '$nik' AND rental.status='0'");
                    while ($arrr = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $arrr['nopol']; ?></td>
                            <td><?php echo $arrr['merk']; ?></td>
                            <td><?php if ($arrr['status'] == 2) {
                                    echo "Rental";
                                } else {
                                    echo "Selesai";
                                } ?></td>
                            <td><?php echo $arrr['tanggal']; ?></td>
                            <td><?php echo $arrr['lama']; ?></td>
                            <td>Rp.<?php echo $arrr['total']; ?></td>
                        </tr>
                    <?php } ?>
                <tbody>
            </table>
        </div>
    </div>
    </div> <!-- .main-content -->

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/popper.min.js"></script> <!-- https://popper.js.org/ -->
    <script src="js/bootstrap.min.js"></script> <!-- https://getbootstrap.com/ -->
    <script src="js/datepicker.min.js"></script> <!-- https://github.com/qodesmith/datepicker -->
    <script src="js/jquery.singlePageNav.min.js"></script> <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="slick/slick.min.js"></script> <!-- http://kenwheeler.github.io/slick/ -->
    <script src="js/jquery.scrollTo.min.js"></script> <!-- https://github.com/flesler/jquery.scrollTo -->

</body>

</html>