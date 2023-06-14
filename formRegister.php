<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <title>Registrasi MoovOn</title>
</head>

<body class="container-sm bg-light">
    <!-- Start Header form -->
    <div class="text-center pt-5">
        <img src="assets/logo.jpeg" alt="logo" width="72" height="72" />
        <h2>Registrasi MoovOn</h2>
        <p>
            Berikut ini beberapa data yang perlu diisi untuk melakukan rental di MoovOn
        </p>
    </div>
    <!-- End Header form -->

    <!-- Start Card -->
    <div class="card">
        <!-- Start Card Body -->
        <div class="card-body">
            <!-- Start Form -->
            <form id="bookingForm" action="register2.php" method="POST" class="needs-validation" novalidate autocomplete="off">
                <!-- Start Input Name -->
                <div class="form-group">
                    <label for="inputName">Nama</label>
                    <input type="text" class="form-control" id="inputName" name="nama" placeholder="Nama Anda" required />
                    <div class="invalid-feedback">Silahkan isi nama Anda.</div>
                </div>
                <!-- End Input Name -->

                <!-- Start Input Name -->
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username Anda" required />
                    <div class="invalid-feedback">Silahkan isi username Anda.</div>
                </div>
                <!-- End Input Name -->

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password Anda" pattern=".{8,}" title="Eight or more characters" required />
                    <div class="invalid-feedback">Silahkan isi password Anda dengan minimal 8 karakter.</div>
                </div>

                <!-- Start Input Telephone -->
                <div class="form-group">
                    <label for="inputPhone">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="inputPhone" name="no_telp" placeholder="08********" pattern="[0-9]{8,}" required />
                    <div class="invalid-feedback">Silahkan isi nomor telepon Anda dengan minimal 8 digit.</div>
                </div>
                <!-- End Input Telephone -->

                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label> <br>
                    <input type="radio" name="jk" value="Laki-laki" required> &nbsp <label for="">Laki-laki</label> &nbsp
                    <input type="radio" name="jk" value="Perempuan"> &nbsp <label for="">Perempuan</label>
                    <div class="invalid-feedback">Silahkan pilih jenis kelamin Anda.</div>
                </div>

                <!-- Start Input NIK -->
                <div class="form-group">
                    <label for="inputNIK">NIK</label>
                    <input type="text" class="form-control" id="inputNIK" name="nik" placeholder="NIK Anda" pattern="[0-9]{16}" title="NIK harus terdiri dari 16 angka" required />
                    <div class="invalid-feedback">Silahkan isi NIK Anda dengan 16 angka.</div>
                </div>
                <!-- End Input NIK -->

                <!-- Start Input SIM -->
                <div class="form-group">
                    <label for="inputSIM">SIM</label>
                    <input type="text" class="form-control" id="inputSIM" name="sim" placeholder="SIM Anda" required />
                    <div class="invalid-feedback">Silahkan isi nomor SIM Anda.</div>
                </div>
                <!-- End Input SIM -->

                <!-- Start Input Alamat -->
                <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Masukkan Alamat Anda" required />
                    <div class="invalid-feedback">Silahkan isi alamat Anda.</div>
                </div>
                <!-- End Input Alamat -->

                <!-- Start Submit Button -->
                <button class="btn btn-primary btn-block col-lg-2" type="submit">Submit</button>
                <!-- End Submit Button -->
            </form>
            <!-- End Form -->
        </div>
        <!-- End Card Body -->
    </div>
    <!-- End Card -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Start Script for Form -->
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!-- End Script for Form -->
</body>

</html>