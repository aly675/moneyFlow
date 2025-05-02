<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Keuangan - Bulanan</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/bulanan.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>

<body>
    <nav class="sidebar">
        <div class="sidebar-icon">
            <a href="">
                <img src="{{ asset('assets/img/avatar.png') }}" alt="" class="profile" />
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-cash-stack" href="{{ route('dashboard') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" href="{{ route('manejemen.anggaran') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" id="active" href="{{ route('rekap.realTime') }}"></a>
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
            <div></div>
            <div class="date-range">
                <input type="date" id="start-date" />
                <input type="date" id="end-date" />
                <button id="filter-button">Tampilkan Data</button>
            </div>
         </div>

        <div class="main-container">
            <a href="{{ route('rekap.realTime') }}" class="inactive">
                <p>Real time</p>
            </a>
            <a href="{{ route('rekap.bulanan') }}" class="active">
                <p>Bulanan</p>
            </a>
        </div>

        <div class="show-data">
            <p>Pemasukan</p>
            <p id="pemasukan">0,00</p>
        </div>
        <div class="show-data">
            <p>Pengeluaran</p>
            <p id="pengeluaran">0,00</p>
        </div>
        <div class="show-data">
            <p>Selisih</p>
            <p id="selisih">0,00</p>
        </div>
    </main>

    <script src="{{asset()}}"></script>
</body>
</html>
