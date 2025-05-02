<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/pemasukan.css') }}">
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
                <a
                class="bi bi-cash-stack" id="active"
                href="{{route('dashboard')}}">
                </a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class = "bi bi-wallet2"
                href="/Dashboard/2Rekening/index.html">
                </a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class = "bi bi-bar-chart-line"
                href="/Dashboard/3Rekap/index.html">
                </a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class = "bi bi-journal"
                href="/Dashboard/4Target/index.html">
                </a>
            </i>
        </div>
    </nav>

    <main class="main-content">
        <div class="header">
            <div class="dropdown">
                <button id="dropdownBtn" class="dropdown-btn">Pemasukan <span class="bi bi-caret-down-fill"></span></button>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="{{route('pengeluaran_page')}}">Pengeluaran</a>
                </div>
            </div>
            <!-- Input tanggal dengan nilai default hari ini -->
            <input type="date" id="date" value="{{ now()->toDateString() }}">
        </div>

        <div class="form">
            <!-- Dropdown untuk kategori (metode pembayaran) -->
            <div class="dropdown-container">
                <div class="dropdown-header" onclick="toggleDropdown('kategoriOptions')">
                    Pilih Kategori
                    <span class="bi bi-caret-down-fill"></span>
                </div>
                <div class="dropdown-content" id="kategoriOptions">
                    <div class="payment-option selected">Uang Tunai</div>
                    <div class="payment-option">BRI</div>
                    <div class="payment-option">Mandiri</div>
                    <div class="payment-option">Dana</div>
                    <div class="payment-option">BCA</div>
                    <div class="payment-option">Gopay</div>
                </div>
            </div>

            <!-- Input judul -->
            <input type="text" id="title" placeholder="Judul Pemasukan">

            <!-- Input jumlah uang -->
            <input type="number" id="jumlah" placeholder="Masukkan jumlah uang">

            <!-- Input catatan (opsional) -->
            <input type="text" id="catatan" placeholder="Catatan (opsional)">

            <!-- Pertanyaan target barang -->
            <div class="target-barang-container">
                <label>
                    <input type="checkbox" id="targetBarangCheckbox" onchange="toggleTargetBarangInput()">
                    Masukkan pemasukan ke target barang?
                </label>
                <!-- Input nominal untuk target barang (awalnya tersembunyi) -->
                <div id="targetBarangInput" style="display: none; margin-top: 10px;">
                    <input type="number" id="nominalTargetBarang" placeholder="Masukkan nominal">
                </div>
            </div>

            <!-- Tombol simpan -->
            <button class="save-btn" onclick="simpanPemasukan()">Simpan</button>
        </div>
    </main>

    <script>
        const simpanPemasukanUrl = "{{ route('simpan.pemasukan') }}";
    </script>
    <script src="{{ asset('assets/js/pemasukan.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
