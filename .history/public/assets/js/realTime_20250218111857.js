document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('expenseChart');
    const ctx = canvas.getContext('2d');

    // Set input tanggal ke tanggal hari ini
    const dateInput = document.getElementById('date');
    dateInput.value = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

    // Fungsi untuk memperbarui grafik
    function updateChart(data) {
        const expenseChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Sisa Saldo', 'Pengeluaran'],
                datasets: [{
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
    }

    // Ambil data saat halaman dimuat
    fetch('//realtime')
        .then(response => response.json())
        .then(data => {
            updateChart(data);
        })
        .catch(error => console.error('Error fetching data:', error));

    // Event listener untuk tanggal
    dateInput.addEventListener('change', function() {
        const selectedDate = this.value;

        fetch(`/api/realtime?tanggal=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                updateChart(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    });
});
