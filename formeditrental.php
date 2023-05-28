<?php include './connection/koneksi.php';require 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Rental</title>
</head>
<body>
	<?php include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($con,"SELECT * FROM rental WHERE id='$id'");
while ($arr = mysqli_fetch_array($query)) {

	 ?>
<form action="editrental.php" method="POST">
	<table>
		<tr>
			<td> ID Rental</td>
			<td>: <input type="text" name="id" value="<?php echo $arr['id'] ?>"></td>
		</tr>
		<tr>
			<td>Kode Pelanggan</td>
			<td>: <input type="text" name="kode" value="<?php echo $arr['kode'] ?>"></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td>: <input type="text" name="nama" value="<?php echo $arr['nama'] ?>"></td>
		</tr>		
		<tr>
			<td>Jenis Mobil</td>
			<td>: <select name="jenis">
				<option value="<?php echo $arr['jenis'] ?>">City Car</option>
				<option value="<?php echo $arr['jenis'] ?>">SUV</option>
				<option value="<?php echo $arr['jenis'] ?>">MiniBus</option>
				  </select>
			</td>
		</tr>		
		<tr>
			<td>Nomor Polisi</td>
			<td>: <input type="text" name="nopol" value="<?php echo $arr['nopol'] ?>"></td>
		</tr>
		<tr>
			<td>Lama Rental</td>
			<td>: <input type="number" name="lama" value="<?php echo $arr['lama'] ?>"></td>
		</tr>		
		<tr>
			<td>Total Biaya</td>
			<td>: <input type="text" name="total" value="<?php echo $arr['total']*$arr['lama'] ?>"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="1">Rental</td>
			<td><input type="radio" name="status" value="2">Selesai</td>
		</tr>
		<tr><td><input type="submit" name="" value="Submit"></td></tr>
	</table>
<?php } ?>
</form>
</body>
</html>