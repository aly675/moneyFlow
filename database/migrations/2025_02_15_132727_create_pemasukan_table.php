<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Judul pemasukan
            $table->text('deskripsi')->nullable(); // Deskripsi pemasukan
            $table->decimal('jumlah', 12, 2); // Jumlah pemasukan
            $table->enum('kategori', ['Uang Tunai', 'Dana', 'BCA', 'BRI', 'Mandiri', 'Gopay']); // Kategori (metode pembayaran)
            $table->date('tanggal'); // Tanggal pemasukan
            $table->boolean('alokasi_target_barang')->default(false); // Apakah dialokasikan ke target barang?
            $table->decimal('nominal_alokasi_target_barang', 12, 2)->nullable(); // Nominal yang dialokasikan ke target barang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
