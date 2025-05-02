<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Keuangan</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="mystyles.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

  </head>

  <body>
    <nav class="sidebar">
      <div class="sidebar-icon">
        <a href="">
          <img src="{{asset('assets/img/avatar.png')}}" alt="" class="profile" />
        </a>
      </div>
      <div class="sidebar-icon">
        <i>
          <a
            class="bi bi-cash-stack"
            href="{{route}}"
          >
          </a>
        </i>
      </div>
      <div class="sidebar-icon">
        <i>
          <a class="bi bi-wallet2" href="/Dashboard/2Rekening/index.html"> </a>
        </i>
      </div>
      <div class="sidebar-icon">
        <i>
          <a
            class="bi bi-bar-chart-line"
            id="active"
            href="/Dashboard/3Rekap/index.html"
          >
          </a>
        </i>
      </div>
      <div class="sidebar-icon">
        <i>
          <a class="bi bi-journal" href="/Dashboard/4Target/index.html"> </a>
        </i>
      </div>
    </nav>

    <main class="main-content">
      <div class="header">
        <div></div>
        <input type="date" id="date" />
      </div>

      <div class="main-container">
        <a href="/Dashboard/3Rekap/RealTime/index.html" class="inactive">
          <p>
            Real time
          </p>
        </a>
       <a href="/Dashboard/3Rekap/Bulanan/index.html" class="active">
        <p>
         Bulanan
        </p>
       </a>
    </div>

    <div class="date-range">12 Jan 2025-12 Feb 2025</div>

    <div class="show-data">
      <p>Pengeluaran</p>
       <p id="pengeluaran">52.000,00</p>
  </div>
  <div class="show-data">
    <p>Pemasukan</p>
     <p id="pemasukan">52.000,00</p>
</div>
<div class="show-data">
  <p>Selisih</p>
   <p id="pemasukan">52.000,00</p>
</div>
  </div>
</div>

    </main>

    <script src="script.js"></script>
  </body>
</html>


