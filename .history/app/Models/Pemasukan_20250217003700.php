<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $fillable = [
        'id_user',
        'title',
        'deskripsi',
        'jumlah',
        'kategori',
        'tanggal',
        'alokasi_target_barang',
        'nominal_alokasi_target_barang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function targetBarang()
    {
        return $this->hasOne(TargetBarang::class, 'id_pemasukan');
    }
}
