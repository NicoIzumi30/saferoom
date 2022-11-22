<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'>
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/build/') ?>css/payment.css">
</head>

<body>
    <section id="header">
        <nav class="navbar navbar-expand-sm" style="background-color: #C6C6C6;">
            <div class="row">
                <div class="col-3 text-center">

                    <h1 class="navbar-brand text-white" style="font-size: 32px;">SafeRoom</h1>
                </div>
                <div class="col-6">
                    <div class="row justify-content-center">
                    </div>
                </div>
                <div class="col-3 text-center">
                    <!-- Button trigger modal -->


                    <div class="dropdown mt-2">
                        <a class="btn btn-lg btn-secondary" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="border-radius:9999px;background-color:#a9a4a4;
                            border: none;">
                            <img fetchpriority="auto" src="https://massets.reddoorz.com/images/menu-white.png"
                                width="20px" height="auto" title loading="auto"
                                style="margin-right: 5px; margin-left: 5px;"><span style="margin-right: 5px;"> H
                            </span>
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
        </nav>
    </section>

    <section id="content">
        <div class="container mt-4 mb-5" style="min-height: 80vh;">
            <div class="teh2">
                <h3 style="color:rgba(0, 0, 0, 0.8)"><span><a href="<?= base_url('home/pemesanan') ?>"
                            class="text-black"> <i class="fa-solid fa-arrow-left mr-3"></i></a></i></span> Ringkasan
                    Pemesanan</h3>
            </div>
            <div class="row mt-1">
                <?php foreach ($category as $cat) : ?>
                <div class="col-lg-2 mt-3">
                    <div class="alert alert-danger text-center text-black" role="alert"
                        style="border-radius: 15px;padding: .7rem 1rem;font-size: 12px;">
                        <?= $cat->name ?>
                    </div>
                </div>
                <div class="col-lg-5 mt-3">
                    <div class="alert alert-success text-dark" role="alert">
                        <p style="margin-bottom: 0;">Jumlah total yang harus Dibayar <br><span class="fw-bold">Rp
                                249.330</span> </p>
                    </div>
                    <?php
                        $id = 1;
                        $payment = $this->db->get_where('payment_method', ['id_category' => $cat->id])->result();
                        ?>
                    <?php foreach ($payment as $pay) : ?>
                    <div class="accordion mt-3" id="<?= $pay->id_class ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?= $pay->id_class ?>"
                                    aria-expanded="false" aria-controls="<?= $pay->id_class ?>"
                                    style="padding: 25px;font-weight: 500;font-size: 17px;">
                                    <img src="<?= base_url('assets/image/payment/') . $pay->icon ?>" width="48px"
                                        alt=""> <?= $pay->method ?>
                                </button>
                            </h2>
                            <div id="<?= $pay->id_class ?>" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="<?= $pay->id_class ?>">
                                <div class="accordion-body" style="font-weight: 400;">
                                    <p> How it works?</p>
                                    <ul>
                                        <li>Anda akan diberi nomor rekening untuk pembayaran</li>
                                        <li>Pemesanan kamar akan dilakukan di langkah berikutnya</li>
                                        <li>Anda dapat menemukan semua petunjuk terkait untuk pembayaran bank Anda</li>
                                    </ul>
                                    <div class="order text-end">
                                        <a href="<?= base_url('home/booking') ?>">
                                            <button class="btn btn-danger">Pay Now</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>

                </div>
                <div class="col-lg-5 mt-3">
                    <div class="shYGY p-4">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?= base_url('assets/build/') ?>images/hotel-room-gbadde5f29_1920 2.png"
                                    width="100%" alt="">
                            </div>
                            <div class="col-8">
                                <h5>Sans Hotel Yogyakarta</h5>
                                <p style="font-size:12px;">Sans Hotel Ekkon Yogyakarta, Jalan HOS Cokroaminoto, Cokro
                                    Square, Jalan HOS
                                    Cokroaminoto, Tegalrejo, Tegalrejo, 55244, Yogyakarta, INDONESIA</p>
                            </div>
                        </div>
                        <div class="tbl3 p-2">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Mendaftar</td>
                                        <td>Periksa</td>
                                        <td>Room's</td>
                                    </tr>
                                </thead>
                                <tbody style="font-weight:500;font-size: 17px;">
                                    <tr>
                                        <td>Sunday, 13 Nov</td>
                                        <td>Monday, 14 Nov</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tbl2 p-2">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Tipe Kamar</td>
                                    </tr>
                                </thead>
                                <tbody style="font-weight:500;font-size: 17px;">
                                    <tr>
                                        <td>Superior Twin Room</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tbl1 p-2 mt-4">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>Tamu</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody style="font-weight:500;font-size: 17px;">
                                    <tr>
                                        <td>Mr <?= $this->session->userdata('name'); ?></td>
                                        <td> <?= $this->session->userdata('email'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        </div>
        <div class="footer">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
        </div>
    </section>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    </div>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>