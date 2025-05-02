<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTargetBarangIdToPemasukanTable extends Migration
{
    public function up()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->foreignId('target_barang_id')->nullable()->constrained('target_barang')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->dropForeign(['target_barang_id']);
            $table->dropColumn('target_barang_id');
        });
    }
}
