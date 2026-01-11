<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;

    protected $table = 'stafs';

    protected $fillable = [
        'nama',
        'foto',
        'posisi',
        'display_order',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];
}
