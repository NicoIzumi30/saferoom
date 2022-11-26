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
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />

                </form>
                <form action="#" class="sign-up-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" placeholder="Full Name" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" placeholder="Telephone" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Repeat Password" />
                    </div>
                    <div style="max-width: 380px;padding: 10px;">
                        <input type="checkbox" id="s&k" name="s&k" value="s&k">
                        <label for="s&k"> <small>Dengan masuk atau membuat akun, Anda setuju dengan kami <a href="#" style="text-decoration: none;"> Syarat &
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
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <a href="<?= base_url('home/register') ?>">
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </a>
                </div>
                <img src="<?= base_url('assets/build/images/') ?>Data Protection.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/build/js/') ?>app.js"></script>
</body>

</html>