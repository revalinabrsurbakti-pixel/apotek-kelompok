<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StafApotek;

class StafApotekController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        StafApotek::create($request->only([
            'nama',
            'alamat',
            'tanggal_lahir',
            'tempat_lahir',
            'no_hp'
        ]));

        return redirect('/pelanggan')
            ->with('success', 'Data staf apotek berhasil disimpan.');
    }
}
