<?php

declare(strict_types=1);

namespace App\Enums;

enum ImpactStatus: string
{
    case Realized = 'realized';
    case Planned = 'planned';

    /** Label tegas untuk editor non-teknis (CLAUDE.md §9). */
    public function label(): string
    {
        return match ($this) {
            self::Realized => 'Sudah Berjalan',
            self::Planned => 'Rencana',
        };
    }

    /** @return array<string, string> */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($c) => [$c->value => $c->label()])->all();
    }
}
