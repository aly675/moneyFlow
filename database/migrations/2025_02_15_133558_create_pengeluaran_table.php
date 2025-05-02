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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Judul pengeluaran
            $table->text('deskripsi')->nullable(); // Deskripsi pengeluaran
            $table->decimal('jumlah', 12, 2); // Jumlah pengeluaran
            $table->enum('kategori', ['Uang Tunai', 'Dana', 'BCA', 'BRI', 'Mandiri', 'Gopay']); // Kategori (metode pembayaran)
            $table->date('tanggal'); // Tanggal pengeluaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};

