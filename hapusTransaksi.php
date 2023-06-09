<?php 
include './connection/koneksi.php';
$kode = $_GET['id'];
$input = mysqli_query($con,"DELETE FROM rental WHERE id='$kode'");
if ($input) {
	header('location:daftarTransaksi.php');
}else{
    echo "Failed <a href ='daftarTransaksi.php'>Back</a>";
}
?>
