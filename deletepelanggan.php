<?php 
include './connection/koneksi.php';
$kode = $_GET['kode'];
$input = mysqli_query($con,"DELETE FROM pelanggan WHERE kode='$kode'");
if ($input) {
	header('location:daftaruser.php');
}else{
echo "Failed <a href ='daftaruser.php.php'>Back</a>";
 }
 ?>
