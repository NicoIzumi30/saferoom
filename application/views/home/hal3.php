<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman 3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .imgHome {
            width: 100%;
            display: flex;
            max-width: 1280px;
            margin: 0 auto;
            margin-top: 12px;
            position: relative;
            box-sizing: border-box;
        }

        .img1 {
            width: 50%;
        }

        .imgHome .img1 img {
            width: 100%;
            height: 450px;
            border-radius: 16px 0 0 16px;
            object-fit: cover;
        }

        .img2 {
            width: 50%;
            position: relative;
            /* padding: 0;
    background-color: red; */
        }

        .imgHome .img2 img {
            object-fit: cover;
            width: 49%;
            height: 225px;
            padding-bottom: 5px;
            padding-left: 5px;
            box-sizing: border-box;
        }

        .igTop {
            border-radius: 0 16px 0 0;
        }

        .igBottom {
            border-radius: 0 0 16px 0;
        }

        body {
            scroll-behavior: smooth;
        }

        @media(max-width:756px) {

            .imgHome .img1 img {
                width: 100%;
                height: 250px;
                border-radius: 16px 0 0 16px;
                object-fit: cover;
            }

            .img2 {
                width: 50%;
                position: relative;
                /* padding: 0;
    background-color: red; */
            }

            .imgHome .img2 img {
                object-fit: cover;
                width: 49%;
                height: 125px;
                padding-bottom: 5px;
                padding-left: 5px;
                box-sizing: border-box;
            }



        }

        .footer {
            border-top: 1px solid grey;
            height: 60px;
            bottom: 0;
            width: 100%;
            line-height: 1.6;
            font-size: 30px;
            text-align: center;
        }

        .shYGY {
            box-shadow: 0px 0px 10px 0px #00000040;
            border-radius: 10px;
            height: auto;
        }

        .tbl3 {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border: 1px solid rgba(120, 120, 120, 0.8);
            border-bottom: none;
            font-size: 14px;
            font-weight: 500;
            line-height: 30px;
        }

        .tbl2 {
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            border: 1px solid rgba(120, 120, 120, 0.8);
            font-size: 14px;
            line-height: 30px;
            font-weight: 500;

        }

        .tbl21 {
            border-radius: 15px;
            border: 1px solid rgba(120, 120, 120, 0.8);
            font-size: 14px;
            line-height: 30px;
            font-weight: 500;

        }

        .tbl21 table tr td {
            padding-left: 10px;
        }

        .tbl1 table tr td {
            font-size: 14px;
            line-height: 21px;
            font-weight: 400;
        }

        .tbl1 table tr .cikula {
            text-align: end;
            font-weight: 600;
        }

        .about p {
            font-size: 15px;
            font-weight: 400;
        }

        .kebijakan {
            border-radius: 10px;
            box-shadow: 0px 0px 12px 5px rgba(0, 0, 0, 0.25);
        }

        .keijakan ul li {
            font-size: 12px;
            font-weight: 400;
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
                <div class="col-6">
                    <div class="row justify-content-center"></div>
                </div>
                <div class="col-3 text-center">
                    <div class="dropdown mt-2">
                        <a class="btn btn-lg btn-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="
                  border-radius: 9999px;
                  background-color: #a9a4a4;
                  border: none;
                ">
                            <img fetchpriority="auto" src="https://massets.reddoorz.com/images/menu-white.png" width="20px" height="auto" title loading="auto" style="margin-right: 5px; margin-left: 5px" /><span style="margin-right: 5px"> H </span>
                        </a>

                        <ul class="dropdown-menu" style="padding-bottom: 0.5px">
                            <li><a class="dropdown-item" href="#">Profile Saya</a></li>
                            <li><a class="dropdown-item" href="#">Saya Booking</a></li>
                            <li>
                                <a class="dropdown-item" href="#" style="border-bottom: none">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section id="content">
        <div class="container  mb-5">
            <div class="row mt-3">
                <div class="imgHome">
                    <div class="img1">
                        <img width="auto" height="auto" src="<?= base_url('assets/build/images/') ?>img.jpg" class="" />
                    </div>
                    <div class="img2">
                        <img width="auto" height="auto" src="<?= base_url('assets/build/images/') ?>img.jpg" class="" />
                        <img width="auto" height="auto" src="<?= base_url('assets/build/images/') ?>img.jpg" class="igTop" />
                        <img width="auto" height="auto" src="<?= base_url('assets/build/images/') ?>img.jpg" class="" />
                        <img width="auto" height="auto" src="<?= base_url('assets/build/images/') ?>img.jpg" class="igBottom" />
                    </div>
                </div>
            </div>
            <div class="row  mb-5">
                <div class="col-lg-8 mt-3 pl-3 pr-5" style="min-height: 80vh">
                    <h4>Sans Hotel Yogyakarta</h4>
                    <p class="mt-3">Jalan HOS Cokroaminoto, Cokro Square, Jalan HOS Cokroaminoto, Tegalrejo, Tegalrejo,
                        Indonesia</p>
                    <hr>
                    <h4>Fasilitas</h4>
                    <table width="100%">
                        <tr>
                            <td><img src="https://dgov63yz6bnpt.cloudfront.net/uploads/facility_configuration/image/21/TV.png" width="35px" height="auto" /> Televisi</td>
                            <td><img src="https://dgov63yz6bnpt.cloudfront.net/uploads/facility_configuration/image/50/keyboard_New.png" width="35px" height="auto" /> AC</td>
                            <td><img src="https://dgov63yz6bnpt.cloudfront.net/uploads/facility_configuration/image/60/Reception_New.png" width="35px" height="auto" /> Resepsionis</td>
                        </tr>
                    </table>
                    <hr>
                    <h4>Lihat di dalam peta</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.053212309761!2d110.3534053143275!3d-7.88950208066683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sid!2sid!4v1668356664084!5m2!1sid!2sid" width="100%" height="320" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <hr>
                    <div class="about">
                        <h4>Tentang Hotel</h4>
                        <p>Sans Hotel Ekkon Yogyakarta adalah hotel terbaik bagi Anda yang berjiwa muda dan penuh semangat.
                            Dapatkan layanan optimum dari kami.</p>
                        <p>Sans Hotel Ekkon Yogyakarta dilengkapi oleh beragam fasilitas penunjang kenyamanan, seperti;
                            kamar
                            non-smoking, Wifi, LED-TV, resepsionis 24 jam, air mineral kemasan, perlengkapan mandi, area
                            umum,
                            arena bermain, kopi gratis, dan AC.</p>
                        <p>Lokasi hotel juga dikelilingi oleh beragam pusat wisata, perbelanjaan, dan hiburan, seperti;
                            Malioboro
                            Jogjakarta (1,4 km), Jogja National Museum (1,2 km), Taman Pintar Yogyakarta (2,8 km), Gembira
                            Loka
                            Zoo
                            (6 km), Pasar Beringharjo (2,1 km), Galeria Mall (3,3 km), dan Plaza Ambarrukmo (5,8 km).</p>
                    </div>

                    <div class="kebijakan p-2 mt-4">
                        <h5>Kebijakan Properti</h5>
                        <ul>
                            <li>Check in mulai pukul 14:00 hingga 04:00 di hari selanjutnya
                                Check out sebelum pukul 12:00</li>
                            <li>Check in mulai pukul 14:00 hingga 04:00 di hari selanjutnya
                                Check out sebelum pukul 12:00</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 px-2">
                    <div class="shYGY p-4" style="box-shadow: 0px 0px 10px 0px #00000040;
                border-radius: 10px;">
                        <div class="row">
                            <h4>Rp 235.000</h4>
                        </div>
                        <div class="tbl3 p-2 mt-3">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Mendaftar</td>
                                        <td>Periksa</td>
                                    </tr>
                                </thead>
                                <tbody style="font-weight:500;font-size: 17px;">
                                    <tr>
                                        <td>Sunday, 13 Nov</td>
                                        <td>Monday, 14 Nov</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tbl2 p-2">
                            <table width="100%">
                                <tbody style="font-weight:500;font-size: 17px;">
                                    <tr>
                                        <td>Room's</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4>1</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tbl21  mt-3">
                            <table width="100%">
                                <thead>
                                    <tr style="font-weight:500;font-size: 15px;">
                                        <td>Tipe Kamar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Sale Room
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-11 mx-auto mt-4">
                            <button type="submit" class="btn btn-danger text-center w-100">Pesan Sekarang</button>
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

</body>

</html>