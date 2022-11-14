<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    <style>
        .footer {
            border-top: 1px solid grey;
            height: 60px;
            bottom: 0;
            width: 100%;
            line-height: 1.6;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <h2>SafeRoom</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="row">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tentang Kami
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
                            </ul>
                        </div>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-target="#profile" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> Hallo, Jalu
                            </a>
                            <ul class="dropdown-menu" id="profile">
                                <li><a class="dropdown-item" href="<?= base_url('home/profile') ?>" style="border-bottom: 1px solid black;"><i class="fa-solid fa-user"></i>
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('home/pesanansaya') ?>" style="border-bottom: 1px solid black;"><i class="fa-solid fa-briefcase"></i> Pesanan
                                        Saya</a></li>
                                <li><a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#"><i class="fa-solid fa-right-from-bracket"></i>Log
                                        out</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </nav>

    <div class="row justify-content-center" style="min-height: 80vh; justify-content:space-between">
        <div class="col-lg-5 col-md-10 col-sm-11 mt-5 h-50" style="border: 1px solid grey; background-color: #f8f8f8; padding:0 ;">
            <h5 class="px-3 py-1">Pengaturan Akun</h5>
            <div class="kotak-abu" style="background-color: grey;">
                <h6 class="px-3 py-2 text-white">Informasi Login Anda</h4>
            </div>

            <div class="px-3" style="font-size: 14px;">
                <p>Nama - <?= $this->session->userdata('full_name') ?></p>
                </p>
                <p>Alamat email - <?= $this->session->userdata('email') ?></p>
                </p>
                <p>Kata Sandi - <small class="text-danger" style="font-size: 11px;"> <a href="<?= base_url('home/change_password') ?>" class="text-danger text-decoration-none">Ganti Password</a> </small> </p>
            </div>
        </div>
    </div>
    <div class="footer">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook"></i>
    </div>

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
                    <a class="btn btn-primary" href="<?= base_url('home/login') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>