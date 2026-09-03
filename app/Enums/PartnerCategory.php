<?php

declare(strict_types=1);

namespace App\Enums;

enum PartnerCategory: string
{
    case Pemerintah = 'pemerintah';
    case Usaha = 'usaha';
    case Kampus = 'kampus';
    case Komunitas = 'komunitas';

    public function label(): string
    {
        return match ($this) {
            self::Pemerintah => 'Pemerintah',
            self::Usaha => 'Dunia Usaha',
            self::Kampus => 'Kampus',
            self::Komunitas => 'Komunitas',
        };
    }

    /** @return array<string, string> */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($c) => [$c->value => $c->label()])->all();
    }
}
