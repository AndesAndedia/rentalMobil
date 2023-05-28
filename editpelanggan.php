<?php 
include './connection/.php';

$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$kode = $_POST['kode'];
$input = mysqli_query($con,"UPDATE pelanggan SET nama = '$nama', notelp = '$notelp' WHERE kode = '$kode'");
if ($input) {
	header('location:daftaruser.php');
}else{
echo "Failed <a href ='daftaruser.php'>Back</a>";
 }
 ?>
