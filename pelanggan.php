<?php 
include './connection/koneksi.php';

$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$kode = $_POST['kode'];
$input = mysqli_query($con,"INSERT INTO pelanggan VALUES('$nama','$notelp','$kode')");
if ($input) {
	header('location:daftaruser.php');
}else{
echo "Failed <a href ='formpelanggan.php'>Back</a>";
 }
 ?>
