<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/style21.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Registration Hotel </title>
</head>

<body>
    <div class="container">
        <header>Registration</header>

        <form action="<?= base_url('registerHotel/register') ?>" method="post">
            <div class="form first">
                <h2>Syarat kerjasama SafeRoom</h2>
                <p style="line-height: 35px; margin-bottom:10px">1. Foto Surat Hak Milik, Ijin Usaha Penginapan di lingkungan setempat<br>
                    2. Minimum 6 Kamar<br>
                    3. Queen Bed dengan ukuran 160 x 200 atau Twin Bed 120 x 200 dengan linen putih<br>
                    4. Handuk Putih 2 pcs per Kamar<br>
                    5. Shower dan Toilet Duduk<br>
                    6. Flat TV dengan International TV Chanel<br>
                    7. Wi-Fi<br>
                    8. AC<br>
                    9. Mineral Water 2 pcs per Kamar<br>
                    10. Pelayanan 24 Jam</p>
                </p>
                <!-- <input type="hidden"> -->
                <input type="checkbox" required id="s&k" name="s&k" value="true">
                <label for="s&k" style="font-size: 15px;"> Properti yang saya miliki sudah memenuhi standar SafeRoom</label>
                <button type="submit" class="nextBtn">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </form>
    </div>
</body>

</html>