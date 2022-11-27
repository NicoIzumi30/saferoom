<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/build/css/') ?>style_regis.css" />
    <title>Registration</title>
</head>

<body>
    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('home/register') ?>" autocomplete="off" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" name="nama" id="nama" placeholder="Full Name" autocomplete="namai"
                            value="<?= set_value('nama') ?>" />
                    </div>
                    <div class="cobain">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email"
                            value="<?= set_value('email') ?>">
                    </div>
                    <div class="cobain">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" name="phone" id="phone" placeholder="Telephone"
                            value="<?= set_value('phone') ?>">
                    </div>
                    <div class="cobain">
                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password1" autocomplete="new-password" id="password1"
                            placeholder="Password" />
                    </div>
                    <div class="cobain">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password2" id="password2" placeholder="Repeat Password" />
                    </div>
                    <div class="cobain">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div style="max-width: 380px;padding: 10px;">
                        <input type="checkbox" id="s&k" name="s&k" value="s&k">
                        <label for="s&k"> <small>Dengan masuk atau membuat akun, Anda setuju dengan kami <a href="#"
                                    style="text-decoration: none;"> Syarat &
                                    Ketentuan</a> Dan
                                <a href="#" style="text-decoration: none;">Kebijakan
                                    Privasi</a> </small></label>

                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                    <div class="social-media">

                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <a href="<?= base_url('home/login') ?>">
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </a>
                </div>
                <img src="<?= base_url('assets/build/images/') ?>register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/build/js/') ?>app.js"></script>
</body>

</html>