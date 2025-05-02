<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan - Detail Target Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/target.css') }}">
</head>

<body>
    <nav class="sidebar">
        <div class="sidebar-icon">
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
                <a class="bi bi-wallet2" href="{{ route('manejemen.anggaran') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" href="{{ route('rekap.realTime') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-journal" id="active" href="{{ route('target_barang.index') }}"></a>
            </i>
        </div>
    </nav>

    <main class="main-content">
        <div class="header">
            <div class="sub-title">
                <a href="{{ route('target_barang.index') }}" class="bi bi-arrow-left-short"></a>
            </div>
            <div></div>
        </div>

        <div class="progress-font">{{ round(($targetBarang->saldo_terkumpul / $targetBarang->harga_barang) * 100) }}%</div>
        <h1 class="title">{{ $targetBarang->nama_barang }}</h1>
        <div class="progress-container">
            <div class="progress-bar" style="width: {{ round(($targetBarang->saldo_terkumpul / $targetBarang->harga_barang) * 100) }}%;"></div>
        </div>

        <div class="show-data">
            <p>Pemasukan Total</p>
            <p id="pemasukan">Rp {{ number_format($targetBarang->saldo_terkumpul, 2, ',', '.') }}</p>
        </div>

        <h3>Detail Pemasukan</h3>
        @foreach($targetBarang->pemasukan as $pemasukan)
            {{-- <div class="date-range">{{ $pemasukan->tanggal }}</div> --}}
            <div class="show-data">
                <p>Pemasukan</p>
                <p id="pemasukan">Rp {{ number_format($pemasukan->nominal, 2, ',', '.') }}</p>
            </div>
        @endforeach

        <a href="{{ route('target_barang.add_pemasukan', $targetBarang->id) }}" class="bi bi-plus-lg" id="first-btn"></a>
    </main>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
