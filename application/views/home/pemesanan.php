<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/build/') ?>css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url('assets/build/') ?>css/demo.css">
    <link rel="stylesheet" href="<?= base_url('assets/build/') ?>css/pemesanan.css">
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
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
                        <a class="btn btn-lg btn-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:9999px;background-color:#a9a4a4;
                            border: none;">
                            <img fetchpriority="auto" src="https://massets.reddoorz.com/images/menu-white.png" width="20px" height="auto" title loading="auto" style="margin-right: 5px; margin-left: 5px;"><span style="margin-right: 5px;"> H
                            </span>
                        </a>

                        <ul class="dropdown-menu" id="profile">
                            <li><a class="dropdown-item" href="<?= base_url('home/profile') ?>" style="border-bottom: 1px solid black;"><i class="fa-solid fa-user"></i>
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('home/pesanansaya') ?>" style="border-bottom: 1px solid black;"><i class="fa-solid fa-briefcase"></i>
                                    Pesanan
                                    Saya</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#"><i class="fa-solid fa-right-from-bracket"></i>Log
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
                <h3 style="color:rgba(0, 0, 0, 0.8)"><span><a href="<?= base_url('home/halaman3') ?>" class="text-black"> <i class="fa-solid fa-arrow-left mr-3"></i></a></span> Ringkasan
                    Pemesanan</h3>
            </div>
            <form action="<?= base_url('home/payment') ?>" method="post">
                <div class="row">
                    <div class="col-lg-7 mt-5">
                        <div class="coba123">
                            <div class="wadahYGY p-4 py-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="<?= $this->session->userdata('email') ?>" id="exampleFormControlInput1" readonly>
                                </div>
                                <?php $nama = explode(' ', $this->session->userdata('full_name')); ?>
                                <div class="input-group mb-3">
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <label for="first_name" class="form-label">Nama Depan</label>
                                            <input type="text" class="form-control" value="<?= $nama[0] ?>" name="first_name" id="first_name" readonly>
                                        </div>
                                        <div class="col-md">
                                            <label for="last_name" class="form-label">Nama
                                                Belakang</label>
                                            <?php if (isset($nama[1])) { ?>
                                                <input type="text" class="form-control" value="<?= $nama[1] ?>" name="last_name" id="last_name" required>
                                            <?php } else { ?>
                                                <input type="text" class="form-control" value="" name="last_name" id="last_name" readonly>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-3">
                                    <label for="phone" class="form-label col-12">Nomot Telpon</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Nomor Telpon" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 mt-5">
                        <div class="shYGY p-4">
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?= base_url('assets/build/') ?>images/hotel-room-gbadde5f29_1920 2.png" width="100%" alt="">
                                </div>
                                <div class="col-8">
                                    <h5><?= $room['room_name']; ?></h5>
                                    <p style="font-size:12px;"><?= $room['address']; ?></p>
                                </div>
                            </div>
                            <div class="tbl3 p-2 mt-4">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Checkin</td>
                                            <td>Checkout</td>
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight:500;font-size: 17px;">
                                        <tr>
                                            <td><?= $date['checkin']; ?></td>
                                            <td><?= $date['checkout']; ?></td>
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
                                            <td><?= $room['name']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tbl1 mt-3 p-1">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td>Harga Kamar</td>
                                            <td class="cikula">Rp <?= number_format($room['price']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pajak & Biaya Layanan</td>
                                            <td class="cikula">Termasuk</td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $no =  $room['price'];
                                            $ppn = 10000;
                                            $layanan = $no / 100 + $ppn;
                                            $total = $no + $layanan;
                                            ?>
                                            <td>Platform fee</td>
                                            <td class="cikula">Rp <?= number_format($layanan); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bisa Refund</td>
                                            <td class="cikula">Iya</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mt-4">Jumlah Biaya</h5>
                                            </td>
                                            <td>
                                                <h5 class="mt-4 text-end"> Rp <?= number_format($total) ?></h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="checkin" value="<?= $date['checkin'] ?>">
                                <input type="hidden" name="checkout" value="<?= $date['checkout'] ?>">
                                <input type="hidden" name="email" value="<?= $this->session->userdata('email') ?>">
                                <input type="hidden" name="name" value="<?= $this->session->userdata('full_name') ?>">
                                <input type="hidden" name="room" value="<?= $room['room_name'] ?>">
                                <input type="hidden" name="address" value="<?= $room['address'] ?>">
                                <input type="hidden" name="id" value="<?= $room['id'] ?>">
                                <input type="hidden" name="type" value="<?= $room['name'] ?>">
                                <input type="hidden" name="harga" value="<?= $room['price'] ?>">
                                <input type="hidden" name="hotel" value="<?= $room['hotel_id'] ?>">
                                <input type="hidden" name="layanan" value="<?= $layanan ?>">
                                <input type="hidden" name="total" value="<?= $total ?>">
                            </div>
                            <div class="col-11 mx-auto">
                                <button type="submit" class="btn btn-danger text-center w-100">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="footer">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
        </div>
    </section>
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
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/build/') ?>js/intlTelInput.js"></script>
    <script>
        $("#phone").intlTelInput({
            utilsScript: "js/utils.js"
        });
    </script>
</body>