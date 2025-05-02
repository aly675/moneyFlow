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
        Schema::create('target_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nama_barang'); // Nama barang yang ditargetkan
            $table->decimal('harga_barang', 14, 2); // Harga barang
            $table->decimal('saldo_terkumpul', 14, 2)->default(0); // Saldo yang sudah terkumpul
            $table->foreignId('id_pemasukan')->nullable()->constrained('pemasukan')->onDelete('set null'); // Relasi ke pemasukan
            $table->string('status')->default('Dalam Proses'); // Status target barang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_barang');
    }
};
