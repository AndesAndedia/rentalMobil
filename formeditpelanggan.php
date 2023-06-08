<!DOCTYPE html>
<?php include './connection/koneksi.php'; require 'header.php'; ?>
<html>
<head>
	<title>Form Pelanggan</title>
</head>
<body>
	<h1 align="center">Form Edit Pelanggan</h1>
	<?php include 'koneksi.php';
$kode = $_GET['nopol'];
$data = mysqli_query($con,"SELECT * FROM mobil WHERE nopol='$kode'");
while ($arr = mysqli_fetch_array($data)) {

	 ?>
<form action="editpelanggan.php" method="POST">
	<table>
		<tr>
			<td>Kode Pelanggan</td>
			<td> : <input type="text" name="kode" value="<?php echo $arr['kode'] ?>"></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td> : <input type="text" name="nama" value="<?php echo $arr['nama'] ?>"></td>
		</tr>
		<tr>
			<td>No. Telp</td>
			<td> : <input type="number" name="notelp" value="<?php echo $arr['notelp'] ?>"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit"> <input type="reset" value="Cancel"></td>
		</tr>
	</table>
<?php } ?>
</form>
</body>
</html>