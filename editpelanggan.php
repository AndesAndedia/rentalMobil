<?php
    include './connection/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = "";

        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $sim = $_POST['sim'];
		$no = $_POST['no_telp'];
		$alamat = $_POST['alamat'];

		$query = mysqli_query($con, "UPDATE pelanggan set nama = '$nama', jk = '$jk', sim = '$sim', no_telp = '$no', alamat = '$alamat' where nik = '$nik'");
		if ($query) {
			$status = "Data berhasil diinput!";
			echo "<script>window.location.href = 'daftarPelanggan.php';</script>";
			exit();
		} else {
			$status =  "Data gagal diinput!";
		}
	}
    ?>