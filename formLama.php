<?php include './connection/koneksi.php'; require 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Rental</title>
</head>
<body>
<form action="rental.php" method="POST">
	<table>
		<tr>
			<td>Kode Pelanggan</td>
			<td>: <input type="text" name="kode"></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td>: <input type="text" name="nama"></td>
		</tr>		
		<tr>
			<td>Jenis Mobil</td>
			<td>: <select name="jenis">
				<option value="city">City Car</option>
				<option value="suv">SUV</option>
				<option value="mini">MiniBus</option>
				  </select>
			</td>
		</tr>		
		<tr>
			<td>Nomor Polisi</td>
			<td>: <input type="text" name="nopol"></td>
		</tr>
		<tr>
			<td>Tanggal Mulai</td>
			<td><input type="date" name="tanggal"></td>
		</tr>
		<tr>
			<td>Lama Rental</td>
			<td>:<input type="number" name="lama"></td>
			<td><input type="number" name="status" style="display: none;"></td>
			<td><input type="number" name="total" style="display: none;"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit"><input type="reset" value="Cancel"></td>
		</tr>
	</table>
</form>
</body>
</html>
