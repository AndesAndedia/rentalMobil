<?php 
include './connection/koneksi.php';
$kode = $_GET['nopol'];
$input = mysqli_query($con,"DELETE FROM mobil WHERE nopol='$kode'");
if ($input) {
	header('location:daftarMobil.php');
}else{
    echo "Failed <a href ='daftarMobil.php'>Back</a>";
}
?>
