<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboardMenejemenKeungangan.css') }}">
</head>

<body>
    <nav class="sidebar">
        <div class ="sidebar-icon ">
            <a href="">
                <img src="{{ asset('assets/img/avatar.png') }}" alt="" class="profile">
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-cash-stack" href="{{ route('dashboard') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" id="active" href="{{ route('manejemen.anggaran') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" href="/Dashboard/3Rekap/index.html"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-journal" href="/Dashboard/4Target/index.html"></a>
            </i>
        </div>
    </nav>

    <main class="main-content">
        <div class="header">
            <div>
                <p>Manajemen anggaran</p>
            </div>
        </div>

        <div class="main-container">
            <div class="payment-grid">
                <a href="{{route()}}" class="payment-card">
                    <div class="payment-name">Uang Tunai</div>
                    <div class="payment-amount fill-amount">Rp. {{ number_format($uangTunai, 0, ',', '.') }} <span class="bi bi-chevron-right"></span></div>
                </a>

                <a href="{{route()}}" class="payment-card">
                    <div class="payment-name">Dana</div>
                    <div class="payment-amount fill-amount">Rp. {{ number_format($dana, 0, ',', '.') }} <span class="bi bi-chevron-right"></span></div>
                </a>

                <a href="{{route()}}" class="payment-card">
                    <div class="payment-name">BRI</div>
                    <div class="payment-amount fill-amount">Rp. {{ number_format($bri, 0, ',', '.') }} <span class="bi bi-chevron-right"></span></div>
                </a>

                <a href="{{route()}}" class="payment-card">
                    <div class="payment-name">BCA</div>
                    <div class="payment-amount fill-amount">Rp. {{ number_format($bca, 0, ',', '.') }} <span class="bi bi-chevron-right"></span></div>
                </a>

                <a href="{{route()}}" class="payment-card">
                    <div class="payment-name">Mandiri</div>
                    <div class="payment-amount fill-amount">Rp. {{ number_format($mandiri, 0, ',', '.') }} <span class="bi bi-chevron-right"></span></div>
                </a>

                <a href="{{route()}}" class="payment-card">
                    <div class="payment-name">Gopay</div>
                    <div class="payment-amount fill-amount">Rp. {{ number_format($gopay, 0, ',', '.') }} <span class="bi bi-chevron-right"></span></div>
                </a>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
