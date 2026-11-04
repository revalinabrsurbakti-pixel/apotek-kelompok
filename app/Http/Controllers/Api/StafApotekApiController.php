<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StafApotek;

class StafApotekApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => StafApotek::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'no_hp' => 'required|string'
        ]);

        $staf = StafApotek::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil ditambahkan',
            'data' => $staf
        ], 201);
    }

    public function show(string $id)
    {
        $staf = StafApotek::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $staf
        ]);
    }

    public function update(Request $request, string $id)
    {
        $staf = StafApotek::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'sometimes|required|string',
            'alamat' => 'sometimes|required|string',
            'tanggal_lahir' => 'sometimes|required|date',
            'tempat_lahir' => 'sometimes|required|string',
            'no_hp' => 'sometimes|required|string'
        ]);

        $staf->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil diperbarui',
            'data' => $staf
        ]);
    }

    public function destroy(string $id)
    {
        $staf = StafApotek::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf tidak ditemukan'
            ], 404);
        }

        $staf->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data staf apotek berhasil dihapus'
        ]);
    }
}
