<?php

declare(strict_types=1);

namespace App\Enums;

enum ContactSubject: string
{
    case Umum = 'umum';
    case KemitraanCsr = 'kemitraan_csr';
    case Pemerintah = 'pemerintah';
    case Kampus = 'kampus';
    case Relawan = 'relawan';

    public function label(): string
    {
        return match ($this) {
            self::Umum => 'Pertanyaan Umum',
            self::KemitraanCsr => 'Kemitraan CSR/ESG',
            self::Pemerintah => 'Kerja Sama Pemerintah',
            self::Kampus => 'Kolaborasi Kampus',
            self::Relawan => 'Relawan',
        };
    }

    /** @return array<string, string> */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($c) => [$c->value => $c->label()])->all();
    }
}
