<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Get a setting value with priority: Database -> env() -> default.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        $value = Cache::remember("setting.{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->value('value');
        });

        if ($value !== null && $value !== '') {
            return $value;
        }

        $envValue = env($key);

        return $envValue !== null ? (string) $envValue : $default;
    }

    /**
     * Set a setting value with database transaction.
     */
    public static function set(string $key, ?string $value): void
    {
        try {
            DB::transaction(function () use ($key, $value) {
                static::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value],
                );
            });

            Cache::forget("setting.{$key}");
        } catch (\Exception $e) {
            Log::error("Failed to set setting [{$key}]: " . $e->getMessage());
            throw $e;
        }
    }
}
