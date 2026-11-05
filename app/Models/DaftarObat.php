<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarObat extends Model
{
    protected $table = 'daftar_obats';

    protected $fillable = [
        'nama_obat',
        'stock_obat',
        'tanggal_kedaluwarsa',
    ];
}
