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

function toggleDropdown() {
    const dropdownContent = document.getElementById('paymentOptions');
    dropdownContent.classList.toggle('active');
  }

  const paymentOptions = document.querySelectorAll('.payment-option');
  paymentOptions.forEach(option => {
    option.addEventListener('click', function() {
      paymentOptions.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');
      document.querySelector('.dropdown-header').firstChild.textContent = this.textContent;
      document.getElementById('paymentOptions').classList.remove('active');
    });
  });

  function selectCategory(category) {
    const notesInput = document.getElementById('notes');
    notesInput.value = category;

    const buttons = document.querySelectorAll('.category-btn');
    buttons.forEach(btn => {
      if (btn.textContent === category) {
        btn.classList.add('selected');
      } else {
        btn.classList.remove('selected');
      }
    });
  }

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
    fetch("{{ route('simpan.pengeluaran') }}", { // Ganti dengan URL yang sesuai
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
            // Reset form atau lakukan tindakan lain setelah berhasil
        } else {
            alert('Gagal menyimpan pengeluaran: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan pengeluaran: ' + error.message);
    });
});
