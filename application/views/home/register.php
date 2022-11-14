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

    <title>Register Hotel</title>
</head>

<body>
    <div class="container">
        <header>Registration</header>

        <form action="#">
            <div class="form first">
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
                            <a href="<?= base_url('registerHotel') ?>" style="text-decoration: none; color:#fff">
                                <i class="uil uil-navigator" style="transform: rotate(180deg);"></i>
                                <span class="btnText">Back</span>
                            </a>
                        </div>

                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="<?= base_url() ?>assets/build/js/script21.js"></script>
</body>

</html>