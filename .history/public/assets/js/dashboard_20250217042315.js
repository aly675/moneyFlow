document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById("first-btn");
    const menu = document.getElementById("menu");

    toggleBtn.addEventListener("click", function() {
        if (menu.style.display === "flex") {
            menu.style.display = "none";
        } else {
            menu.style.display = "flex";
        }
    });
});

const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
});

// $('#totalPemasukan').text(formatter.format(response.totalPemasukan));
// $('#totalPengeluaran').text(formatter.format(response.totalPengeluaran));
// $('#balance').text(formatter.format(response.balance));

$(document).ready(function() {
    // Fungsi untuk mengambil data berdasarkan tanggal
    function fetchData(tanggal) {
        $('#loadingIndicator').show(); // Tampilkan loading indicator
        $.ajax({
            url: dashboardDataUrl,
            method: 'GET',
            data: { tanggal: tanggal },
            success: function(data) { // Ubah response menjadi data
                // Update total pemasukan, pengeluaran, dan balance
                $('#totalPemasukan').text(formatter.format(data.totalPemasukan));
                $('#totalPengeluaran').text(formatter.format(data.totalPengeluaran));
                $('#balance').text(formatter.format(data.balance));

                // Kosongkan container data
                $('#dataContainer').empty();

                // Tambahkan data pemasukan
                data.pemasukan.forEach(function(item) {
                    $('#dataContainer').append(`
                        <div class="show-data">
                            <div class="keuntungan-txt">
                                <p id="top">${item.title}</p>
                                <p>${item.deskripsi}</p>
                                <p>${item.kategori}</p>
                            </div>
                            <div class="show-money-pemasukan">
                                <p class="bi bi-plus">${formatter.format(item.jumlah)}</p>
                            </div>
                        </div>
                    `);
                });

                // Tambahkan data pengeluaran
                data.pengeluaran.forEach(function(item) {
                    $('#dataContainer').append(`
                        <div class="show-data">
                            <div class="kerugian-txt">
                                <p id="top">${item.title}</p>
                                <p>${item.deskripsi}</p>
                                <p>${item.kategori}</p>
                            </div>
                            <div class="show-money-pengeluaran">
                                <p class="bi bi-dash">${formatter.format(item.jumlah)}</p>
                            </div>
                        </div>
                    `);
                });

                $('#loadingIndicator').hide(); // Sembunyikan loading indicator
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data:", error);
                $('#loadingIndicator').hide(); // Sembunyikan loading indicator
            }
        });
    }

    // Ambil data saat halaman pertama kali dimuat
    fetchData($('#tanggal').val());

    // Event listener untuk input tanggal
    $('#tanggal').on('change', function() {
        fetchData($(this).val());
    });
});

function fetchData(tanggal) {
    $('#loadingIndicator').show(); // Tampilkan loading indicator
    $.ajax({
        url: "{{ route('dashboard.data') }}",
        method: 'GET',
        data: { tanggal: tanggal },
        success: function(response) {
            // Update data
            $('#loadingIndicator').hide(); // Sembunyikan loading indicator
        },
        error: function(xhr, status, error) {
            console.error("Error fetching data:", error);
            $('#loadingIndicator').hide(); // Sembunyikan loading indicator
        }
    });
}

