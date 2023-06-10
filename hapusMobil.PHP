<?php 
include './connection/koneksi.php';
$kode = $_GET['nopol'];
$input = mysqli_query($con,"DELETE FROM mobil WHERE nopol='$kode'");
if ($input) {
    echo "<script>window.location.href = 'daftarMobil.php?delete_status=success';</script>";
    exit();
}else{
    echo "Failed <a href ='daftarMobil.php'>Back</a>";
}
