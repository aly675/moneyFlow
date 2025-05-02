
// Toggle input nominal target barang
function toggleTargetBarangInput() {
    const targetBarangDropdown = document.getElementById('targetBarangDropdown');
    const checkbox = document.getElementById('targetBarangCheckbox');

    if (checkbox.checked) {
        targetBarangDropdown.style.display = 'block';
        fetchTargetBarang(); // Ambil target barang dari server
    } else {
        targetBarangDropdown.style.display = 'none';
    }
}

// Ambil target barang dari server
function fetchTargetBarang() {
    fetch('/api/target-barang') // Ganti dengan URL endpoint yang sesuai
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('targetBarangSelect');
            select.innerHTML = '<option value="">Pilih Target Barang</option>'; // Reset dropdown

            data.forEach(target => {
                const option = document.createElement('option');
                option.value = target.id; // ID target barang
                option.textContent = target.nama_barang; // Nama barang
                select.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching target barang:', error);
        });
}

// Fungsi untuk menyimpan pemasukan
function simpanPemasukan() {
    const tanggal = document.getElementById('date').value;
    const kategori = document.querySelector('#kategoriOptions .selected').textContent;
    const title = document.getElementById('title').value;
    const jumlah = parseFloat(document.getElementById('jumlah').value);
    const deskripsi = document.getElementById('catatan').value;
    const targetBarangCheckbox = document.getElementById('targetBarangCheckbox').checked;
    const nominalTargetBarang = targetBarangCheckbox ? parseFloat(document.getElementById('nominalTargetBarang').value) : null;

    // Validasi input
    if (!tanggal || !kategori || !title || !jumlah) {
        alert('Harap isi semua field yang wajib diisi!');
        return;
    }

    // Validasi nominal target barang
    if (targetBarangCheckbox && nominalTargetBarang > jumlah) {
        alert('Nominal untuk target barang tidak boleh lebih besar dari jumlah pemasukan!');
        return;
    }

    // Data yang akan dikirim ke server
    const data = {
        tanggal,
        kategori,
        title,
        jumlah,
        deskripsi,
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
            return response.json().then(err => {
                // Menampilkan pesan kesalahan
                alert('Gagal menyimpan pemasukan: ' + (err.message || 'Terjadi kesalahan.'));
            });
        }
        return response.json();
    })
    .then(result => {
        if (result.success) {
            alert('Pemasukan berhasil disimpan!');
            window.location.href = result.redirect; // Redirect ke halaman yang diinginkan
        } else {
            alert('Gagal menyimpan pemasukan: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan pemasukan: ' + error.message);
    });
}

// Fungsi untuk memperbarui teks yang diformat
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

// Toggle dropdown menu untuk kategori
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

document.getElementById("dropdownBtn").addEventListener("click", function () {
    let menu = document.getElementById("dropdownMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});

document.addEventListener("click", function (event) {
    let dropdown = document.querySelector(".dropdown");
    if (!dropdown.contains(event.target)) {
        document.getElementById("dropdownMenu").style.display = "none";
    }
});


 // Menangani klik di luar dropdown untuk menutupnya
 document.addEventListener("click", function(event) {
    const dropdown = document.querySelector(".dropdown-container");
    if (!dropdown.contains(event.target)) {
        document.getElementById("paymentOptions").style.display = "none";
    }
});

// Toggle dropdown menu untuk kategori
function toggleDropdown(id) {
    const dropdownContent = document.getElementById(id);
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
}

// Menutup dropdown menu jika klik di luar area dropdown
document.addEventListener("click", function (event) {
    const dropdown = document.querySelector(".dropdown-container");
    const dropdownContent = document.getElementById("kategoriOptions");
    if (!dropdown.contains(event.target)) {
        dropdownContent.style.display = "none";
    }
});

