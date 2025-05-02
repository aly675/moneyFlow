<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetBarang extends Model
{
    protected $table = ''

    protected $fillable = [
        'id_user',
        'nama_barang',
        'harga_barang',
        'saldo_terkumpul',
        'id_pemasukan',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class, 'id_pemasukan');
    }
}
