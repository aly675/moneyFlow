<?php

namespace App\Http\Controllers;

use App\Models\TargetBarang;
use Illuminate\Http\Request;

class TargetBarangController extends Controller
{
    public function index()
    {
        $targetBarangs = TargetBarang::all();
        return view('target_barang.index', compact('targetBarangs'));
    }

    public function create()
    {
        return view('target_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
        ]);

        TargetBarang::create($request->all());
        return redirect()->route('target_barang.index')->with('success', 'Target Barang created successfully.');
    }

    public function edit(TargetBarang $targetBarang)
    {
        return view('target_barang.edit', compact('targetBarang'));
    }

    public function update(Request $request, TargetBarang $targetBarang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
        ]);

        $targetBarang->update($request->all());
        return redirect()->route('target_barang.index')->with('success', 'Target Barang updated successfully.');
    }

    public function destroy(TargetBarang $targetBarang)
    {
        $targetBarang->delete();
        return redirect()->route('target_barang.index')->with('success', 'Target Barang deleted successfully.');
    }
}
