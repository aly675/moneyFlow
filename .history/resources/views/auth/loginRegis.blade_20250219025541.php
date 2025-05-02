<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/loginRegis.css')}}">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signIn-signUp">
                <form action="" class="sign-in-form">
                    <img src="{{asset('assets/img/logo.png')}}" id="logo" alt="">
                    <h2 class="title">Selamat datang user!</h2>
                    <div class="input-field">
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Kata Sandi">
                    </div>
                    <div class="forgot-pw">
                        <a href="#">Lupa kata sandi</a>
                    </div>
                    <input type="submit" value="Login" class="btn solid">

                        <button class="social-media">
                            <span class="bi bi-google"></span> <p>Masuk dengan Google</p>
                        </button>
                </form>

                <form action="" class="sign-up-form">
                    <img src="img/logo.svg" id="logo" alt="">
                    <h2 class="title" id="sign-up">Ayo daftarkan akun mu!</h2>
                    <div class="input-field">
                        <input type="text" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="No">
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Kata Sandi">
                    </div>
                    <div class="input-field" id="sign-up">
                        <input type="password" placeholder="Periksa Kata Sandi">
                    </div>
                    <input type="submit" value="SignUp" class="btn solid" >
                    <button class="social-media">
                        <span class="bi bi-google"></span> <p>Masuk dengan Google</p>
                    </button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum punya akun?</h3>
                    <p>Bebaskan diri dari kebingungan finansial! Daftar sekarang dan catat setiap pemasukan & pengeluaran dengan praktis.</p>
                    <button class="btn transparent" id="sign-up-btn">Daftar</button>
                </div>
                <img src="img/coin.png" class="image2" id="img" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah punya akun?</h3>
                    <p>Ayo lanjutkan pencatatanmu! Masuk dan lihat ke mana uangmu mengalir.</p>
                    <button class="btn transparent" id="sign-in-btn">Masuk</button>
                </div>
                <img src="img/money.png" class="image1" id="img" alt="">
            </div>

        </div>
    </div>

    <script src="{{asset('assets/js/loginRegis.js')}}"></script>
</body>
</html>
