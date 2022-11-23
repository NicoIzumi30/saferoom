<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/styleU.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/fontawesome/css/all.min.css">
    <script type='text/javascript' src='<?= base_url() ?>assets/build/js/popper.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/build/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        font-size: 18px;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    </style>

</head>

<body>
    <section id="header-bg">
        <div class="sc1">
            <div class="row justify-content-center">
                <div class="col-11">
                    <nav class="navbar navbar-expand-lg" style="background-color: transparant;">
                        <div class="col-md-10">
                            <h1 class="p-3 text-white" style="font-size: 32px;">SafeRoom</h1>
                        </div>
                        <div class="col-md-2 text-end">
                            <?php
                            if ($this->session->userdata('email')) {
                            ?>
                            <div class="dropdown">
                                <a class="btn btn-lg btn-secondary" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="border-radius:9999px">
                                    <img fetchpriority="auto" src="https://massets.reddoorz.com/images/menu-white.png"
                                        width="20px" height="auto" title loading="auto"
                                        style="margin-right: 5px; margin-left: 5px;"><span style="margin-right: 5px;"> H
                                    </span>
                                </a>

                                <ul class="dropdown-menu" style="border-radius: 15px; padding-bottom:.5px ;">
                                    <li><a class="dropdown-item" href="profile.html">Profile Saya</a></li>
                                    <li><a class="dropdown-item" href="booking.html">Saya Booking</a></li>
                                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"
                                            style="border-bottom: none;">Keluar</a>
                                    </li>
                                </ul>
                            </div>
                            <?php } else { ?>
                            <a href="<?= base_url('home/login') ?>">
                                <button type="button" class="btn btn-lg"
                                    style="border-radius:9999px; background-color: #ffffff5c; color: #fff;font-size:15px; height: 50px;">
                                    Gabung | Daftar
                                </button>
                            </a>
                            <?php } ?>

                        </div>
                    </nav>

                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-5 mt-5">
                            <div class="input-group mb-3 mt-4">
                                <input type="text" class="form-control"
                                    placeholder="&nbsp Enter a City, Locality or Hotel"
                                    aria-label="Enter a City, Locality or Hotel" aria-describedby="basic-addon2"
                                    style="border: none; border-bottom-left-radius: 9999px;border-top-left-radius: 9999px; background-color: #D6D6D6; box-shadow: none; height: 45px;">
                                <button type="submit" class="input-group-text" id="basic-addon2" style="border: none; border-bottom-right-radius: 9999px;border-top-right-radius: 9999px; background-color: #b9b9b9;
                        ;">
                                    <table>
                                        <tr>
                                            <td><i class="fa-solid fa-magnifying-glass"></i></td>
                                            <td class="ml-2">Cari</td>
                                        </tr>
                                    </table>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="content">
        <div class="row justify-content-center  mt-5">
            <div class="col-11">
                <div>
                    <div class="kota-populer" style="overflow: hidden; position: relative;">
                        <div class="h3">
                            Kota Populer
                        </div>
                        <div class="img-city mt-3 " style="overflow-x: scroll; display: flex;">
                            <?php
                            foreach ($city as $kota) :
                            ?>
                            <div class="city-detail text-center mx-2">
                                <a href="<?= base_url('home/list/') . $kota->id ?>">
                                    <img src="<?= base_url() ?>assets/image/city/<?= $kota->image ?>">
                                    <p style="font-weight:500"><?= $kota->city ?></p>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="kamar-hotel p-3  mt-5">
                        <div class="list-kamar">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="mb-3">Tempat Populer</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($room as $kamar) : ?>
                                                <div class="swiper-slide">
                                                    <a href="<?= base_url('home/halaman3/') . $kamar->id ?>">
                                                        <div class="card col-md-12 mt-3">
                                                            <?php $img = explode(',', $kamar->image); ?>git
                                                            <img src="<?= base_url('assets/image/room/') . $img[0] ?>"
                                                                class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <?php $add = explode(' ', $kamar->address); ?>
                                                                <p class="card-text"><?= $add[0] ?> <?= $add[1] ?>
                                                                    <?= $add[2] ?> <?= $add[3] ?></p>
                                                                <p class="card-text"><i
                                                                        class="fa-solid fa-location-dot"></i>
                                                                    Jakarta</p>
                                                                <p class="card-text text-danger">Rp
                                                                    <?= number_format($kamar->price) ?></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>





                </div>
            </div>
        </div>

    </section>

    <section id="about">

        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-11">
                <div class="about p-5">
                    <div>
                        <h1><span style="color:#000000;">Pesan Hotel Murah di Indonesia yang Bernilai untuk Anda</span>
                        </h1>

                        <p><span style="color:#000000;">Apakah Anda merencanakan perjalanan Anda berikutnya ke
                                Indonesia? Sebagai rumah bagi populasi terbesar keempat di dunia, negara cantik ini
                                memiliki lebih dari 17.000 pulau dengan 6.000 di antaranya berpenghuni. Dari
                                jalan-jalan, berbelanja, dan lainnya, ada banyak sekali aktivitas untuk setiap wisatawan
                                di Indonesia.</span></p>

                        <p><span style="color:#000000;">Dengan ribuan pulau untuk dijelajahi, Indonesia menawarkan
                                beragam pilihan tujuan wisata baik bagi penduduk lokal maupun mancanegara. Dari kuil
                                yang megah hingga pegunungan yang megah, Anda memiliki banyak hal untuk ditemukan di
                                negara yang indah ini. SafeRoom akan membantu membuat pengalaman perjalanan Anda
                                keliling Indonesia menjadi lebih baik dengan pesan hotel murah kami!</span></p>

                        <p><span style="color:#000000;">Selain semua tempat indah yang dapat Anda kunjungi di negara
                                ini, Anda tidak akan kehabisan akomodasi hebat dan terjangkau berkat SafeRoom Indonesia.
                                Anda dapat dengan mudah menemukan hotel murah dengan semua fasilitas penting di platform
                                pemesanan kami.</span></p>

                        <h2><span style="color:#000000;">Mudah Menjangkau Tujuan dari Hotel SafeRoom Indonesia</span>
                        </h2>

                        <p><span style="color:#000000;">Ada banyak tempat untuk dijelajahi di Indonesia, dengan harga
                                hotel yang terjangkau! Bagi yang menginginkan petualangan pantai, Denpasar di Bali akan
                                menjadi surganya. Penggemar belanja dapat menuju ke Jakarta untuk mendapatkan penawaran
                                terbaik dari pakaian tekstil di Tanah Abang. Wisatawan yang menyukai petualangan akan
                                menikmati wisata dari Bandung ke daerah pegunungan dan berenang di air terjun! Anda
                                dapat menemukan hotel Indonesia dengan harga terjangkau di dekat landmark seperti Gunung
                                Bromo di Surabaya dan Benteng Rotterdam di Makassar atau tempat perbelanjaan terkenal
                                seperti Mal Grand Indonesia di Jakarta Pusat.</span></p>

                        <p><span style="color:#000000;">Indonesia memiliki banyak kota unggulan yang memiliki
                                tempat-tempat wisata yang megah. Ke mana pun Anda ingin pergi duluan, memesan harga
                                kamar hotel yang murah sangatlah mudah berkat platform kami. Berikut beberapa destinasi
                                yang wajib dikunjungi di Indonesia.</span></p>

                        <h3><span style="color:#000000;">1. </span><a
                                href="https://www.SafeRoom.com/en-id/search/hotel/indonesia/surabaya"
                                style="color:#000000;text-decoration:none"><span style="color:#000000;">Surabaya, Jawa
                                    Timur</span></a></h3>

                        <p><span style="color:#000000;">Jika Anda mendambakan liburan budaya di Indonesia, tidak ada
                                yang bisa mengalahkan pemesanan hotel di kota pahlawan negara, Surabaya. Ini adalah
                                tempat yang menarik di sekitar Jawa Timur dan menjadikannya salah satu kota yang
                                memiliki destinasi wisata populer, termasuk Gunung Bromo, Bali, Yogyakarta, dan
                                Jakarta.</span></p>

                        <h3><span style="color:#000000;">2. </span><a
                                href="https://www.SafeRoom.com/en-id/search/hotel/indonesia/jakarta"
                                style="text-decoration:none"><span style="color:#000000;">Jakarta</span></a></h3>

                        <p><span style="color:#000000;">Jakarta adalah salah satu tempat terbaik untuk dikunjungi jika
                                Anda menikmati kenyamanan pusat kota. Ini adalah kota megapolitan dengan gedung pencakar
                                langit dan menaranya yang mengesankan seperti Monas yang terkenal - monumen nasional
                                Indonesia. Namun, itu hanya satu dari sekian banyak tempat wisata di kota
                                tersebut.</span></p>

                        <p><span style="color:#000000;">Anda mungkin hanya akan melihat gedung-gedung tinggi di Jakarta,
                                tetapi ada beberapa situs warisan seperti Jakarta Tua atau Kota Tua dan pelabuhan
                                bersejarah Sunda Kelapa untuk dijelajahi!</span></p>

                        <h3><span style="color:#000000;">3. </span><a
                                href="https://www.SafeRoom.com/en-id/search/hotel/indonesia/bandung"
                                style="text-decoration:none"><span style="color:#000000;">Bandung</span></a></h3>

                        <p><span style="color:#000000;">Bandung hanya berjarak tiga jam lebih sedikit dari Jakarta
                                dengan kereta atau bus. Di kota ini, ada banyak tempat keren untuk anda jelajahi.</span>
                        </p>

                        <p><span style="color:#000000;">Bandung adalah tempat terbaik untuk menyejukkan dan melepas
                                lelah, secara harfiah karena suhunya yang nyaman-sejuk tersedia sepanjang tahun. Selain
                                iklim yang unik, tempat ini juga menawarkan pemandangan pegunungan dan dataran tinggi
                                yang indah. Dan jika Anda mencoba menghabiskan uang Anda, pesan hotel Indonesia yang
                                murah di Bandung dan habiskan satu atau dua hari berbelanja di pusat perbelanjaan outlet
                                Indonesia.</span></p>

                        <h3><span style="color:#000000;">4. </span><a
                                href="https://www.SafeRoom.com/id-id/search/hotel/indonesia/yogyakarta"
                                style="text-decoration:none"><span style="color:#000000;">Yogyakarta</span></a></h3>

                        <p><span style="color:#000000;">Indonesia memiliki budaya dan sejarah yang kaya dan dalam, dan
                                Anda dapat melihatnya dari bangunan kuno dan tempat-tempat yang berdiri hingga hari ini.
                                Jika Anda ingin mempelajari budaya Jawa, Yogyakarta merupakan tempat yang wajib Anda
                                kunjungi.</span></p>

                        <p><span style="color:#000000;">Anda tidak akan kehabisan tempat wisata dan situs pendidikan di
                                bagian Jawa, Indonesia ini. Anda bisa pesan hotel yang hemat di Yogyakarta dan
                                mengunjungi kompleks kerajaan abad ke-18 kota, bangunan kolonial era Belanda, Taman Sari
                                atau Istana Air yang terkenal. Di sini, Anda juga bisa menjelajahi dua situs Warisan
                                Dunia UNESCO, Prambanan dan Borobudur, dua landmark paling megah di seluruh Asia.</span>
                        </p>

                        <h3><span style="color:#000000;">5. </span><a
                                href="https://www.SafeRoom.com/id-id/search/hotel/indonesia/bali"
                                style="text-decoration:none"><span style="color:#000000;">Pulau Nusa Penida,
                                    Bali</span></a></h3>

                        <p><span style="color:#000000;">Indonesia terkenal dengan pemandangan pantainya yang indah. Jika
                                Anda termasuk salah satu orang yang mendambakan liburan di pinggir pantai dengan
                                pemandangan laut yang luar biasa, Bali adalah pilihan utama. Begitu berada di Bali, Anda
                                harus mengunjungi Nusa Penida, dan pulau terpencil sangat cocok jika Anda ingin
                                ketenangan.</span></p>

                        <p><span style="color:#000000;">Nusa Penida merupakan salah satu pulau yang kurang terkenal di
                                Bali tetapi sama megahnya dengan pulau favorit para turis lainnya seperti Nusa Ceningan
                                dan Nusa Lembongan di dekatnya.</span></p>

                        <p><span style="color:#000000;">Selain perairan biru dan pasir putih pucat, daya tarik Nusa
                                Penida adalah garis pantai tebingnya. Jika Anda menginap di sebuah hotel di Bali,
                                Indonesia, Anda bisa melakukan perjalanan sehari di pulau tersebut yang hanya berjarak
                                satu jam perjalanan dari daratan dengan menggunakan kapal feri.</span></p>

                        <h3><span style="color:#000000;">6. Pulau Komodo</span></h3>

                        <p><span style="color:#000000;">Jika Anda memimpikan liburan ke pulau terpencil, Indonesia akan
                                mewujudkan impian Anda. Anda bisa menginap di hotel murah di Pulau Komodo, salah satu
                                pulau paling terpencil di negara ini.</span></p>

                        <p><span style="color:#000000;">Meskipun tempat ini jauh dari hiruk pikuk pusat kota, Anda tidak
                                akan kehabisan hal yang bisa dilakukan di Pulau Komodo. Jika Anda pesan hotel di sini,
                                Anda bisa mendapatkan akses mudah ke Pantai Pink yang langka dan Taman Nasional Komodo,
                                di mana Anda bisa bertemu dengan Komodo raksasa.</span></p>

                        <h3><span style="color:#000000;">7. Desa Wae Rebo, Pulau Flores</span></h3>

                        <p><span style="color:#000000;">Anda bisa mencari hotel murah di salah satu kota tersibuk di
                                Indonesia, atau bisa juga memesan hotel untuk liburan pulau di Pulau Flores, khususnya
                                di sekitar Desa Wae Rebo. Ini adalah desa kecil tapi sangat menawan yang terletak di
                                pegunungan yang indah.</span></p>

                        <p><span style="color:#000000;">Desa di Indonesia memiliki rumah-rumah khas yang berbentuk
                                kerucut, dikelilingi oleh alam di dataran tinggi yang terpencil. Pesan hotel Indonesia
                                di sekitar area ini jika Anda menyukai keindahan pegunungan, tanaman hijau, margasatwa,
                                dan anggrek yang cantik.</span></p>

                        <h3><span style="color:#000000;">8. Bukittinggi, Sumatera Barat</span></h3>

                        <p><span style="color:#000000;">Jika Anda berada di sekitar Sumatra Barat di Indonesia,
                                Bukittinggi adalah tempat yang harus dikunjungi, dan Anda dapat menemukan berbagai harga
                                kamar hotel di sini yang sesuai dengan anggaran Anda. Bukittinggi juga memiliki banyak
                                daya tarik bagi wisatawan, termasuk Fort de Kock, dan benteng kuno di puncak bukit
                                Belanda. Anda juga dapat mengunjungi Ngarai Sianok yang menawarkan pemandangan megah dan
                                pasar tradisional Pasar Atas.</span></p>

                        <h5><span style="color:#000000;">Hemat dengan SafeRoom Indonesia</span></h5>



                        <p><span style="color:#000000;">Hotel SafeRoom terkenal di kalangan pebisnis dan penyuka
                                rekreasi di Indonesia karena kami menyediakan hotel murah dan paling mudah diakses di
                                negara ini. Untuk informasi lebih lanjut tentang hotel kami, Anda dapat mengirim pesan
                                kepada kami dan kami akan membalas pesan Anda sesegera mungkin!</span></p>

                        <p><span style="color:#000000;">Atau, Anda dapat melihat FAQ kami.</span></p>

                        <h3 style="font-size:0px; display: none;">Daerah populer lainnya:</h3>


                    </div>

                </div>
            </div>

        </div>
    </section>

    <section id="footer mt-4">
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
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
    </script>
    <script src="<?= base_url() ?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/fontawesome/js/all.min.js"></script>
    <script src="<?= base_url() ?>assets/build/js/bootstrap.bundle.min.js"></script>
</body>

</html>