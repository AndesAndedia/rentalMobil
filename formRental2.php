<?php
include './connection/koneksi.php';
require 'header2.php';
$nopol = $_GET['nopol'];
$nik = $arr['nik'];

$query = mysqli_query($con, "SELECT * FROM pelanggan WHERE nik='$nik'");
$query2 = mysqli_query($con, "SELECT * FROM mobil WHERE nopol='$nopol'");
$data = mysqli_fetch_array($query);
$data2 = mysqli_fetch_array($query2);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai tanggal mulai dan tanggal selesai dari formulir
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Mengubah tanggal menjadi format timestamp
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    // Menghitung selisih dalam detik
    $durationSeconds = $endTimestamp - $startTimestamp;

    // Menghitung durasi dalam hari
    $durationDays = floor($durationSeconds / (60 * 60 * 24));

    $status = "";

    $nama = $_POST['nama'];
    $jk = $_POST['jk'] ?? '';
    $sim = $_POST['sim'];
    $no = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['startDate'];
    $nopol = $data2['nopol'];

    // Validasi

    if (empty($tanggal)) {
        $errors[] = "Tanggal harus diisi";
    }

    if ($durationDays < 0) {
        $status = "Tanggal anda tidak valid ! ";
    } else {
        function getBiayaRental($con, $nopol)
        {
            $query = mysqli_query($con, "SELECT biaya FROM mobil WHERE nopol = '$nopol'");
            $result = mysqli_fetch_assoc($query);
            return $result['biaya'];
        }
        $totalBiaya = getBiayaRental($con, $nopol) * $durationDays;

        if ($totalBiaya) {
            $query = mysqli_query($con, "UPDATE pelanggan SET nama = '$nama', jk = '$jk', sim = '$sim', no_telp = '$no', alamat = '$alamat' where nik = '$nik' ");
            $query2 = mysqli_query($con, "INSERT INTO rental (nik, tanggal, nopol, status, lama, total) VALUES ('$nik', '$tanggal', '$nopol', '0', '$durationDays', '$totalBiaya')");
            $query3 = mysqli_query($con, "UPDATE mobil set status = 2 where nopol = '$nopol' ");

            if ($query && $query2 && $query3) {
                sleep(5);
                $status = "Data berhasil diinput!";
                echo "<script>window.location.href = 'daftarRental2.php?status=" . urlencode($status) . "';</script>";
                exit();
            } else {
                $status =  "Data gagal diinput!";
            }
        } else {
            $status =  "Data gagal diinput!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rental</title>

    <link rel="stylesheet" href="form.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <div class="card">
                <div class="form">
                    <div class="left-side">
                        <div class="left-heading">
                            <h3>Daftar Rental</h3>
                        </div>
                        <div class="steps-content">
                            <h3>Langkah <span class="step-number">1</span></h3>
                            <p class="step-number-content active">Masukkan data Anda</p>
                            <p class="step-number-content d-none">Pilih mobil yang Anda inginkan</p>
                            <p class="step-number-content d-none">Pilih jadwal rental yang Anda inginkan</p>
                        </div>
                        <ul class="progress-bar">
                            <li class="active">Data Pelanggan</li>
                            <li>Pilihan Mobil</li>
                            <li>Waktu Rental Mobil</li>
                        </ul>

                    </div>
                    <div class="right-side">
                        <!-- Langkah 1 -->
                        <div class="main active">
                            <small><i class="fa fa-smile-o"></i></small>
                            <div class="text">
                                <h2>Cek Kembali Data Anda</h2>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">Nama</label>
                                    <input type="text" required require id="user_name" name="nama" value="<?php echo $data['nama']; ?>">
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">NIK</label>
                                    <input type="text" required require readonly name="nik" value="<?php echo $data['nik']; ?>">
                                </div>
                                <div class="input-div">
                                    <label for="">SIM</label>
                                    <input type="text" required require name="sim" value="<?php echo $data['sim']; ?>">
                                </div>
                            </div>

                            <div class="input-text">
                                <span>Jenis Kelamin</span>
                                <div class="input-div">
                                    <input type="radio" name="jk" value="Laki-laki" <?php if ($data['jk'] == 'Laki-laki') echo "checked"; ?>>
                                    <label for="laki-laki"> Laki-laki</label>
                                    <input type="radio" name="jk" value="Perempuan" <?php if ($data['jk'] == 'Perempuan') echo "checked"; ?>>
                                    <label for="perempuan"> Perempuan</label>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input type="text" required require name="no_telp" value="<?php echo $data['no_telp']; ?>">
                                </div>
                                <div class="input-div">
                                    <label for="">Alamat</label>
                                    <input type="text" required require name="alamat" value="<?php echo $data['alamat']; ?>">
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="next_button">Next Step</button>
                            </div>
                            <br> <br>
                        </div>


                        <!-- Langkah 2 -->
                        <div class="main">
                            <small><i class="fa fa-smile-o"></i></small>
                            <div class="text">
                                <h2>Mobil</h2>
                                <p>Masukkan pilihan mobil yang Anda inginkan</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">Jenis Mobil</label>
                                    <input type="text" required require readonly name="jenis" value="<?php echo $data2['jenis']; ?>">
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">Merk Mobil</label>
                                    <input type="text" required require readonly name="merk" value="<?php echo $data2['merk']; ?>">
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button class="back_button">Back</button>
                                <button class="next_button">Next Step</button>
                            </div>

                        </div>

                        <!-- Transaksi -->
                        <div class="main">
                            <small><i class="fa fa-smile-o"></i></small>
                            <div class="text">
                                <h2>Jadwal</h2>
                                <p>Kapan Anda akan meminjam mobilnya?</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="startDate">Tanggal Mulai</label>
                                    <input type="date" name="startDate" required>
                                </div>
                                <div class="input-div">
                                    <label for="endDate">Tanggal Selesai</label>
                                    <input type="date" name="endDate" required>
                                </div>
                            </div>

                            <div class="buttons button_space">
                                <button class="back_button">Back</button>
                                <button class="submit_button">Selesai</button>
                            </div>
                        </div>
                    </div>
                    <div class="main">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>

                        <div class="text congrats">
                            <h2>Congratulations!</h2>
                            <p>Terima Kasih Ny/Tn <span class="shown_name"></span><br>Data Anda akan segera kami proses untuk proses rental mobil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

    <script>
        var next_click = document.querySelectorAll(".next_button");
        var main_form = document.querySelectorAll(".main");
        var step_list = document.querySelectorAll(".progress-bar li");
        var num = document.querySelector(".step-number");
        let formnumber = 0;

        next_click.forEach(function(next_click_form) {
            next_click_form.addEventListener('click', function() {
                if (!validateform()) {
                    return false
                }
                formnumber++;
                updateform();
                progress_forward();
                contentchange();
            });
        });

        var back_click = document.querySelectorAll(".back_button");
        back_click.forEach(function(back_click_form) {
            back_click_form.addEventListener('click', function() {
                formnumber--;
                updateform();
                progress_backward();
                contentchange();
            });
        });

        var username = document.querySelector("#user_name");
        var shownname = document.querySelector(".shown_name");


        var submit_click = document.querySelectorAll(".submit_button");
        submit_click.forEach(function(submit_click_form) {
            submit_click_form.addEventListener('click', function() {
                shownname.innerHTML = username.value;
                formnumber++;
                updateform();
            });
        });

        var heart = document.querySelector(".fa-heart");
        heart.addEventListener('click', function() {
            heart.classList.toggle('heart');
        });


        var share = document.querySelector(".fa-share-alt");
        share.addEventListener('click', function() {
            share.classList.toggle('share');
        });



        function updateform() {
            main_form.forEach(function(mainform_number) {
                mainform_number.classList.remove('active');
            })
            main_form[formnumber].classList.add('active');
        }

        function progress_forward() {
            // step_list.forEach(list => {

            //     list.classList.remove('active');

            // }); 


            num.innerHTML = formnumber + 1;
            step_list[formnumber].classList.add('active');
        }

        function progress_backward() {
            var form_num = formnumber + 1;
            step_list[form_num].classList.remove('active');
            num.innerHTML = form_num;
        }

        var step_num_content = document.querySelectorAll(".step-number-content");

        function contentchange() {
            step_num_content.forEach(function(content) {
                content.classList.remove('active');
                content.classList.add('d-none');
            });
            step_num_content[formnumber].classList.add('active');
        }

        function validateform() {
            validate = true;
            var validate_inputs = document.querySelectorAll(".main.active input");
            validate_inputs.forEach(function(vaildate_input) {
                vaildate_input.classList.remove('warning');
                if (vaildate_input.hasAttribute('require')) {
                    if (vaildate_input.value.length == 0) {
                        validate = false;
                        vaildate_input.classList.add('warning');
                    }
                }
            });
            return validate;
        }
    </script>
</body>

</html>