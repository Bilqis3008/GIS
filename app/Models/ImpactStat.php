<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ImpactStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ImpactStat extends Model
{
    protected $fillable = ['label', 'value', 'status', 'note', 'source_label', 'source_url', 'period', 'order'];

    protected $casts = ['status' => ImpactStatus::class];

    /** CLAUDE.md R1: hanya angka realized boleh tampil di band "Dampak". */
    public function scopeRealized(Builder $query): Builder
    {
        return $query->where('status', ImpactStatus::Realized->value)->orderBy('order');
    }

    public function scopePlanned(Builder $query): Builder
    {
        return $query->where('status', ImpactStatus::Planned->value)->orderBy('order');
    }
}
