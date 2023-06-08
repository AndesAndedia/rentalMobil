<?php include './connection/koneksi.php';
require 'head.php'; ?>

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
                        <i class="bi bi-arrows-fullscreen"></i>
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
                            <a href="#" class="nav-link">
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
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas bi bi-cart"></i>
                                <p>
                                    Daftar Rental
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas bi-arrow-left-right"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
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


</body>