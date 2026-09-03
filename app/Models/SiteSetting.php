<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $primaryKey = 'key';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = ['key', 'value'];

    private const CACHE_KEY = 'site_settings';

    /** @return \Illuminate\Support\Collection<string, string|null> all settings, cached */
    public static function values(): \Illuminate\Support\Collection
    {
        // Cache a plain array (objects deserialize to __PHP_Incomplete_Class in some cache stores).
        return collect(Cache::rememberForever(self::CACHE_KEY, fn () => static::query()->pluck('value', 'key')->all()));
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        return static::values()->get($key) ?? $default;
    }

    public static function set(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget(self::CACHE_KEY);
    }

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }
}
