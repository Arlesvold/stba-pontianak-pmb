<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas'; // pakai tabel beritas

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal',
        'gambar',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
