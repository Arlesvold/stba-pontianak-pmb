<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas'; // sesuaikan dengan nama tabel

    protected $fillable = [
        'judul',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];
}
