<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/pengeluaran.css') }}">
    <link rel="icon" href="{{asset('assets/img/logo.svg')}}">
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
                <a class="bi bi-cash-stack" id="active" href="{{route('dashboard')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" href="{{route('manejemen.anggaran')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" href="{{route('rekap.realTime')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-journal" href="{{route('target_barang.index')}}"></a>
            </i>
        </div>
    </nav>

    <main class="main-content">
        <div class="header">
            <div class="dropdown">
                <button id="dropdownBtn" class="dropdown-btn">Pengeluaran <span class="bi bi-caret-down-fill"></span></button>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="{{route('pemasukan_page')}}">Pemasukan</a>
                </div>
            </div>
            <input type="date" id="date" value="{{ now()->toDateString() }}"> <!-- Tanggal otomatis -->
        </div>

        <div class="form">
            <div class="dropdown-container">
                <div class="dropdown-header" onclick="toggleDropdown()">
                    Pilih Kategori
                    <span class="bi bi-caret-down-fill"></span>
                </div>
                <div class="dropdown-content" id="paymentOptions">
                    <div class="payment-option selected">Uang Tunai</div>
                    <div class="payment-option">BRI</div>
                    <div class="payment-option">Mandiri</div>
                    <div class="payment-option">Dana</div>
                    <div class="payment-option">BCA</div>
                    <div class="payment-option">Gopay</div>
                </div>
            </div>

            <input type="text" placeholder="judul Pengeluaran" required>
            <div id="formattedText">Rp 0</div>
            <input type="number" id="jumlah" placeholder="Masukkan jumlah uang" min="0" max="9999999999" oninput="updateFormattedText()">
            <input type="text" id="notes" placeholder="Catatan (optional)" required>

            <button class="save-btn">Simpan</button>
        </div>
    </main>

    <script>
        const simpanPengeluaranUrl = "{{ route('simpan.pengeluaran') }}"; // Menyimpan URL di variabel
    </script>
    <script src="{{ asset('assets/js/pengeluaran.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
