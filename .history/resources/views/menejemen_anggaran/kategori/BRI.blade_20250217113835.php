<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/kategori.css')}}">
</head>

<body>
    <nav class="sidebar">
        <div class ="sidebar-icon ">
            <a href="">
                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="profile">
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class="bi bi-cash-stack"
                href="{{route('dashboard')}}">
                </a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class = "bi bi-wallet2" id="active"
                href="{{route('manejemen.anggaran')}}">
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
            <div><a class="bi bi-arrow-left-short" href="{{route('manejemen.anggaran')}}" ></a></div>
            {{-- <input type="date" id="date"> --}}
        </div>


        <div class="main-container">
            <div class="dropdown-container">
                <div class="dropdown-header" onclick="toggleDropdown()">
                  BRI
                  <span class="bi bi-caret-down-fill"></span>
                </div>
                <div class="dropdown-content " id="paymentOptions">
                  <div class="payment-option"><a href="{{route('kategori.UangTunai')}}">Uang Tunai</a></div>
                  <div class="payment-option selected"><a href="{{route('kategori.BRI')}}">BRI</a></div>
                  <div class="payment-option"><a href="{{route('kategori.Mandiri')}}">Mandiri</a></div>
                  <div class="payment-option"><a href="{{route('kategori.Dana')}}">Dana</a></div>
                  <div class="payment-option"><a href="{{route('kategori.BCA')}}">BCA</a></div>
                  <div class="payment-option"><a href="{{route('kategori.Gopay')}}">Gopay</a></div>
                </div>
            </div>


            <h2>Pemasukan</h2>
            @foreach($pemasukan as $item)
            <div class="show-data">
                <p class="bi bi-plus" id="pemasukan">Rp. {{ number_format($item->jumlah, 0, ',', '.') }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('                d-m-Y') }}</p>
                <a href="/Dashboard/2Rekening/Edit/index.html">Edit</a>
            </div>
            @endforeach

            <h2>Pengeluaran</h2>
            @foreach($pengeluaran as $item)
            <div class="show-data">
                <p class="bi bi-dash" id="pengeluaran">Rp. {{ number_format($item->jumlah, 0, ',', '.') }} - {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</p>
                <a href="/Dashboard/2Rekening/Edit/index.html">Edit</a>
            </div>
            @endforeach
        </div>

    </main>
    <script src="{{asset('assets/js/kategori.js')}}"></script>
</body>
</html>
