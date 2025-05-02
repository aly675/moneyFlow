document.addEventListener("DOMContentLoaded", function() {
    // Set tanggal otomatis saat halaman dimuat
    document.getElementById('date').value = new Date().toISOString().split('T')[0];

    // Menangani dropdown untuk peng
