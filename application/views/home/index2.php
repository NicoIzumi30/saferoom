<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/demo.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/style.css">


    <!-- <link rel="stylesheet" href="stylee.css"> -->

    <style>
        .dropdown-menu[data-bs-popper] {
            top: 100%;
            left: -100px;
            margin-top: 1.2rem;
        }

        .dropdown-item {
            font-size: 23px;
            border-bottom: .5px solid black;


        }
    </style>


</head>

<body>
    <div class="sc1">
        <nav class="navbar navbar-expand-lg" style="background-color: transparant;">
            <div class="container-fluid">
                <div class="col-md-10">
                    <h1 class="p-3 text-white">Safe Room</h1>
                </div>
                <div class="col-md-2">

                    <?php
                    if ($this->session->userdata('email')) {
                    ?>
                        <div class="dropdown">
                            <a class="btn btn-lg btn-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:9999px">
                                <img fetchpriority="auto" src="https://massets.reddoorz.com/images/menu-white.png" width="24px" height="auto" title loading="auto" style="margin-right: 10px; margin-left: 10px;"><span style="margin-right: 10px;"> H
                                </span>
                            </a>

                            <ul class="dropdown-menu" style="border-radius: 15px; padding-bottom:.5px ;">
                                <li><a class="dropdown-item" href="<?= base_url('home/profile') ?>">Profile Saya</a></li>
                                <li><a class="dropdown-item" href="#">Saya Booking</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('home/logout') ?>" style="border-bottom: none;">Keluar</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="<?= base_url('home/login') ?>">
                            <button type="button" class="btn btn-lg" style="border-radius:9999px; background-color: #ffffff5c; color: #fff; height: 50px;">
                                Gabung | Daftar
                            </button>
                        </a>
                    <?php } ?>
                </div>
            </div>




        </nav>

    </div>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Login
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
        Register
    </button> -->


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('home/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="text-center">
                                <h2>Login</h2>
                            </div>
                            <form method="POST" action="<?= base_url('home/login') ?>">
                                <div class=" mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Masukkan Password">
                                </div>
                                <div class="col-md-9 mt-4 text-center mx-auto">
                                    <p>
                                        Belum Punya Akun? <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#register">Daftar Disini</a>
                                    </p>
                                </div>
                                <div class="text-center mb-4 mt-4">
                                    <button type="submit" class="btn btn-primary col-12">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="text-center">
                                <h2>Register</h2>
                            </div>
                            <form method="POST" action="<?= base_url('home/registrasi') ?>">
                                <div class=" mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Nama Lengkap" aria-describedby="emailHelp">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class=" mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        placeholder="Alamat Surat Elektronik" aria-describedby="emailHelp">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class=" mb-3">
                                    <label for="phone" class="form-label col-12">Nomot Telpon</label>
                                    <input type="tel" name="phone" id="phone" class="form-control"
                                        placeholder="Nomor Telpon" style="width: 100% !important;">
                                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class=" mb-3">
                                    <label for="password1" class="form-label">Kata Sandi</label>
                                    <input type="password" class="form-control" name="password1" id="password1"
                                        placeholder="Kata Sandi" aria-describedby="pw">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    <div id="pw" class="form-text">At least 8 char, use at least 1 upper and 1 lower
                                        case, 1 number, and 1
                                        symbol(!@?#$%^&*-+=_)</div>
                                </div>
                                <div class=" mb-3">
                                    <label for="password2" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" name="password2" id="password2"
                                        placeholder="Konfirmasi Kata Sandi" aria-describedby="pw">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>


                                    <div class="col-md-2"></div>
                                    <div class="col-md-9 mt-4 text-center mx-auto">
                                        <p>Dengan masuk atau membuat akun, Anda setuju dengan kami <a href="#"> Syarat &
                                                Ketentuan</a>
                                            Dan <a href="#">Kebijakan Privasi</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-primary col-12">Daftar Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.4/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/build/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js">
    </script>

    <script src="<?= base_url() ?>assets/build/js/intlTelInput.js"></script>
    <script>
        $("#phone").intlTelInput({
            utilsScript: "<?= base_url() ?>assets/build/js/utils.js"
        });
    </script>
</body>

</html>