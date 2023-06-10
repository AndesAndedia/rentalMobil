<?php 
include './connection/koneksi.php';
$kode = $_GET['nik'];
$input = mysqli_query($con,"DELETE FROM pelanggan WHERE nik='$kode'");
if ($input) {
    echo "<script>window.location.href = 'daftarPelanggan.php?delete_status=success';</script>";
    exit();
}else{
    echo "Failed <a href ='daftarPelanggan.php'>Back</a>";
}
?>
