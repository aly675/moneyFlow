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

// Fungsi untuk memformat angka menjadi format mata uang
function formatRupiah(angka) {
    let numberString = angka.replace(/[^,\d]/g, '').toString();
    let split = numberString.split(',');
    let sisa = split[0].length % 3;
    let rupiah = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // Tambahkan titik setiap 3 angka
    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah ? 'Rp ' + rupiah : '';
}

// Batas maksimum untuk input jumlah
const MAX_AMOUNT = 9999999999;

// Event listener untuk input jumlah
document.getElementById('jumlah').addEventListener('input', function() {
    // Menghapus karakter yang tidak diinginkan
    let inputValue = this.value.replace(/[^0-9]/g, '');

    // Memeriksa apakah nilai melebihi batas maksimum
    if (parseInt(inputValue) > MAX_AMOUNT) {
        inputValue = MAX_AMOUNT.toString(); // Set ke batas maksimum
    }

    // Memformat nilai dan mengupdate input
    this.value = formatRupiah(inputValue);
});

// Fungsi untuk menyimpan pemasukan
function simpanPemasukan() {
    const tanggal = document.getElementById('date').value;
    const kategori = document.querySelector('#kategoriOptions .selected').textContent;
    const title = document.getElementById('title').value;
    const jumlah = document.getElementById('jumlah').value;
    const deskripsi = document.getElementById('catatan').value; // Ubah catatan menjadi deskripsi
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
        deskripsi, // Ganti catatan dengan deskripsi
        alokasi_target_barang: targetBarangCheckbox,
        nominal_alokasi_target_barang: nominalTargetBarang
    };

    // Kirim data ke server menggunakan AJAX
    fetch(simpanPemasukanUrl, {
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
            window.location.href =  result.redirect;
        } else {
            alert('Gagal menyimpan pemasukan: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan pemasukan: ' + error.message);
    });
}
