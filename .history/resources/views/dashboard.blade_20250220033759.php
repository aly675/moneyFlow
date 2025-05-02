<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="icon" href="{{asset('assets/img/logo.svg')}}">
</head>

<body>
    <nav class="sidebar">
        <div class="sidebar-icon">
            <a href="">
                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="profile">
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
                <a class="bi bi-journal" href="{{route()}}"></a>
            </i>
        </div>

        <!-- Form Logout -->
        <div class="logout-container" style="position: absolute; bottom: 20px; left: 10px;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-gray-800" style="background: none; border: none; cursor: pointer;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="main-content">
        <div class="header">
            <div></div>
            <!-- Tambahkan ID untuk input tanggal -->
            <input type="date" id="tanggal" value="{{ now()->toDateString() }}">
        </div>

        <div class="main-container">
            <div class="card">
                <p id="top">Pemasukan</p>
                <div id="loadingIndicator" style="display: none; text-align: center;">Loading...</div>
                <p id="totalPemasukan">-</p>
            </div>
            <div class="card">
                <p id="top">Pengeluaran</p>
                <div id="loadingIndicator" style="display: none; text-align: center;">Loading...</div>
                <p id="totalPengeluaran">-</p>
            </div>
            <div class="card">
                <p id="top">Balance</p>
                <div id="loadingIndicator" style="display: none; text-align: center;">Loading...</div>
                <p id="balance">-</p>
            </div>
        </div>

        <div class="page">
            <div id="dataContainer">
                <!-- Data pemasukan dan pengeluaran akan diisi oleh AJAX -->
                  {{-- <div class="show-data"> --}}
                {{-- <div class="keuntungan-txt"> --}}
                    {{-- <p id="top">Keuntungan Seharian</p> --}}
                    {{-- <p>Jualan</p> --}}
                {{-- </div> --}}
                <!-- Tambahkan ID untuk menampilkan detail pemasukan -->
                {{-- <div class="show-money-pemasukan" id="detailPemasukan"> --}}
                    <!-- Data akan diisi oleh AJAX -->
                {{-- </div> --}}
            {{-- </div> --}}
            </div>

        <div class="container">
            <button class="bi bi-plus-lg" id="first-btn"></button>

            <div class="menu" id="menu">
                <a href="{{route('pemasukan_page')}}" id="pemasukan">
                    <div class="label">Pemasukan</div>
                    <button class="menu-item bi bi-currency-dollar pemasukan"></button>
                </a>

                <a href="{{route('pengeluaran_page')}}" id="pengeluaran">
                    <div class="label">Pengeluaran</div>
                    <button class="menu-item bi bi-cart4 pengeluaran"></button>
                </a>
            </div>
        </div>
    </main>

    <script>
        const dashboardDataUrl = "{{ route('dashboard.data') }}"; // Menyimpan URL di variabel
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
