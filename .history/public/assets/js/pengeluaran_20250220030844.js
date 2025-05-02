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
            this.classList. add('selected');
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
    // Menangani penyimpanan pengeluaran
    document.querySelector('.save-btn').addEventListener('click', function() {
        const tanggal = document.getElementById('date').value;
        const kategori = document.querySelector('.dropdown-header').textContent; // Ambil kategori dari dropdown
        const title = document.querySelector('input[type="text"]').value; // Ambil judul dari input
        const jumlah = document.querySelector('input[type="number"]').value; // Ambil jumlah dari input
        const deskripsi = document.getElementById('notes').value; // Ambil deskripsi dari input

        // Validasi input
        if (!tanggal || !kategori || !title || !jumlah) {
            alert('Harap isi semua field yang wajib diisi!');
            return;
        }

        // Data yang akan dikirim ke server
        const data = {
            tanggal,
            kategori,
            title,
            jumlah,
            deskripsi // Ganti catatan dengan deskripsi
        };

        // Kirim data ke server menggunakan AJAX
        fetch(simpanPengeluaranUrl, { // Ganti dengan URL yang sesuai
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(result => {
            if (result.success) {
                alert('Pengeluaran berhasil disimpan!');
                // Arahkan pengguna ke dashboard
                window.location.href = result.redirect; // Redirect ke URL yang diberikan
            } else {
                alert('Gagal menyimpan pengeluaran: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan pengeluaran: ' + error.message);
        });
    });
});


function updateFormattedText() {
    let input = document.getElementById("jumlah");
    let formattedText = document.getElementById("formattedText");
    let value = input.value;

    // Pastikan nilai tidak lebih dari 9.999.999.999
    if (value > 9999999999) {
        input.value = 9999999999;
        value = 9999999999;
    }

    // Format angka dengan titik setiap 3 digit
    let formattedValue = new Intl.NumberFormat("id-ID").format(value);
    formattedText.innerText = "Rp " + formattedValue;
}
