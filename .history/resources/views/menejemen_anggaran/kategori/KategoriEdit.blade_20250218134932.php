<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/editKategori.css')}}">
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
                href="{{route('rekap.realTime')}}">
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
        <input type="date" id="date">
    </div>
        <div class="form">
           <form action="{{ route('update.pemasukan.pengeluaran', ['type' => $type, 'id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="number" name="jumlah" placeholder="Masukkan jumlah uang" value="{{ $data->jumlah }}" required>
                <input type="text" name="judul" id="notes" placeholder="Judul" value="{{ $data->judul }}" required>
                <input type="text" name="catatan" placeholder="Catatan (opsional)" value="{{ $data->catatan }}">
                <button type="submit" class="save-btn">Edit</button>
            </form>
        </div>
</main>


    <script src=""></script>
</body>
</html>
