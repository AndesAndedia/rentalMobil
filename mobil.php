<?php 
include './connection/koneksi.php';

$status = "";

$nomor = $_POST['nopol'];
$jenis = $_POST['jenisMobil'];
$harga = $_POST['hargaMobil'];
$foto = $_POST['gambarMobil'];
$input = mysqli_query($con,"INSERT INTO mobil VALUES('$nomor','$jenis','$harga', 'Tersedia', '$foto')");

if ($input) {
	$status =  
    "Data berhasil diinput!";
}else{
    echo "Failed <a href ='formpelanggan.php'>Back</a>";
 }
 ?>
