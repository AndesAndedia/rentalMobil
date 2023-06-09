<?php 
include './connection/koneksi.php';
$kode = $_GET['nik'];
$input = mysqli_query($con,"DELETE FROM pelanggan WHERE nik='$kode'");
if ($input) {
	header('location:daftarPelanggan.php');
}else{
    echo "Failed <a href ='daftarPelanggan.php'>Back</a>";
}
?>
