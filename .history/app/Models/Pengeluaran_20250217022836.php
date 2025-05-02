<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = pengeluaran;
    protected $fillable = [
        'id_user',
        'title',
        'deskripsi',
        'jumlah',
        'kategori',
        'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
