<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontaks';

    protected $fillable = [
        'nama',
        'tugas',
        'nomor_hp',
        'email',
        'hari_layanan',
        'jam_layanan',
        'icon',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
