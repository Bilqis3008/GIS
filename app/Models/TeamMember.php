<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TeamGroup;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TeamMember extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'position', 'group', 'bio', 'order'];

    protected $casts = ['group' => TeamGroup::class];

    protected static function booted(): void
    {
        static::saving(function (TeamMember $member) {
            $pos = strtolower($member->position ?? '');
            if (str_contains($pos, 'pembina') || str_contains($pos, 'inisiator')) {
                $member->group = TeamGroup::Pembina;
            } elseif (str_contains($pos, 'pengawas')) {
                $member->group = TeamGroup::Pengawas;
            } elseif (str_contains($pos, 'pakar')) {
                $member->group = TeamGroup::Pakar;
            } else {
                $member->group = TeamGroup::Pengurus;
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile()->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit(Fit::Crop, 500, 500)->format('webp')->nonQueued();
    }
}
