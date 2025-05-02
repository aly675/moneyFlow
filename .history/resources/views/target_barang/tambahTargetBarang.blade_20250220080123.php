<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Keuangan - Tambah Target Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/tambahTargetBarang.css') }}" />
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
                Tambah Target Keuangan
            </div>
            <div></div>
        </div>

        <form action="{{ route('target_barang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="nama_barang" placeholder="Nama Barang" required />
            </div>
                <input type="number" name="harga_barang" placeholder="Harga Barang" required />
            </div>
            <button type="submit" class="save-btn">Simpan</button>
        </form>
    </main>
    <script src="{{ asset('assets/js/tambah_target_barang.js') }}"></script>
</body>
</html>
