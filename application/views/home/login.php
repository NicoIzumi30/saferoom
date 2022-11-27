<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/build/css/') ?>style_login.css" />
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form method="POST" action="<?= base_url('home/login') ?>" class="sign-in-form">

                    <h2 class="title">Sign in</h2>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" id="email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
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