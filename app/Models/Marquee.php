<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    protected $fillable = [
        'text',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive(): ?self
    {
        return static::where('is_active', true)->first();
    }
}
