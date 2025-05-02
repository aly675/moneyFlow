<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard_target_barang.css')}}">
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
                <a class="bi bi-cash-stack" href="{{route('dashboard')}}"></a>
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
                <a class="bi bi-journal" id="active" href="{{route('target.barang.page')}}"></a>
            </i>
        </div>

    <main class="main-content">
        <div class="header">
            <div class="sub-title">Target Keuangan</div>
            <div></div>
        </div>
        <div class="container">
            <a href="/Dashboard/4Target/Target/index.html">
                <div class="target-card gpu">
                    <div class="item-name">GPU RTX</div>
                    <div class="price-info">Rp. 17.000.000/Rp. 25.000.000</div>
                    <div class="persen">47%</div>
                </div>
            </a>

            <a href="#">
                <div class="target-card phone">
                    <div class="item-name">Samsung S24</div>
                    <div class="price-info">Rp. 18.500.000/Rp. 20.000.000</div>
                    <div class="persen">81%</div>
                </div>
            </a>

            <a href="#">
                <div class="target-card shoes">
                    <div class="item-name">Sepatu Loubotin</div>
                    <div class="price-info">Rp. 3.500.000/Rp. 6.720.000</div>
                    <div class="persen">92%</div>
                </div>
            </a>
        </div>




            <a href="/Dashboard/4Target/tambahTarget/index.html" class="bi bi-plus-lg" id="first-btn"></a>



    </main>
    <script src="script.js"></script>
</body>
</html>
