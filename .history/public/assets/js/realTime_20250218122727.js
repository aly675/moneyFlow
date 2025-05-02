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
                    // data: [data.totalPemasukan, data.totalPengeluaran],
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
