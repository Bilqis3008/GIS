<?php

declare(strict_types=1);

namespace App\Enums;

enum TeamGroup: string
{
    case Pembina = 'pembina';
    case Pengawas = 'pengawas';
    case Pakar = 'pakar';
    case Pengurus = 'pengurus';
    case Anggota = 'anggota';

    public function label(): string
    {
        return match ($this) {
            self::Pembina => 'Dewan Pembina',
            self::Pengawas => 'Dewan Pengawas',
            self::Pakar => 'Dewan Pakar',
            self::Pengurus => 'Pengurus',
            self::Anggota => 'Anggota',
        };
    }

    /** @return array<string, string> */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($c) => [$c->value => $c->label()])->all();
    }
}
