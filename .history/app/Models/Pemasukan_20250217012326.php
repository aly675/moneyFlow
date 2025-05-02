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
        'catatan',
        'alokasi_target_barang',
        'nominal_alokasi_target_barang'
    ];

    // Jika Anda menggunakan timestamp, pastikan ini diatur
    public $timestamps = true;

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan TargetBarang
    public function targetBarang()
    {
        return $this->hasOne(TargetBarang::class, 'id_pemasukan');
    }
}
