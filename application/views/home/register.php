<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/style21.css">
    <title>Register Hotel</title>
    <style>
        .mcsa {
            margin-bottom: 49px !important;
        }

        @media(max-width:956px) {
            .mcsa {
                margin-bottom: 1px !important;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>Registration</header>

        <form action="#" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="lahir" placeholder="Enter birth date" required>
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
                            <select name="gender" required>
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
                            <select name="city" required>
                                <option disabled selected>Select City</option>
                                <?php
                                foreach ($city as $cii) :
                                ?>
                                    <option value="<?= $cii->id; ?>"><?= $cii->city; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="formFile" class="form-label" style="font-size: 12px;font-weight: 500;color: #2e2e2e;">Foto Surat Hak
                                    Milik</label>
                                <input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png" id="formFile" required>
                            </div>
                        </div>

                        <div class="input-field mcsa">
                            <label>Number of Room</label>
                            <input type="number" name="room" placeholder="Enter Number of Room" min="10" required>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <textarea id="w3review" name="address" rows="4" cols="50" required></textarea>
                        </div>

                        <div class="input-field">
                            <label>About</label>
                            <textarea id="w3review" name="about" rows="4" cols="50" required></textarea>
                        </div>


                    </div>

                    <div class="buttons">

                        <div class="backBtn">
                            <a href="<?= base_url('registerHotel') ?>" style="text-decoration: none; color:#fff">
                                <i class="uil uil-navigator" style="transform: rotate(180deg);"></i>
                                <span class="btnText">Back</span>
                            </a>
                        </div>
                        <button type="submit" class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("form").submit(function(event) {

            //     Swal.fire({
            //   title: 'Pendaftaran Berhasil',
            //   text: "Tunggu kami akan memprosesnya!",
            //   icon: 'success',
            //   confirmButtonColor: 'blue',
            //   confirmButtonText: 'OK'
            // }).then((result) => {
            //   if (result.isConfirmed) {
            //     window.location.href = "../auth";
            //   }
            // })
            Swal.fire(
                'Pendaftaran Berhasil',
                'Tunggu kami akan memprosesnya!',
                'success'
            )
            event.preventDefault();
        });
    </script>
</body>

</html>