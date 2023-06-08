<?php
    include './connection/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = "";

        $nomor = $_POST['nopol'];
        $jenis = $_POST['jenisMobil'];
        $harga = $_POST['hargaMobil'];
        $gambarMobil = $_FILES['gambarMobil']['name'];

        if($gambarMobil != "") {
        $ekstensi_diperbolehkan    = array('png', 'jpg');
        $nama = $_FILES['gambarMobil']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran    = $_FILES['gambarMobil']['size'];
        $file_tmp = $_FILES['gambarMobil']['tmp_name'];

        // Periksa apakah file gambar telah diunggah
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 52428800) {
                move_uploaded_file($file_tmp, 'file/' . $nama);
                $query = mysqli_query($con, "UPDATE mobil SET biaya = '$harga', foto = '$nama' where nopol = '$nomor'");
                if ($query) {
                    $status = "Data berhasil diinput!";
                    echo "<script>window.location.href = 'daftarMobil.php';</script>";
                    exit();
                } else {
                    $status =  "Data gagal diinput!";
                }
            } else {
                $status = 'UKURAN FILE TERLALU BESAR';
            }
        } else {
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        }
        } else {
            $query = mysqli_query($con, "UPDATE mobil SET biaya = '$harga' WHERE nopol = '$nomor'");
            if($query){
                $status = "Data berhasil diinput!";
                echo "<script>window.location.href = 'daftarMobil.php';</script>";
            } else {
                $status =  "Data gagal diinput!";
            }
        }



    }
