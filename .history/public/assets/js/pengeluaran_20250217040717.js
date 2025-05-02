// pengeluaran.js

document.addEventListener("DOMContentLoaded", function() {
    // Set tanggal otomatis saat halaman dimuat
    document.getElementById('date').value = new Date().toISOString().split('T')[0];

    // Menangani dropdown untuk pengeluaran
    document.getElementById("dropdownBtn").addEventListener("click", function () {
        let menu = document.getElementById("dropdownMenu");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    // Fungsi untuk toggle dropdown kategori
    window.toggleDropdown = function() {
