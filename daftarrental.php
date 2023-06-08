<!DOCTYPE html>
<?php include './connection/koneksi.php';
require 'header.php'; ?>

<head>
	<title>Daftar Rental</title>
</head>

<body>
	<h1 align="center">DAFTAR RENTAL</h1>
	<table border="1" align="center" style="border-collapse: collapse;">
		<tr>
			<th>Kode Pelanggan</th>
			<th>Nama</th>
			<th>Nopol</th>
			<th>Status</th>
			<th>Tanggal</th>
			<th>Lama(Hari)</th>
			<th>Harga</th>
			<th>Total</th>
			<th>Action</th>
		</tr>
		<?php
		include './connection/koneksi.php';
		$data = mysqli_query($con, "SELECT * FROM rental WHERE status=1");
		while ($arr = mysqli_fetch_array($data)) {

		?>
			<tr>
				<td><?php echo $arr['kode']; ?></td>
				<td><?php echo $arr['nama']; ?></td>
				<td><?php echo $arr['nopol']; ?></td>
				<td><?php if ($arr['status'] == 1) {
						echo "Rental";
					} else {
						echo "Selesai";
					} ?></td>
				<td><?php echo $arr['tanggal']; ?></td>
				<td><?php echo $arr['lama']; ?></td>
				<td>Rp.<?php echo $arr['total'] ?></td>
				<td>Rp.<?php echo $arr['total'] * $arr['lama']; ?></td>
				<td><a href="formeditrental.php?id=<?php echo $arr['id'] ?>">EDIT</a></td>
			</tr>
		<?php } ?>
	</table>

</body>

</html>