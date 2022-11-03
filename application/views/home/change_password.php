<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile Saya</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/build/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/intlTelInput.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/demo.css">


</head>
<body>

<div class="row justify-content-center">
        <div class="col-md-5 mt-5" style="border: 1px solid grey; background-color: #f8f8f8; padding:0 ;">
            <h5 class="px-3 py-1">Pengaturan Akun</h5>
            <div class="kotak-abu" style="background-color: grey;">
                <h6  class="px-3 py-2 text-black">Informasi Login Anda</h4>
            </div>

            <div class="px-3" style="font-size: 14px;">
            <p>Nama - <?=$this->session->userdata('full_name')?></p>
            <p>Alamat email - <?=$this->session->userdata('email')?></p>
            <div class="row">
            <div class="col-sm-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="<?= base_url('home/change_password') ?>" method="POST">
                    <div class="form-group mb-1">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group mb-1">
                        <label for="new_password1" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>') ?>

                    </div>
                    <div class="form-group mb-1">
                        <label for="new_password2" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.4/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>assets/build/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendors/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/build/js/sb-admin-2.min.js"></script>


    <script src="<?= base_url() ?>assets/build/js/intlTelInput.js"></script>
    <script>
    $("s#phone").intlTelInput({
        utilsScript: "<?= base_url() ?>assets/build/js/utils.js"
    });
    </script>

</body>

</html>