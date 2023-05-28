<!DOCTYPE html>
<?php include './connection/koneksi.php'; require 'header.php'; ?>
<html>
<head>
	<title>Form Pelanggan</title>
</head>
<body>
<form action="pelanggan.php" method="POST">
	<table>
		<tr>
			<td>Kode Pelanggan</td>
			<td> : <input type="text" name="kode"></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td> : <input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>No. Telp</td>
			<td> : <input type="number" name="notelp"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit"> <input type="reset" value="Cancel"></td>
		</tr>
	</table>
</form>
</body>
</html>