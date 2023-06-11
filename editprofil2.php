<?php
include './connection/koneksi.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$no_telp = $_POST['no_telp'];
$sim = $_POST['sim'];
$alamat = $_POST['alamat'];

$query = "UPDATE pelanggan SET nama = '$nama', jk = '$jk', no_telp = '$no_telp', sim = '$sim', alamat = '$alamat' WHERE nik = '$nik'";

if (mysqli_query($con, $query)) {
	// Data berhasil diperbarui, tampilkan pesan sukses
	echo "<script>alert('Data berhasil diperbarui!');</script>";
	echo "<script>window.location.href='profil2.php?nik=$nik';</script>";
} else {
	// Jika terjadi kesalahan saat memperbarui data, tampilkan pesan error
	echo "<script>alert('Terjadi kesalahan saat memperbarui data. Silakan coba lagi!');</script>";
	echo "<script>window.location.href='profil2.php?nik=$nik';</script>";
}
