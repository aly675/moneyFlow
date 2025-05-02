<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
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
                <p id="top">Jumlah</p>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}">
    document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById("first-btn");
    const menu = document.getElementById("menu");

    toggleBtn.addEventListener("click", function() {
        if (menu.style.display === "flex") {
            menu.style.display = "none";
        } else {
            menu.style.display = "flex";
        }
    });
});

const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
});

$('#totalPemasukan').text(formatter.format(response.totalPemasukan));
$('#totalPengeluaran').text(formatter.format(response.totalPengeluaran));
$('#balance').text(formatter.format(response.balance));

$(document).ready(function() {
    // Fungsi untuk mengambil data berdasarkan tanggal
    function fetchData(tanggal) {
        $('#loadingIndicator').show(); // Tampilkan loading indicator
        $.ajax({
            url: "{{ route('dashboard.data') }}",
            method: 'GET',
            data: { tanggal: tanggal },
            success: function(data) { // Ubah response menjadi data
                // Update total pemasukan, pengeluaran, dan balance
                $('#totalPemasukan').text(formatter.format(data.totalPemasukan));
                $('#totalPengeluaran').text(formatter.format(data.totalPengeluaran));
                $('#balance').text(formatter.format(data.balance));

                // Kosongkan container data
                $('#dataContainer').empty();

                // Tambahkan data pemasukan
                data.pemasukan.forEach(function(item) {
                    $('#dataContainer').append(`
                        <div class="show-data">
                            <div class="keuntungan-txt">
                                <p id="top">${item.title}</p>
                                <p>${item.deskripsi}</p>
                            </div>
                            <div class="show-money-pemasukan">
                                <p class="bi bi-plus">${formatter.format(item.jumlah)}</p>
                            </div>
                        </div>
                    `);
                });

                // Tambahkan data pengeluaran
                data.pengeluaran.forEach(function(item) {
                    $('#dataContainer').append(`
                        <div class="show-data">
                            <div class="kerugian-txt">
                                <p id="top">${item.title}</p>
                                <p>${item.deskripsi}</p>
                            </div>
                            <div class="show-money-pengeluaran">
                                <p class="bi bi-dash">${formatter.format(item.jumlah)}</p>
                            </div>
                        </div>
                    `);
                });

                $('#loadingIndicator').hide(); // Sembunyikan loading indicator
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data:", error);
                $('#loadingIndicator').hide(); // Sembunyikan loading indicator
            }
        });
    }

    // Ambil data saat halaman pertama kali dimuat
    fetchData($('#tanggal').val());

    // Event listener untuk input tanggal
    $('#tanggal').on('change', function() {
        fetchData($(this).val());
    });
});

function fetchData(tanggal) {
    $('#loadingIndicator').show(); // Tampilkan loading indicator
    $.ajax({
        url: "{{ route('dashboard.data') }}",
        method: 'GET',
        data: { tanggal: tanggal },
        success: function(response) {
            // Update data
            $('#loadingIndicator').hide(); // Sembunyikan loading indicator
        },
        error: function(xhr, status, error) {
            console.error("Error fetching data:", error);
            $('#loadingIndicator').hide(); // Sembunyikan loading indicator
        }
    });
}


    </script>
