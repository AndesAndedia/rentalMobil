<?php
	include './connection/koneksi.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$status = "";
        
        $id = $_POST['id'];

		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$nopol = $_POST['nopol'];
		$durasi = $_POST['lama'];
        $status = $_POST['kondisi'];

		function getBiayaRental($con, $nopol)
		{
			$query3 = "SELECT biaya FROM mobil WHERE nopol = '$nopol'";
			$result = mysqli_query($con, $query3);

			if ($result && mysqli_num_rows($result) > 0) {
				$data = mysqli_fetch_assoc($result);
				$biayaRental = $data['biaya'];
				return $biayaRental;
			}
		}

		$totalBiaya = getBiayaRental($con, $nopol) * $durasi;

		if ($totalBiaya) {
			$query = mysqli_query($con, "UPDATE rental set nik = '$nik', tanggal = '$tanggal', nopol = '$nopol', status = '$status', lama = '$durasi', total = '$totalBiaya' where id = '$id' ");
			$query2 = mysqli_query($con, "UPDATE mobil set status = 2 where nopol = '$nopol' ");
			if ($query && $query2) {
				$status = "Data berhasil diinput!";
				echo "<script>window.location.href = 'daftarTransaksi.php';</script>";
			    exit();
			} else {
				$status =  "Data gagal diinput!";
			}
		} else {
			$status =  "Data gagal diinput!";
            echo "Error: " . mysqli_error($con);
		}
	}
	?>