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
        return view('target_barang.index', compact('targetBarangs'));
    }

    // Menampilkan form untuk menambah target barang
    public function create()
    {
        return view('target_barang.create');
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

        // Logika untuk menambahkan pemasukan ke target barang
        // ...

        return redirect()->route('target_barang.show', $id)->with('success', 'Pemasukan berhasil ditambahkan!');
    }
}
