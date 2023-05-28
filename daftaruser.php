<!DOCTYPE html>
<?php include './connection/koneksi.php'; require 'header.php'; ?>
<html>
<head>
	<title>Daftar Pelanggan</title>
</head>
<body>
	<h1 align="center" style="font-family: verdana;">DAFTAR USER</h1>
<table border="1" align="center" style="border-collapse: collapse; font-family: verdana; font-size: 20px;">
	<tr>
		<th>Kode Pelanggan</th>
		<th>Nama</th>
		<th>No. Telepon</th>
		<th>Action</th>
	</tr>
	<?php 
include './connection/koneksi.php';
$data = mysqli_query($con,"SELECT * FROM pelanggan");
while ($arr = mysqli_fetch_array($data)) {
	
	 ?>
<tr>
	<td><?php echo $arr['kode']; ?></td>
	<td><?php echo $arr['nama']; ?></td>
	<td><?php echo $arr['notelp']; ?></td>
	<td><a href="formeditpelanggan.php?kode=<?php echo $arr['kode'] ?>">EDIT</a>&nbsp<a href="deletepelanggan.php?kode=<?php echo $arr['kode'] ?>">DELETE</a></td>
</tr>
<?php } ?>
</table>

<h3 align="center"><a href="formpelanggan.php">+ Tambah User</a></h3>
</body>
</html>