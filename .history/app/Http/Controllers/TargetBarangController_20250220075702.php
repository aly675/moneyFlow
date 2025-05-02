<?php

namespace App\Http\Controllers;

use App\Models\TargetBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TargetBarangController extends Controller
{
    // Menampilkan semua target barang
    public function index()
    {
        $targetBarangs = TargetBarang::where('id_user', Auth::id())->get();
        return view('target_barang.dashboard', compact('targetBarangs'));
    }

    // Menampilkan form untuk menambah target barang
    public function create()
    {
        return view('target_barang.ta');
    }

    // Menyimpan target barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
        ]);

        TargetBarang::create([
            'id_user' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        return redirect()->route('target_barang.index')->with('success', 'Target barang berhasil ditambahkan!');
    }

    // Menampilkan detail target barang
    public function show($id)
    {
        $targetBarang = TargetBarang::with('pemasukan')->findOrFail($id);
        return view('target_barang.show', compact('targetBarang'));
    }

    // Menambahkan pemasukan untuk target barang
    public function addPemasukan(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // Temukan target barang berdasarkan ID
        $targetBarang = TargetBarang::findOrFail($id);

        // Tambahkan pemasukan ke target barang
        $targetBarang->saldo_terkumpul += $request->nominal;
        $targetBarang->id_pemasukan = $request->id_pemasukan; // Jika Anda ingin menyimpan relasi ke tabel pemasukan
        $targetBarang->save();

        // Cek apakah saldo terkumpul sudah mencapai harga barang
        if ($targetBarang->saldo_terkumpul >= $targetBarang->harga_barang) {
            $targetBarang->status = 'Tercapai';
            $targetBarang->save();
        }

        return redirect()->route('target_barang.show', $id)->with('success', 'Pemasukan berhasil ditambahkan!');
    }
}
