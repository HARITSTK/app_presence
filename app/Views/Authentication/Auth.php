<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - PRESENCE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="template/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="template/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['template/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="<?= route_to('SysRegis') ?>" method="post">
                <?= csrf_field() ?>
                <img src="template/assets/img/icon.png" alt="icon">
                <h1>Create Account</h1>
                <span>Input datamu dibawah sini!</span>
                <input type="text" name="nama" id="nama" placeholder="Nama" required value="<?= old('nama') ?>" />
                <input type="email" name="email" id="email" placeholder="Email" required value="<?= old('email') ?>" class="<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" />
                <input type="password" name="password" id="password" placeholder="Password" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="<?= route_to('SysLogin') ?>" method="post">
                <img src="template/assets/img/icon.png" alt="icon">
                <h1>Sign in</h1>
                <span>Inputkan data anda disini</span>
                <?php if (session()->has('message')) : ?>
                    <a class="button">
                        <i class="icon-information"></i> <?= session('message') ?>
                    </a>
                    <?php endif; ?>
                <input type="text" name="nama" id="nama" placeholder="Nama" value="<?= old('nama') ?>" />
                <input type="password" name="password" id="password" placeholder="Password" />
                <a href="<?= route_to('ForgetAccount') ?>">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome To <br> E - Presence</h1>
                    <p>Aplikasi Presensi berbasis online yang bisa diakses dimanapun dan kapanpun</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>Aplikasi Presensi berbasis online yang bisa diakses dimanapun dan kapanpun</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">SANS COMUNITY</a>
            Copyright © E-Presence 2024 Al muhajirin patuk reserved
        </p>
    </footer>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
        d
    </script>
</body>

<script src="template/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="template/assets/js/core/popper.min.js"></script>
<script src="template/assets/js/core/bootstrap.min.js"></script>
<script src="template/assets/js/plugin/chart.js/chart.min.js"></script>
<script src="template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="template/assets/js/atlantis.min.js"></script>

</html>