<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\ContactSubmission;
use App\Models\Program;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pesan belum dibaca', ContactSubmission::where('is_read', false)->count())
                ->description('Total pesan: '.ContactSubmission::count())
                ->color('warning'),
            Stat::make('Program tayang', Program::where('is_published', true)->count()),
            Stat::make('Berita/kegiatan tayang', Activity::where('is_published', true)->count()),
        ];
    }
}
