<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pemasukan;
use App\Models\TargetBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PemasukanPengeluaranController extends Controller
{
    /**
     * Save income data to the Pemasukan table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function simpanPemasukan(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'tanggal' => 'required|date',
                'kategori' => 'required|string',
                'title' => 'required|string',
                'jumlah' => 'required|numeric',
                'deskripsi' => 'nullable|string',
                'alokasi_target_barang' => 'boolean',
                'nominal_alokasi_target_barang' => 'nullable|numeric'
            ]);

                    // Save the income data to the Pemasukan table
            $pemasukan = new Pemasukan();
            $pemasukan->id_user = Auth::id(); // Get the authenticated user's ID
            $pemasukan->tanggal = $request->tanggal;
            $pemasukan->kategori = $request->kategori;
            $pemasukan->title = $request->title;
            $pemasukan->jumlah = $request->jumlah;
            $pemasukan->deskripsi = $request->catatan;
            $pemasukan->save(); // Pastikan ini berhasil

            // Check if the ID is set after saving
            if ($pemasukan->id) {
                // If the income is allocated to a target barang
                if ($request->alokasi_target_barang && $request->nominal_alokasi_target_barang) {
                    // Find the active target barang for the user
                    $targetBarang = TargetBarang::where('id_user', Auth::id())
                        ->where('status', 'Dalam Proses')
                        ->first();

                    if ($targetBarang) {
                        // Add the allocated amount to the target barang's saldo_terkumpul
                        $targetBarang->saldo_terkumpul += $request->nominal_alokasi_target_barang;
                        $targetBarang->id_pemasukan = $pemasukan->id; // Save the relationship
                        $targetBarang->save();

                        // If the saldo_terkumpul reaches the harga_barang, update the status
                        if ($targetBarang->saldo_terkumpul >= $targetBarang->harga_barang) {
                            $targetBarang->status = 'Tercapai';
                            $targetBarang->save();
                        }
                    }
                }
            }
            // Return a success response
            return response()->json([
                'success' => true,
                'message' => 'Pemasukan berhasil disimpan!'
            ])->route;

        } catch (\Exception $e) {
            // Log the error
            Log::error('Error saving pemasukan: ' . $e->getMessage());

            // Return an error response
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan pemasukan.'
            ], 500);
        }
    }
}
