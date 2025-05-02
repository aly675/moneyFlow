document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const oneMonthAgo = new Date();
    oneMonthAgo.setMonth(today.getMonth() - 1);

    // Format tanggal untuk input
    const startDate = oneMonthAgo.toISOString().split('T')[0];
    const endDate = today.toISOString().split('T')[0];

    // Set nilai input tanggal
    document.getElementById('start-date').value = startDate;
    document.getElementById('end-date').value = endDate;

    // Fungsi untuk mengambil data
    function fetchData(start, end) {
        fetch(`data/bulanan?start_date=${start}&end_date=${end}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('pemasukan').textContent = data.totalPemasukan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                document.getElementById('pengeluaran').textContent = data.totalPengeluaran.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                document.getElementById('selisih').textContent = data.selisih.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Ambil data saat halaman dimuat
    fetchData(startDate, endDate);

    // Event listener untuk perubahan tanggal
    document.getElementById('start-date').addEventListener('change', function() {
        const startDate = this.value;
        const endDate = document.getElementById('end-date').value;
        fetchData(startDate, endDate);
    });

    document.getElementById('end-date').addEventListener('change', function() {
        const startDate = document.getElementById('start-date').value;
        const endDate = this.value;
        fetchData(startDate, endDate);
    });
});
