<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getData(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        $pemasukan = Pemasukan::where('tanggal', $tanggal)
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('tanggal', $tanggal)
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();

        // Hitung total pemasukan, pengeluaran, dan balance
        $totalPemasukan = $pemasukan->sum('jumlah');
        $totalPengeluaran = $pengeluaran->sum('jumlah');
        $balance = $totalPemasukan - $totalPengeluaran;

        // Log data untuk debugging
        Log::info('Tanggal yang diminta: ' . $tanggal);
        Log::info('Data Pemasukan: ', $pemasukan->toArray());
        Log::info('Data Pengeluaran: ', $pengeluaran->toArray());

        return response()->json([
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'balance' => $balance,
        ]);
    }

    public function menejemen_anggaran_dashboard()
    {
        $uangTunai_pemasukan = Pemasukan::where('kategori', 'Uang Tunai')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $bri_pemasukan = Pemasukan::where('kategori', 'BRI')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $mandiri_pemasukan = Pemasukan::where('kategori', 'Mandiri')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $dana_pemasukan = Pemasukan::where('kategori', 'Dana')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $bca_pemasukan = Pemasukan::where('kategori', 'BCA')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $gopay_pemasukan = Pemasukan::where('kategori', 'Gopay')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');

        $uangTunai_pengeluaran = Pengeluaran::where('kategori', 'Uang Tunai')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $bri_pengeluaran = Pengeluaran::where('kategori', 'BRI')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $mandiri_pengeluaran = Pengeluaran::where('kategori', 'Mandiri')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $dana_pengeluaran = Pengeluaran::where('kategori', 'Dana')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $bca_pengeluaran = Pengeluaran::where('kategori', 'BCA')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');
        $gopay_pengeluaran = Pengeluaran::where('kategori', 'Gopay')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->sum('jumlah');

        $uangTunai = $uangTunai_pemasukan - $uangTunai_pengeluaran;
        $bri = $bri_pemasukan - $bri_pengeluaran;
        $mandiri = $mandiri_pemasukan - $mandiri_pengeluaran;
        $dana = $dana_pemasukan - $dana_pengeluaran;
        $bca = $bca_pemasukan - $bca_pengeluaran;
        $gopay = $gopay_pemasukan - $gopay_pengeluaran;

        return view('menejemen_anggaran.dashboardMenejemenAnggaran', compact('uangTunai', 'bri', 'mandiri', 'dana', 'bca', 'gopay'));
    }

    // Metode untuk menampilkan halaman kategori Uang Tunai
    public function uangTunai_page()
    {
        $pemasukan = Pemasukan::where('kategori', 'Uang Tunai')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('kategori', 'Uang Tunai')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        return view('menejemen_anggaran.kategori.UangTunai', compact('pemasukan', 'pengeluaran'));
    }

    // Metode untuk menampilkan halaman kategori Mandiri
    public function mandiri_page()
    {
        $pemasukan = Pemasukan::where('kategori', 'Mandiri')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('kategori', 'Mandiri')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        return view('menejemen_anggaran.kategori.Mandiri', compact('pemasukan', 'pengeluaran'));
    }

    // Metode untuk menampilkan halaman kategori Gopay
    public function gopay_page()
    {
        $pemasukan = Pemasukan::where('kategori', 'Gopay')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('kategori', 'Gopay')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        return view('menejemen_anggaran.kategori.Gopay', compact('pemasukan', 'pengeluaran'));
    }

    // Metode untuk menampilkan halaman kategori Dana
    public function dana_page()
    {
        $pemasukan = Pemasukan::where('kategori', 'Dana')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('kategori', 'Dana')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        return view('menejemen_anggaran.kategori.Dana', compact('pemasukan', 'pengeluaran'));
    }

    // Metode untuk menampilkan halaman kategori BRI
    public function BRI_page()
    {
        $pemasukan = Pemasukan::where('kategori', 'BRI')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('kategori', 'BRI')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        return view('menejemen_anggaran.kategori.BRI', compact('pemasukan', 'pengeluaran'));
    }

    // Metode untuk menampilkan halaman kategori BCA
    public function BCA_page()
    {
        $pemasukan = Pemasukan::where('kategori', 'BCA')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        $pengeluaran = Pengeluaran::where('kategori', 'BCA')
            ->where('id_user', Auth::id()) // Filter berdasarkan user
            ->get();
        return view('menejemen_anggaran.kategori.BCA', compact('pemasukan', 'pengeluaran'));
    }

    public function realTime_page()
    {
        return view('rekap.realTime');
    }

    public function bulanan_page()
    {
        return view('rekap.bulanan');
    }

    public function getRealTimeData(Request $request)
    {
        // Ambil tanggal dari request, jika tidak ada, gunakan tanggal hari ini
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Ambil data pemasukan dan pengeluaran berdasarkan tanggal dan user
        $totalPemasukan = Pemasukan::where('tanggal', $tanggal)
            ->where('id_user', Auth::id()) // Pastikan menggunakan 'id_user' yang sesuai
            ->sum('jumlah');

        $totalPengeluaran = Pengeluaran::where('tanggal', $tanggal)
            ->where('id_user', Auth::id()) // Pastikan menggunakan 'user_id' yang sesuai
            ->sum('jumlah');

        // Hitung sisa saldo
        $sisaSaldo = $totalPemasukan - $totalPengeluaran;

        $totalPemasukan = intval($totalPemasukan);
        $totalPengeluaran = intval($totalPengeluaran);

        return response()->json([
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'sisaSaldo' => $sisaSaldo,
            'tanggal' => $tanggal,
        ]);
    }

    public function getBulananData(Request $request)
{
    // Ambil tanggal dari request, jika tidak ada, gunakan tanggal hari ini
    $startDate = $request->input('start_date', Carbon::today()->subMonth()->toDateString());
    $endDate = $request->input('end_date', Carbon::today()->toDateString());

    // Ambil data pemasukan dan pengeluaran berdasarkan rentang tanggal dan user
    $totalPemasukan = Pemasukan::whereBetween('tanggal', [$startDate, $endDate])
        ->where('id_user', Auth::id())
        ->sum('jumlah');

    $totalPengeluaran = Pengeluaran::whereBetween('tanggal', [$startDate, $endDate])
        ->where('id_user', Auth::id())
        ->sum('jumlah');

    // Hitung selisih
    $selisih = $totalPemasukan - $totalPengeluaran;

    $totalPemasukan = intval($totalPemasukan);
    $totalPengeluaran = intval($totalPengeluaran);

    return response()->json([ 
        'totalPemasukan' => $totalPemasukan,
        'totalPengeluaran' => $totalPengeluaran,
        'selisih' => $selisih,
        'startDate' => $startDate,
        'endDate' => $endDate,
    ]);
}

}
