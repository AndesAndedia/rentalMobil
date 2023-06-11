<?php 
include './connection/koneksi.php';
$kode = $_GET['id'];
$input = mysqli_query($con,"DELETE FROM rental WHERE id='$kode'");
if ($input) {
    echo "<script>window.location.href = 'daftarTransaksi.php?delete_status=success';</script>";
    exit();
}else{
    echo "Failed <a href ='daftarTransaksi.php'>Back</a>";
}
?>
