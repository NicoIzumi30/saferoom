<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'>
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/build/') ?>css/booking.css">

</head>

<body>
    <section id="header">
        <nav class="navbar navbar-expand-sm" style="background-color: #C6C6C6;">
            <div class="row">
                <div class="col-3 text-center">
                    <a href="<?= base_url() ?>" class="text-white text-decoration-none">
                        <h1 class="navbar-brand text-white" style="font-size: 32px;">SafeRoom</h1>
                    </a>
                </div>
                <div class="col-6">
                    <div class="row justify-content-center">
                    </div>
                </div>
                <div class="col-3 text-center">
                    <!-- Button trigger modal -->


                    <div class="dropdown mt-2">
                        <a class="btn btn-lg btn-secondary" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="border-radius:10px;background-color:#a9a4a4;
                            border: none;">
                            <img fetchpriority="auto" src="https://massets.reddoorz.com/images/menu-white.png"
                                width="20px" height="auto" title loading="auto"
                                style="margin-right: 5px; margin-left: 5px;">
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
                <h3 style="color:rgba(0, 0, 0, 0.8)"><span><i class="fa-solid fa-arrow-left mr-3"></i></span> Booking
                    Details</h3>
            </div>
            <div class="row mt-1">
                <div class="col-lg-7 mt-3">
                    <div class="alert alert-danger text-dark" role="alert" id="alert-danger">
                        <p style="margin-bottom: 0; font-size: 14;font-weight: 500;">Please complete payment within
                            <span class="text-danger" id="count"></span> to avoid
                            cancellation
                        </p>
                        <p style="margin-bottom: 0;">
                            Thanks for your booking! Please proceed ahead with the payment using the Bank Account
                            details as mentioned below.
                        </p>
                    </div>
                    <div class="payYGY p-4">
                        <h6><img src="<?= base_url('assets/image/payment/') . $pay['icon'] ?>" width="48px" alt="">
                            <?= $pay['method']; ?></h6>
                        <hr style="padding: 1px;">
                        <table width="100%">
                            <tr>
                                <td>Virtual Account Number</td>
                                <td>Jumlah yang harus Dibayar</td>
                                <td>Reference Number</td>
                            </tr>
                            <tr class="capee">
                                <td><span id="norek"><?= $pay['norek']; ?></span><span
                                        style="font-size: 13px;user-select: none;cursor: pointer;" class="text-danger"
                                        onclick="myFunction()" id="liveToastBtn"> copy</span></td>
                                <td>Rp. <?= number_format($trx['total']) ?></td>
                                <td><?= $trx['kode']; ?></td>
                            </tr>

                        </table>
                        <hr style=" padding: 1px;">
                        <ul class="text-black" style="font-size: 15px;">
                            <li> When you have successfully completed your payment, we will confirm your
                                booking within
                                few
                                minutes through mail and SMS</li>
                            <li> In case you do not receive booking voucher after successful payment,
                                you can contact us
                                +62-21-806-29666 for further assistance</li>

                        </ul>
                    </div>
                    <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->

                    <h4 class="mt-3">Payment Instructions</h4>
                    <div class="accordion mt-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#ATM" aria-expanded="false" aria-controls="ATM"
                                    style="padding: 33px;font-weight: 500;font-size: 17px;">
                                    ATM
                                </button>
                            </h2>
                            <div id="ATM" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-weight: 400;">
                                    <ol>
                                        <li>Pilih Transaksi Lainnya > Transfer > Ke Rek BCA Virtual Account</li>
                                        <li>Masukkan Nomor Virtual Account (16 digit) dan pilih Benar</li>
                                        <li>Layar konfirmasi akan muncul, kemudian pilih Ya</li>
                                        <li>Selesai</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion mt-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#InternetBanking" aria-expanded="false"
                                    aria-controls="InternetBanking"
                                    style="padding: 33px;font-weight: 500;font-size: 17px;">
                                    Internet Banking
                                </button>
                            </h2>
                            <div id="InternetBanking" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-weight: 400;">
                                    <ol>
                                        <li> Log in BCA Internet Banking :
                                            <a target="_blank" href="https://ibank.klikbca.com/"
                                                style="text-decoration: none;">https://ibank.klikbca.com/</a>
                                        </li>
                                        <li>Pilih Transaksi Dana > Ke Rek BCA Virtual Account</li>
                                        <li>Centang Nomor Virtual Account dan masukkan Nomor Virtual Account. Klik
                                            Lanjutkan</li>
                                        <li>Periksa semua data informasi di layar. Jika sudah benar, klik Lanjutkan</li>
                                        <li> Masukkan respon KeyBCA Anda dan klik Kirim</li>
                                        <li>Selesai</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion mt-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#MobileBanking" aria-expanded="false" aria-controls="MobileBanking"
                                    style="padding: 33px;font-weight: 500;font-size: 17px;">
                                    Mobile Banking
                                </button>
                            </h2>
                            <div id="MobileBanking" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body" style="font-weight: 400;">
                                    <ol>
                                        <li>Log in BCA Mobile Banking</li>
                                        <li>Pilih m-Transfer</li>
                                        <li>Pilih menu BCA Virtual Account</li>
                                        <li> Masukkan Nomor Virtual Account, klik Ok, dan pilih Kirim</li>
                                        <li> Periksa semua data informasi di layar. Jika sudah benar, pilih Ok</li>
                                        <li>Masukkan PIN m-BCA Anda dan pilih Ok</li>
                                        <li>Selesai</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="toast-container position-fixed top-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <!-- <img src="" class="rounded me-2" alt="..."> -->
                                <strong class="me-auto">SafeRoom</strong>
                                <small>Now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Virtual Account Number Copied
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-3">Lihat di dalam peta</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.053212309761!2d110.3534053143275!3d-7.88950208066683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sid!2sid!4v1668356664084!5m2!1sid!2sid"
                        width="100%" height="280" style="border:0; border-radius: 15px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="accordion mt-5" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#Cancellation" aria-expanded="false" aria-controls="Cancellation"
                                    style="padding: 33px;font-weight: 500;font-size: 17px;">
                                    Cancellation Policy
                                </button>
                            </h2>
                            <div id="Cancellation" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body" style="font-weight: 400;">
                                    <p>Safe Room adalah agen komisi yang bertindak atas nama hotel yang dimiliki dan
                                        dioperasikan secara independen di seluruh Indonesia.</p>
                                    <p>Standard kebijakan pembatalan & pengembalian dana:</p>
                                    <p>Bagian 1: pembatalan pemesanan serta proses pengembalian dana hanya di
                                        perbolehkan jika pembatalan tersebut dilakukan sebelum pukul 15:00 di hari check
                                        in yang sama dan akan dikenakan biaya pembatalan senilai Rp. 20.000 yang akan di
                                        potong dari nominal yang dibayarkan untuk reservasi tersebut</p>
                                    <p>Bagian 2: Untuk pembatalan yang dilakukan setelah pukul 15:00 (di hari check in
                                        yang sama), maka akan di kenakan biaya pembatalan senilai 100% dari biaya 1
                                        malam pertama</p>
                                    <p>Hanya anak di bawah 12 tahun dapat diakomodasi tanpa kasur tambahan. Seluruh Sale
                                        & Special Promo tidak ada pengembalian dana jika dibatalkan.</p>
                                    <p>Tanggal Check-In untuk pemesanan yang dilakukan untuk Special Price Sale dapat
                                        dimodifikasi 24 jam sebelum check-in dengan membayar selisih harga dan biaya
                                        administrasi Rp 50.000 (Sekitar 190 Philippine Peso, 5 SGD, 90,000 VND, THB 115
                                        )</p>
                                    <p>Tamu dilarang untuk melakukan atau berpartisipasi dalam pelanggaran pidana di
                                        dalam properti apa pun, termasuk pada: pencurian, perampokan, pelacuran atau
                                        penyalahgunaan dan transaksi narkoba.</p>
                                    <p>Proses pengembalian dana akan memakan waktu sekitar 14 hari kerja (tidak termasuk
                                        akhir pekan, cuti bersama, dan hari libur umum) dimulai ketika aplikasi
                                        pembatalan dan rincian Rekening Bank diterima oleh Safe Room</p>
                                    <p>Instruksi check-in:Uang jaminan yang dapat dikembalikan mungkin dibebankan pada
                                        saat check-in sama dengan biaya kamar satu malam atau maksimum $ 50 tergantung
                                        pada kebijakan properti. Setoran jaminan ini dapat dikembalikan sepenuhnya
                                        setelah dilakukan pemeriksaan kerusakan oleh properti.</p>
                                    <p>Perubahan Reservasi:Setiap perubahan lama menginap atau tanggal reservasi dapat
                                        menghasilkan perubahan tarif.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-5 mt-3">
                    <div id="liveAlertPlaceholder"></div>
                    <div class="shYGY p-4">
                        <div class="row">
                            <div class="col-4">
                                <?php $img = explode(',', $room['image']); ?>
                                <img src="<?= base_url('assets/image/room/') . $img[0] ?>" width="100%" alt="">
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
                                        <td>Mendaftar</td>
                                        <td>Periksa</td>
                                        <td>Room's</td>
                                    </tr>
                                </thead>
                                <tbody style="font-weight:500;font-size: 17px;">
                                    <tr>
                                        <td><?= $trx['check_in']; ?></td>
                                        <td><?= $trx['check_out']; ?></td>
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
                                        <td>Standar</td>
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
                                        <td>Mrs <?= $this->session->userdata('name'); ?></td>
                                        <td><?= $this->session->userdata('email'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
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


    </div>
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
                    <a class="btn btn-primary" href="<?= base_url('home/logout') ?>">Logout</a>
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
    <script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }
    </script>
    <script>
    let now = new Date()
    let today = now.format('D')
    let today2 = now.format('d M')
    let tomorrow = new Date()
    tomorrow.setDate(now.getDate() + 1)
    let besok = tomorrow.format('D')
    let besok2 = tomorrow.format('d M')
    document.getElementById("today").innerHTML = today + ', ' + today2
    document.getElementById("tomorrow").innerHTML = besok + ', ' + besok2
    </script>
    <script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

    const alert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            alert('Nice, you triggered this alert message!', 'success')
        })
    }

    function myFunction() {
        // const el = document.createElement("textarea");
        // el.value = event.target.innerHTML;
        // document.body.appendChild(el);
        // el.select();
        // document.execCommand("copy");
        // document.body.removeChild(el);
        var copyText = document.getElementById('norek').innerHTML;
        navigator.clipboard.writeText(copyText);
    }
    </script>
    <script>
    // Set the date we're counting down to
    var countDownDate = <?= $trx['expired'] ?>;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("count").innerHTML = minutes + "m " + seconds + "s ";

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("alert-danger").innerHTML = '<h6>Order failed due to late payment</h6>';
            <?php if ($trx['status'] == 'Menunggu') { ?>
            window.location.href = 'http://localhost:8080/safe_room/home/update_status/<?= $trx['kode'] ?>'
            <?php } ?>
        }
    }, 1000);
    </script>
</body>