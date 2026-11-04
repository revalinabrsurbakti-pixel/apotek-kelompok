<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\StafApotek;
use App\Models\DaftarObat;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        Pelanggan::create($request->only([
            'nama',
            'alamat',
            'no_hp'
        ]));

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil disimpan.');
    }
}
