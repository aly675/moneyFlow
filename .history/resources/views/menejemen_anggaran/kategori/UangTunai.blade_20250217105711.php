<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Uang Tunai</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/kategori.css') }}">
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
            <div><a class="bi bi-arrow-left-short" href="{{ route('manejemen.anggaran') }}"></a></div>
            <input type="date" id="date" value="{{ now()->toDateString() }}">
        </div>

        <div class="main-container">
            <h2>Pemasukan Kategori Uang Tunai</h2>
            <div class="show-data">
                <p class="bi bi-plus" id="pemasukan">
                    Rp. {{ number_format($pemasukan->sum('jumlah'), 0, ',', '.') }}
                </p>
                <a href="/Dashboard/2Rekening/Edit/index.html">Edit</a>
            </div>
            <div class="show-data">
                <p class="bi bi-dash" id="pengeluaran">
                    Rp. {{ number_format($pengeluaran->sum('jumlah'), 0, ',', '.') }} <!-- Anda perlu menambahkan logika untuk menghitung pengeluaran jika ada -->
                </p>
                <a href="">Edit</a>
            </div>

            <h3>Detail Pemasukan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemasukan as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->title }}</td>
                        <td>Rp. {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $item->deskripsi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script src="{{ asset('assets/js/kategori.js') }}"></script>
</body>
</html>
