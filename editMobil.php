<?php
include './connection/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = "";

    $nomor = $_POST['nopol'];
    $jenis = $_POST['jenisMobil'];
    $harga = $_POST['hargaMobil'];
    $merk = $_POST['merkMobil'];
    $gambarMobil = $_FILES['gambarMobil']['name'];

    // Validasi input
    if (empty($nomor) || empty($jenis) || empty($harga) || empty($merk)) {
        $status = "Semua field harus diisi.";
        echo '<div class="alert alert-danger" role="alert">' . $status . '</div>';
    } else {
        if ($gambarMobil != "") {
            $ekstensi_diperbolehkan = array('png', 'jpg');
            $nama = $_FILES['gambarMobil']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['gambarMobil']['size'];
            $file_tmp = $_FILES['gambarMobil']['tmp_name'];

            // Periksa apakah file gambar telah diunggah
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 52428800) {
                    move_uploaded_file($file_tmp, 'file/' . $nama);
                    $query = mysqli_query($con, "UPDATE mobil SET biaya = '$harga', jenis = '$jenis', foto = '$nama', merk = '$merk' where nopol = '$nomor'");
                    if ($query) {
                        $status = "Data berhasil diupdate!";
                        echo "<script>window.location.href = 'daftarMobil.php?edit_status=success';</script>";
                        exit();
                    } else {
                        $status =  "Data gagal diupdate!";
                    }
                } else {
                    $status = 'Ukuran file terlalu besar.';
                }
            } else {
                $status = 'Ekstensi file yang diupload tidak diizinkan.';
            }
        } else {
            $query = mysqli_query($con, "UPDATE mobil SET biaya = '$harga', merk = '$merk', jenis = '$jenis' WHERE nopol = '$nomor'");
            if ($query) {
                $status = "Data berhasil diupdate!";
                echo "<script>window.location.href = 'daftarMobil.php?edit_status=success';</script>";
                exit();
            } else {
                $status =  "Data gagal diupdate!";
            }
        }
    }
}
?>

