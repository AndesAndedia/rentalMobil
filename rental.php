<?php 
include './connection/koneksi.php';
$kode = $_POST['kode'];
$tanggal = $_POST['tanggal'];
$nopol = $_POST['nopol'];
$nama = $_POST['nama'];
$status = $_POST ['status'];
$lama = $_POST['lama'];
$jenis = $_POST['jenis'];
$total = $_POST['total'];
if ($jenis=="suv") {
	$input = mysqli_query($con,"INSERT INTO rental VALUES('','$kode','$tanggal','$nopol','$nama',1,'$lama','$jenis',450000)");
}else if ($jenis=="mini") {
	$input = mysqli_query($con,"INSERT INTO rental VALUES('','$kode','$tanggal','$nopol','$nama',1,'$lama','$jenis',500000)");
}else {
	$input = mysqli_query($con,"INSERT INTO rental VALUES('','$kode','$tanggal','$nopol','$nama',1,'$lama','$jenis',300000)");
}

if ($input) {
	header('location:daftarrental.php');
}else{ echo "Failed <a href ='formrental.php'>Back</a>";
}
 ?>
