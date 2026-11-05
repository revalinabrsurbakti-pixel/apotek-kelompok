<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use Illuminate\Http\Request;

class DaftarObatApiController extends Controller
{
    // Menampilkan semua data obat
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil ditampilkan',
            'data' => DaftarObat::all()
        ], 200);
    }

    // Menambahkan data obat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kedaluwarsa' => 'required|date'
        ]);

        $obat = DaftarObat::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil ditambahkan',
            'data' => $obat
        ], 201);
    }

    // Menampilkan data obat berdasarkan ID
    public function show(string $id)
    {
        $obat = DaftarObat::find($id);

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil ditemukan',
            'data' => $obat
        ], 200);
    }

    // Memperbarui data obat
    public function update(Request $request, string $id)
    {
        $obat = DaftarObat::find($id);

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama_obat' => 'sometimes|required|string|max:255',
            'stock_obat' => 'sometimes|required|integer|min:0',
            'tanggal_kedaluwarsa' => 'sometimes|required|date'
        ]);

        $obat->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil diperbarui',
            'data' => $obat->fresh()
        ], 200);
    }

    // Menghapus data obat
    public function destroy(string $id)
    {
        $obat = DaftarObat::find($id);

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan'
            ], 404);
        }

        $obat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil dihapus'
        ], 200);
    }
}
