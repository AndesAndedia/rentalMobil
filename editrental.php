<?php 
include './connection/koneksi.php';
$id = $_POST['id'];
$kode = $_POST['kode'];
$nopol = $_POST['nopol'];
$nama = $_POST['nama'];
$status = $_POST ['status'];
$lama = $_POST['lama'];
$jenis = $_POST['jenis'];
$total = $_POST['total'];
if ($jenis=="suv") {
	$input = mysqli_query($con,"UPDATE rental SET kode='$kode',nopol='$nopol',nama='$nama',status='$status',lama='$lama',jenis='$jenis',total=450000 WHERE id='$id'");
}else if ($jenis=="mini") {
	$input = mysqli_query($con,"UPDATE rental SET kode='$kode',nopol='$nopol',nama='$nama',status='$status',lama='$lama',jenis='$jenis',total=500000 WHERE id='$id'");
}else {
	$input = mysqli_query($con,"UPDATE rental SET kode='$kode',nopol='$nopol',nama='$nama',status='$status',lama='$lama',jenis='$jenis',total=300000 WHERE id='$id'");
}

if ($input) {
	header('location:daftarrental.php');
}else{ echo "Failed <a href ='daftarrental.php'>Back</a>";
}
 ?>
