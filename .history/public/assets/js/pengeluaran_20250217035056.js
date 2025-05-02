document.addEventListener("DOMContentLoaded", function() {
    // Set tanggal otomatis saat halaman dimuat
    document.getElementById('date').value = new Date().toISOString().split('T')[0];

    // Dropdown Pengeluaran
    document.getElementById("dropdownBtn").addEventListener("click", function () {
        let menu = document.getElementById("dropdownMenu");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    // Fungsi untuk menampilkan/tutup dropdown kategori
    function toggleDropdown() {
        let dropdown = document.getElementById("categoryOptions");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    window.toggleDropdown = toggleDropdown; // Agar bisa dipanggil di HTML

    // Fungsi untuk memilih kategori
    function selectCategory(category) {
        document.getElementById("selectedCategory").innerHTML = category + ' <span class="bi bi-caret-down-fill"></span>';
        document.getElementById("categoryOptions").style.display = "none";
    }

    window.selectCategory = selectCategory; // Agar bisa dipanggil di HTML

    // Menangani klik di luar dropdown untuk menutupnya
    document.addEventListener("click", function(event) {
        const categoryDropdown = document.querySelector(".dropdown-container");
        if (!categoryDropdown.contains(event.target)) {
            document.getElementById("categoryOptions").style.display = "none";
        }
    });

    // Menangani penyimpanan pengeluaran
    document.getElementById('saveBtn').addEventListener('click', function() {
        const tanggal = document.getElementById('date').value;
        const kategori = document.getElementById('selectedCategory').textContent.trim();
        const title = document.getElementById('title').value;
        const jumlah = document.getElementById('amount').value;
        const deskripsi = document.getElementById('notes').value;

        // Validasi input
        if (!tanggal || kategori === "Pilih Kategori" || !title || !jumlah) {
            alert('Harap isi semua field yang wajib diisi!');
            return;
        }

        // Data yang akan dikirim ke server
        const data = {
            tanggal,
            kategori,
            title,
            jumlah,
            deskripsi
        };

        // Kirim data ke server menggunakan AJAX
        fetch("{{ route('simpan.pengeluaran') }}", {
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
                // Reset form
                document.getElementById('date').value = new Date().toISOString().split('T')[0];
                document.getElementById('title').value = '';
                document.getElementById('amount').value = '';
                document.getElementById('notes').value = '';
                document.getElementById('selectedCategory').innerHTML = 'Pilih Kategori <span class="bi bi-caret-down-fill"></span>';
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
