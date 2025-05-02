// Toggle dropdown menu (Pemasukan/Pengeluaran)
document.getElementById("dropdownBtn").addEventListener("click", function () {
    let menu = document.getElementById("dropdownMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});

// Menutup dropdown menu jika klik di luar area dropdown
document.addEventListener("click", function (event) {
    let dropdown = document.querySelector(".dropdown");
    if (!dropdown.contains(event.target)) {
        document.getElementById("dropdownMenu").style.display = "none";
    }
});

// Toggle dropdown untuk kategori
function toggleDropdown(id) {
    const dropdownContent = document.getElementById(id);
    dropdownContent.classList.toggle('active');
}

// Memilih opsi dari dropdown kategori
const kategoriOptions = document.querySelectorAll('#kategoriOptions .payment-option');

kategoriOptions.forEach(option => {
    option.addEventListener('click', function() {
        // Hapus class 'selected' dari semua opsi
        kategoriOptions.forEach(opt => opt.classList.remove('selected'));

        // Tambahkan class 'selected' ke opsi yang dipilih
        this.classList.add('selected');

        // Update teks di header dropdown
        document.querySelector('#kategoriOptions').previousElementSibling.firstChild.textContent = this.textContent;

        // Sembunyikan dropdown setelah memilih
        document.getElementById('kategoriOptions').classList.remove('active');
    });
});

// Toggle input nominal target barang
function toggleTargetBarangInput() {
    const targetBarangInput = document.getElementById('targetBarangInput');
    const checkbox = document.getElementById('targetBarangCheckbox');
    targetBarangInput.style.display = checkbox.checked ? 'block' : 'none';
}


// Fungsi untuk menyimpan pemasukan
function simpanPemasukan() {
    const tanggal = document.getElementById('date').value;
    const kategori = document.querySelector('#kategoriOptions .selected').textContent;
    const title = document.getElementById('title').value;
    const jumlah = document.getElementById('jumlah').value;
    const catatan = document.getElementById('catatan').value;
    const targetBarangCheckbox = document.getElementById('targetBarangCheckbox').checked;
    const nominalTargetBarang = targetBarangCheckbox ? document.getElementById('nominalTargetBarang').value : null;

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
        catatan,
        alokasi_target_barang: targetBarangCheckbox,
        nominal_alokasi_target_barang: nominalTargetBarang
    };

    // Kirim data ke server menggunakan AJAX
    fetch(simpanPemasukanUrl, { // Menggunakan variabel URL
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
            alert('Pemasukan berhasil disimpan!');
            window.location.href = "{{ route('dashboard') }}";
        } else {
            alert('Gagal menyimpan pemasukan: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan pemasukan: ' + error.message);
    });
}
