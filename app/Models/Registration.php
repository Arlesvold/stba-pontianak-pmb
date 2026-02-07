<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_hp',
        'alamat',
        'program_studi',
        'sistem_kuliah',
        'sekolah_asal',
        'jurusan_sekolah',
        'tahun_lulus',
        'ijazah_path',
        'foto_path',
        'step',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
