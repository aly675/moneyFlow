<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/loginRegis.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signIn-signUp">
                <form action="{{ route('login.submit') }}" method="post" class="sign-in-form">
                    @csrf
                    <h2 class="title">Selamat datang user!</h2>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Kata Sandi" required>
                    </div>
                    <div class="forgot-pw">
                        <a href="#">Lupa kata sandi</a>
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                </form>
                <script>
                    document.querySelector('.sign-in-form').addEventListener('submit', function(e) {
                        e.preventDefault(); // Mencegah pengiriman form default

                        const formData = new FormData(this);

                        fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => {
                                    // Menampilkan pesan kesalahan menggunakan SweetAlert
                                    swal("Error!", err.error, "error");
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Tindakan setelah berhasil login
                            window.location.href = data.redirect;
                                        // Tindakan setelah berhasil login
                            window.location.href = data.redirect; // Redirect ke halaman yang diinginkan
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });
                </script>

<form action="{{ route('register.submit') }}" method="post" class="sign-up-form">
    @csrf
    <h2 class="title">Ayo daftarkan akun mu!</h2>
    <div class="input-field">
        <input type="text" name="name" placeholder="Username" required>
    </div>
    <div class="input-field">
        <input type="text" name="email" placeholder="Email" required>
    </div>
    <div class="input-field">
        <input type="text" name="nomer_telepon" placeholder="No" required>
    </div>
    <div class="input-field">
        <input type="password" name="password" placeholder="Kata Sandi" required>
    </div>
    <div class="input-field">
        <input type="password" name="password_confirmation" placeholder="Periksa Kata Sandi" required>
    </div>
    <input type="submit" value="SignUp" class="btn solid">
</form>

<script>
    document.querySelector('.sign-up-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah pengiriman form default

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    // Menampilkan pesan kesalahan menggunakan SweetAlert
                    swal("Error!", err.error, "error");
                });
            }
            return response.json();
        })
        .then(data => {
            // Tindakan setelah berhasil registrasi
            swal("Success!", "Akun berhasil dibuat!", "success").then(() => {
                window.location.href = data.redirect; // Redirect ke halaman yang diinginkan
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum punya akun?</h3>
                    <p>Bebaskan diri dari kebingungan finansial! Daftar sekarang dan catat setiap pemasukan & pengeluaran dengan praktis.</p>
                    <button class="btn transparent" id="sign-up-btn">Daftar</button>
                </div>
                <img src="{{asset('assets/img/coin.png')}}" class="image2" id="img" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah punya akun?</h3>
                    <p>Ayo lanjutkan pencatatanmu! Masuk dan lihat ke mana uangmu mengalir.</p>
                    <button class="btn transparent" id="sign-in-btn">Masuk</button>
                </div>
                <img src="{{asset('assets/img/money.png')}}" class="image1" id="img" alt="">
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/loginRegis.js')}}"></script>
</body>
</html>
