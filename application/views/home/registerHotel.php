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

    <title>Responsive Regisration Form </title>
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
            <!-- <div class="form second">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="full_name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="DoB" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="telp" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required name="gender">
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Property Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Hotel Name</label>
                            <input type="text" name="hotel" placeholder="Enter Hotel Name" required>
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <select required name="city">
                                <option disabled selected>Select City</option>
                                <?php
                                foreach ($city as $cii) :
                                ?>
                                    <option value="<?= $cii->id; ?>"><?= $cii->city; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Number of Room</label>
                            <input type="number" name="room" placeholder="Enter Number of Room" min="10" required>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                        </div>

                        <div class="input-field">
                            <label>About</label>
                            <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                        </div>

                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div> -->
        </form>
    </div>
    <!-- 
    <script src="<?= base_url() ?>assets/build/js/script21.js"></script> -->
</body>

</html>