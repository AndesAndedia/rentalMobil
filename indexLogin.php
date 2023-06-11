<?php
include './connection/koneksi.php';
require 'header2.php';
$mob  = mysqli_query($con, "SELECT * FROM mobil WHERE status='1'");
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="style/font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
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

        <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">

                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title">Rental Mobil MoovOn</h1>
                                    <img src="img/dots-3.png" alt="Dots">
                                    <p class="tm-banner-subtitle">Drive Onward, Move Forward</p>
                                    <a href="#tm-section-3" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>
                                </div>
                            </div> <!-- col-xs-12 -->
                        </div> <!-- row -->
                        <div class="row tm-banner-row" id="tm-section-search">
                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                <label for="btnSubmit">&nbsp;</label>
                                <a href="formRental.php"><button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit">Daftar Sekarang</button></a>
                            </div>
                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div> <!-- .container -->
                </div> <!-- .tm-container-outer -->
            </section>
            <br><br><br>
            <section class="p-5 tm-container-outer tm-bg-gray">
                <div class="container">
                    <div class="container text-center">
                        <h3>Mengapa Memilih Kami?</h3>

                        <div class="row pt-5">
                            <div class="col-md-3">
                                <img src="assets/pemesan-mudah3.png" alt="Pemesanan Mudah">
                                <h5 class="mt-4">Proses Pemesanan Mudah</h5>
                                <p> Proses pemesanan mobil sewaan dengan kami sangat mudah dan cepat. Anda dapat memesan melalui situs web kami dalam beberapa langkah saja.</p>
                            </div>
                            <div class="col-md-3">
                                <img src="assets/harga-terbaik.png" alt="Harga Terbaik">
                                <h5 class="mt-4">Harga Terbaik</h5>
                                <p>Kami menawarkan harga terbaik dan kompetitif untuk mobil sewaan berkualitas tinggi.</p>
                            </div>
                            <div class="col-md-3">
                                <img src="assets/kualitas-keamanan.png" alt="Kualitas dan Keamanan">
                                <h5 class="mt-4">Kualitas dan Keamanan</h5>
                                <p>Kendaraan kami selalu dalam kondisi terbaik dan menjalani pemeliharaan rutin untuk keamanan dan keandalan selama perjalanan Anda.</p>
                            </div>
                            <div class="col-md-3">
                                <img src="assets/pelayanan.png" alt="24/7 Layanan Pelanggan">
                                <h5 class="mt-4">24/7 Layanan Pelanggan</h5>
                                <p>Tim dukungan pelanggan kami siap membantu dengan ramah dan responsif.</p>
                            </div>
                        </div>
                    </div>
            </section>

            <br><br><br>
            <div class="tm-container-outer" id="tm-section-3">
                <ul class="nav nav-pills tm-tabs-links">
                    <li class="tm-tab-link-li">
                        <a href="#1a" data-toggle="tab" class="tm-tab-link">
                            <img src="assets/kategori-mpv2.png" alt="Image" class="img-fluid">
                            MPV
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#2a" data-toggle="tab" class="tm-tab-link active">
                            <img src="assets/kategori-suv2.png" alt="Image" class="img-fluid">
                            SUV
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#3a" data-toggle="tab" class="tm-tab-link">
                            <img src="assets/kategori-sedan2.png" alt="Image" class="img-fluid">
                            Sedan
                        </a>
                    </li>
                </ul>
                <div class="tab-content clearfix">

                    <!-- Tab 1 -->


                    <div class="tab-pane fade" id="1a">

                        <div class="tm-recommended-place-wrap">
                            <?php
                            $mob1 = mysqli_query($con, "SELECT * FROM mobil WHERE status='1' AND jenis='MPV'");
                            while ($arrMobil = mysqli_fetch_array($mob1)) {
                            ?>
                                <div class="tm-recommended-place">
                                    <img src="<?php echo "file/" . $arrMobil['foto']; ?>" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title"><?php echo $arrMobil['merk']; ?></h3>
                                        <p class="tm-text-highlight"><?php echo $arrMobil['jenis']; ?></p>
                                        <p class="tm-text-gray">Sewa hanya dengan harga Rp. <?php echo $arrMobil['biaya']; ?> per hari</p>
                                    </div>
                                    <a href="formrental2.php?nopol=<?php echo $arrMobil['nopol']; ?>" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">Rp. <?php echo $arrMobil['biaya']; ?></p>
                                        <p class="tm-recommended-price-link">Rental Sekarang</p>
                                    </a>
                                </div>
                            <?php
                            } ?>

                        </div>


                    </div> <!-- tab-pane -->

                    <!-- Tab 2 -->
                    <div class="tab-pane fade show active" id="2a">

                        <div class="tm-recommended-place-wrap">
                            <?php
                            $mob2 = mysqli_query($con, "SELECT * FROM mobil WHERE status='1' AND jenis='SUV'");
                            while ($arrMobil = mysqli_fetch_array($mob2)) {

                            ?>
                                <div class="tm-recommended-place">
                                    <img src="<?php echo "file/" . $arrMobil['foto']; ?>" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title"><?php echo $arrMobil['merk']; ?></h3>
                                        <p class="tm-text-highlight"><?php echo $arrMobil['jenis']; ?></p>
                                        <p class="tm-text-gray">Sewa hanya dengan harga Rp. <?php echo $arrMobil['biaya']; ?> per hari</p>
                                    </div>
                                    <a href="formrental2.php?nopol=<?php echo $arrMobil['nopol']; ?>" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">Rp. <?php echo $arrMobil['biaya']; ?></p>
                                        <p class="tm-recommended-price-link">Rental Sekarang</p>
                                    </a>
                                </div>

                            <?php
                            } ?>
                        </div>


                    </div> <!-- tab-pane -->

                    <!-- Tab 3 -->
                    <div class="tab-pane fade" id="3a">

                        <div class="tm-recommended-place-wrap">
                            <?php
                            $mob3 = mysqli_query($con, "SELECT * FROM mobil WHERE status='1' AND jenis='Sedan'");
                            while ($arrMobil = mysqli_fetch_array($mob3)) {
                            ?>
                                <div class="tm-recommended-place">
                                    <img src="<?php echo "file/" . $arrMobil['foto']; ?>" alt="Image" class="img-fluid tm-recommended-img">
                                    <div class="tm-recommended-description-box">
                                        <h3 class="tm-recommended-title"><?php echo $arrMobil['merk']; ?></h3>
                                        <p class="tm-text-highlight"><?php echo $arrMobil['jenis']; ?></p>
                                        <p class="tm-text-gray">Sewa hanya dengan harga Rp. <?php echo $arrMobil['biaya']; ?> per hari</p>
                                    </div>
                                    <a href="formrental2.php?nopol=<?php echo $arrMobil['nopol']; ?>" class="tm-recommended-price-box">
                                        <p class="tm-recommended-price">Rp. <?php echo $arrMobil['biaya']; ?></p>
                                        <p class="tm-recommended-price-link">Rental Sekarang</p>
                                    </a>
                                </div>

                            <?php
                            } ?>
                        </div>


                    </div> <!-- tab-pane -->
                </div>
            </div>

            <footer class="tm-container-outer">
                <p class="mb-0">Copyright © <span class="tm-current-year">2023</span> MoovOn Rental Mobil

                    . Designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Kelompok Andes [Ketuanya Andes] </a></p>
            </footer>
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