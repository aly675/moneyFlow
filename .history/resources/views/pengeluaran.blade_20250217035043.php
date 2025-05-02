<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/pengeluaran.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="sidebar">
        <div class="sidebar-icon">
            <a href="">
                <img src="{{ asset('assets/img/avatar.png') }}" alt="Profile" class="profile">
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-cash-stack" id="active" href="{{route('dashboard')}}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" href="/Dashboard/2Rekening/index.html"></a>
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
            <div class="dropdown">
                <button id="dropdownBtn" class="dropdown-btn">Pengeluaran <span class="bi bi-caret-down-fill"></span></button>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="{{route('pemasukan_page')}}">Pemasukan</a>
                </div>
            </div>
            <input type="date" id="date">
        </div>

        <div class="form">
            <div class="dropdown-container">
                <div class="dropdown-header" id="selectedCategory" onclick="toggleDropdown()">
                    Pilih Kategori
                    <span class="bi bi-caret-down-fill"></span>
                </div>
                <div class="dropdown-content" id="categoryOptions">
                    <div class="category-option" onclick="selectCategory('Jajan')">Jajan</div>
                    <div class="category-option" onclick="selectCategory('Jualan')">Jualan</div>
                    <div class="category-option" onclick="selectCategory('Modal')">Modal</div>
                    <div class="category-option" onclick="selectCategory('Belanja')">Belanja</div>
                </div>
            </div>

            <input type="text" id="title" placeholder="Masukkan judul" required>
            <input type="number" id="amount" placeholder="Masukkan jumlah uang" required>
            <input type="text" id="notes" placeholder="Deskripsi" required>

            <button class="save-btn" id="saveBtn">Simpan</button>
        </div>
    </main>

    <script src="{{ asset('assets/js/pengeluaran.js') }}"></script>
    
</body>
</html>
