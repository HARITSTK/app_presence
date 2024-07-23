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
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['template/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <img src="template/assets/img/icon.png" alt="icon">
                <h1>Generate New Password</h1>
                <span>silahkan input data anda disini</span>
                <input type="password" placeholder="New Password" />
                <input type="password" placeholder="Repeat New password" />
                <a class="button" href="/">Confirm</a>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <img src="template/assets/img/icon.png" alt="icon">    
                <h1>Forget Account</h1>
                <span>Inputkan data anda disini</span>
                <input type="email" placeholder="Email" />
                <button id="signUp">Next</button>
            </form>
        </div>
        <div class="overlay-container"> 
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Information</h1>
                    <p>Silahkan input password baru dan harus diingat karena hanya sekali ganti saja!.</p>
                    <button class="ghost" id="signIn">Back</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Information</h1>
                    <p>Silahkan inputkan email terakhir yang anda gunakan dan ingat!</p>
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
        }); d
    </script>
</body>

</html>