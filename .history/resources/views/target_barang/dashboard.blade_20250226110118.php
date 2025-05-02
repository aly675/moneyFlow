<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboardTargetBarang.css') }}">
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
            <div class="sub-title">Target Keuangan</div>
            <div></div>
        </div>
        <div class="container">
            @foreach($targetBarangs as $target)
                {{-- <a href="{{ route('target_barang.show', $target->id) }}"> --}}
                    <div class="target-card phone">
                        <div class="item-name">{{ $target->nama_barang }}</div>
                        <div class="price-info">
                            Rp. {{ number_format(min($target->saldo_terkumpul, $target->harga_barang), 0, ',', '.') }} /
                            Rp. {{ number_format($target->harga_barang, 0, ',', '.') }}
                        </div>
                        <div class="persen">{{ round(($target->saldo_terkumpul / $target->harga_barang) * 100 !>100) }}%</div>
                    </div>
                {{-- </a> --}}
            @endforeach
        </div>

        <a href="{{ route('target_barang.create') }}" class="bi bi-plus-lg" id="first-btn"></a>
    </main>
    <script src="{{ asset('assets/js/dashboard_target_barang.js') }}"></script>
</body>
</html>
