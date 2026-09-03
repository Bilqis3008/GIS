<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PartnerCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Partner extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'category', 'url', 'order'];

    protected $casts = ['category' => PartnerCategory::class];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile()->useDisk('public');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('logo')->fit(Fit::Contain, 320, 160)->format('webp')->nonQueued();
    }
}
