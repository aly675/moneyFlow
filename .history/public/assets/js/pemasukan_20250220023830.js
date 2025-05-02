const simpanPemasukanUrl = "{{ route('simpan.pemasukan') }}"; // Menyimpan URL di variabel

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
    const tanggal
