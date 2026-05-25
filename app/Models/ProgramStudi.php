<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'jenjang',
        'deskripsi',
        'visi',
        'misi',
        'tujuan',
        'peminatan',
        'kurikulum',
        'kurikulum_pdf_url',
        'karir_deskripsi',
        'karir_list',
    ];

    protected $casts = [
        'misi'      => 'array',
        'tujuan'    => 'array',
        'peminatan' => 'array',
        'karir_list'=> 'array',
    ];
}
