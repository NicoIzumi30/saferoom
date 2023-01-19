<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/stylea.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper p-0">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('auth/index') ?>" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/build/js/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>assets/build/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/build/js/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/build/js/script.js"></script>
</body>

</html>