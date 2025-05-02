namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetBarang extends Model
{
    protected $table = 'target_barang';

    protected $fillable = [
        'id_user',
        'nama_barang',
        'harga_barang',
        'saldo_terkumpul',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id_pemasukan'); // Pastikan 'id_pemasukan' adalah kolom yang sesuai di tabel pemasukan
    }
}
