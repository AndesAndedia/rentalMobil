<?php 
include './connection/koneksi.php';

$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$sim = $_POST['sim'];
$username = $_POST['username'];
$password = $_POST['password'];
$input = mysqli_query($con,"INSERT INTO pelanggan VALUES('$nik','$nama','$jk','$sim','$no_telp','$alamat')");
$input2 = mysqli_query($con,"INSERT INTO user VALUES('$username','$password','$nik',2)");
if ($input && $input2) {
	header('location:login.php');
}else{
echo "Failed <a href ='formpelanggan.php'>Back</a>";
 }
 ?>
