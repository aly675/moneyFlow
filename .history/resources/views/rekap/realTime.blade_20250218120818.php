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
    <link rel="stylesheet" href="{{ asset('assets/css/realTime.css') }}" />
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
                <a class="bi bi-cash-stack" href="{{ route('dashboard') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-wallet2" href="{{ route('manejemen.anggaran') }}"></a>
            </i>
        </div>
        <div class="sidebar-icon">
            <i>
                <a class="bi bi-bar-chart-line" id="active" href="{{ route('rekap.realTime') }}"></a>
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
            <div></div>
            <input type="date" id="date" />
        </div>

        <div class="main-container">
            <a href="{{ route('rekap.realTime') }}" class="active">
                <p>Real time</p>
            </a>
            <a href="{{ route('rekap.bulanan') }}" class="inactive">
                <p>Bulanan</p>
            </a>
        </div>

        <div class="chart-container">
            <canvas id="expenseChart"></canvas>
        </div>

        <div class="legend">
            <div class="legend-item">
                <div class="legend-color pemasukan">85 %</div>
                <div>Sisa Saldo</div>
                <div class="legend-value">48.000,00</div>
            </div>
            <div class="legend-item">
                <div class="legend-color pengeluaran">15 %</div>
                <div>Pengeluaran</div>
                <div class="legend-value">52.000,00</div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('expenseChart');
            const ctx = canvas.getContext('2d');

            // Set input tanggal ke tanggal hari ini
            const dateInput = document.getElementById('date');
            dateInput.value = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

            let expenseChart; // Variabel untuk menyimpan instance chart

            // Fungsi untuk memperbarui grafik
            function updateChart(data) {
                // Jika chart sudah ada, hancurkan sebelum membuat yang baru
                if (expenseChart) {
                    expenseChart.destroy();
                }

                expenseChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Sisa Saldo', 'Pengeluaran'],
                        datasets: [{
                            data: [data.sisaSaldo, data.totalPengeluaran],
                            data: [data.sisaSaldo, data.totalPengeluaran],
                            backgroundColor: [
                                '#4caf50', // Warna hijau untuk sisa saldo
                                '#f44336'  // Warna merah untuk pengeluaran
                            ],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        cutout: '70%'
                    }
                });

                // Update legend
                updateLegend(data);
            }

            // Fungsi untuk memperbarui legend
            function updateLegend(data) {
                const legendItems = document.querySelectorAll('.legend-item');
                const total = Math.abs(data.sisaSaldo) + Math.abs(data.totalPengeluaran); // Menggunakan nilai absolut

                // Pastikan total tidak 0 untuk menghindari pembagian dengan 0
                const sisaSaldoPercentage = total > 0 ? (Math.abs(data.sisaSaldo) / total) * 100 : 0;
                const pengeluaranPercentage = total > 0 ? (Math.abs(data.totalPengeluaran) / total) * 100 : 0;

                // Update legend untuk Sisa Saldo
                legendItems[0].querySelector('.legend-value').textContent = `${data.sisaSaldo.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}`;
                legendItems[0].querySelector('.legend-color').textContent = `${Math.round(sisaSaldoPercentage)} %`; // Membulatkan persentase

                // Update legend untuk Pengeluaran
                legendItems[1].querySelector('.legend-value').textContent = `${data.totalPengeluaran.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}`;
                // legendItems[1].querySelector('.legend-value').textContent = `Rp. ${data.totalPengeluaran.toLocaleString('id-ID', { style: 'decimal' })}`;
                legendItems[1].querySelector('.legend-color').textContent = `${Math.round(pengeluaranPercentage)} %`; // Membulatkan persentase
            }

            // Ambil data saat halaman dimuat
            fetch('data/realtime')
                .then(response => response.json())
                .then(data => {
                    console.log('Data:', data); // Tambahkan log untuk debugging
                    updateChart(data);
                })
                .catch(error => console.error('Error fetching data:', error));

            // Event listener untuk tanggal
            dateInput.addEventListener('change', function() {
                const selectedDate = this.value;

                fetch(`data/realtime?tanggal=${selectedDate}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data:', data); // Tambahkan log untuk debugging
                        updateChart(data);
                    })
                    .catch(error => console.error('Error fetching data:', error));
            });
        });
    </script>
</body>
</html>
