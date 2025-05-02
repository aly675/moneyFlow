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
        const dropdownContent = document.getElementById('paymentOptions');
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    };

    // Menangani dropdown untuk kategori
    const paymentOptions = document.querySelectorAll('.payment-option');
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            paymentOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            document.querySelector('.dropdown-header').firstChild.textContent = this.textContent;
            document.getElementById('paymentOptions').style.display = "none"; // Sembunyikan dropdown setelah memilih
        });
    });

    // Menangani klik di luar dropdown untuk menutupnya
    document.addEventListener("click", function(event) {
        const dropdown = document.querySelector(".dropdown-container");
        if (!dropdown.contains(event.target)) {
            document.getElementById("paymentOptions").style.display = "none";
        }
    });

    // Menangani penyimpanan pengeluaran
    document.querySelector('.save-btn').addEventListener
