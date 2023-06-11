<?php 
include './connection/koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$jk = $_POST['jk'];
$sim = $_POST['sim'];
$alamat = $_POST['alamat'];
$input = mysqli_query($con,"UPDATE pelanggan SET nama = '$nama', no_telp = '$no_telp', jk = '$jk', sim = '$sim', alamat = '$alamat' WHERE nik = '$nik'");
if ($input) {
	header('location:profil2.php');
}else{
echo "Failed <a href ='profil2.php'>Back</a>";
 }
 ?>