<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/build/') ?>css/pemesanan.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <style>
    .footer {
        border-top: 1px solid grey;
        height: 60px;
        bottom: 0;
        width: 100%;
        line-height: 2;
        font-size: 30px;
        text-align: center;
    }
    </style>
</head>

<body>
    <section id="header">
        <nav class="navbar navbar-expand-sm" style="background-color: #c6c6c6">
            <div class="row">
                <div class="col-3 text-center">
                    <h1 class="navbar-brand text-white" style="font-size: 32px">
                        SafeRoom
                    </h1>
                </div>
                <div class="col-4">
                    <div class="row justify-content-center"></div>
                </div>
                <div class="col-5 text-end">
                    <div class="navbar-nav">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tentang Kami
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
                            </ul>
                        </div>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-target="#profile" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> Hallo, <?= $this->session->userdata('full_name'); ?>
                            </a>
                            <ul class="dropdown-menu" id="profile">
                                <li><a class="dropdown-item" href="<?= base_url('home/profile') ?>"
                                        style="border-bottom: 1px solid black;"><i class="fa-solid fa-user"></i>
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('home/pesanansaya') ?>"
                                        style="border-bottom: 1px solid black;"><i class="fa-solid fa-briefcase"></i>
                                        Pesanan
                                        Saya</a></li>
                                <li><a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#"><i
                                            class="fa-solid fa-right-from-bracket"></i>Log
                                        out</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section id="content">
        <div class="container bg-light pb-4 mb-5">
            <div class="row justify-content-center">
                <h5 class="text-black mt-4">Hai, <?= $this->session->userdata('full_name'); ?></h5>
                <hr />
                <div class="col-lg-11 mt-5">
                    <div class="bungkusBakso" style="width: 100%; height: 100%; border: 2px solid grey">
                        <div class="bungkusSate p-4" style="height: 100%">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true" style="font-size: 21px;">
                                        Belum Dibayar
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false" style="font-size: 21px;">
                                        Terkonfirmasi
                                    </button>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="bdibayar text-center pt-3"
                                        style="background-color: #ececec; height:399px">
                                        <p> Tidak ada booking baru</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <div class="bdibayar text-center pt-3"
                                        style="background-color: #ececec; height:399px">
                                        <p> Tidak ada booking baru</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
        </div>
    </section>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>

</html>