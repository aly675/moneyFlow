<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset}}">
</head>

<body>
    <nav class="sidebar">
        <div class ="sidebar-icon ">
            <a href="">
                <img src="img/avatar.png" alt="" class="profile">
            </a>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class="bi bi-cash-stack"
                href="/Dashboard/1Transaksi/Main/index.html">
                </a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a
                class = "bi bi-wallet2" id="active"
                href="/Dashboard/2Rekening/Main/index.html">
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
            <div><a class="bi bi-arrow-left-short" href="/Dashboard/2Rekening/Main/index.html" ></a></div>
            <input type="date" id="date">
        </div>


        <div class="main-container">
            <div class="dropdown-container">
                <div class="dropdown-header" onclick="toggleDropdown()">
                  Uang Tunai
                  <span class="bi bi-caret-down-fill"></span>
                </div>
                <div class="dropdown-content " id="paymentOptions">
                  <div class="payment-option selected"><a href="/Dashboard/2Rekening/UangTunai/index.html">Uang Tunai</a></div>
                  <div class="payment-option"><a href="/Dashboard/2Rekening/BRI/index.html">BRI</a></div>
                  <div class="payment-option"><a href="/Dashboard/2Rekening/Mandiri/index.html">Mandiri</a></div>
                  <div class="payment-option"><a href="/Dashboard/2Rekening/Dana/index.html">Dana</a></div>
                  <div class="payment-option"><a href="/Dashboard/2Rekening/BCA/index.html">BCA</a></div>
                  <div class="payment-option"><a href="/Dashboard/2Rekening/Gopay/index.html">Gopay</a></div>
                </div>
            </div>

            <div class="show-data">
                <p class="bi bi-plus" id="pemasukan">200.000</p>
                 <a href="/Dashboard/2Rekening/Edit/index.html">Edit</a>
            </div>
            <div class="show-data">
                <p class="bi bi-dash" id="pengeluaran">200.000</p>
                <a href="">Edit</a>
            </div>
        </div>

    </main>
    <script src="script.js"></script>
</body>
</html>
