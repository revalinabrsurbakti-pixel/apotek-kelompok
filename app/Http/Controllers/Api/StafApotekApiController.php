<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StafApotek;
use Illuminate\Http\Request;

class StafApotekApiController extends Controller
{
    // Menampilkan semua data staf apotek
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil ditampilkan',
            'data' => StafApotek::all()
        ], 200);
    }

    // Menambahkan data staf apotek
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20'
        ]);

        $staf = StafApotek::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil ditambahkan',
            'data' => $staf
        ], 201);
    }

    // Menampilkan data staf berdasarkan ID
    public function show(string $id)
    {
        $staf = StafApotek::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf apotek tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil ditemukan',
            'data' => $staf
        ], 200);
    }

    // Memperbarui data staf apotek
    public function update(Request $request, string $id)
    {
        $staf = StafApotek::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf apotek tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'tanggal_lahir' => 'sometimes|required|date',
            'tempat_lahir' => 'sometimes|required|string|max:255',
            'no_hp' => 'sometimes|required|string|max:20'
        ]);

        $staf->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil diperbarui',
            'data' => $staf->fresh()
        ], 200);
    }

    // Menghapus data staf apotek
    public function destroy(string $id)
    {
        $staf = StafApotek::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf apotek tidak ditemukan'
            ], 404);
        }

        $staf->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil dihapus'
        ], 200);
    }
}
