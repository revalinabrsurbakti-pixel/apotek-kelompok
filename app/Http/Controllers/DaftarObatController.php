<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarObat;

class DaftarObatController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kedaluwarsa' => 'required|date',
        ]);

        DaftarObat::create($request->only([
            'nama_obat',
            'stock_obat',
            'tanggal_kedaluwarsa'
        ]));

        return redirect('/pelanggan')
            ->with('success', 'Data obat berhasil disimpan.');
    }
}
