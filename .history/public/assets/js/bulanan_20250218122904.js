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

    // Ambil data saat halaman dimuat
    fetch(`/api/monthly-data?start_date=${startDate}&end_date=${endDate}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('pemasukan').textContent = data.totalPemasukan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            document.getElementById('pengeluaran').textContent = data.totalPengeluaran.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            document.getElementById('selis
