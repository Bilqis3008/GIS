<?php

declare(strict_types=1);

namespace App\Enums;

enum ActivityType: string
{
    case Berita = 'berita';
    case Artikel = 'artikel';
    case Kegiatan = 'kegiatan';

    public function label(): string
    {
        return match ($this) {
            self::Berita => 'Berita',
            self::Artikel => 'Artikel',
            self::Kegiatan => 'Kegiatan',
        };
    }

    /** @return array<string, string> value => label, for Filament selects */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($c) => [$c->value => $c->label()])->all();
    }
}
