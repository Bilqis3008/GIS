<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ImpactStat;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.home', [
            'programs' => Program::published()->with('media')->take(5)->get(),
            'realizedStats' => ImpactStat::realized()->get(),
            'plannedStats' => ImpactStat::planned()->get(),
            'partners' => Partner::with('media')->orderBy('order')->get()->groupBy(fn ($p) => $p->category->value),
            'activities' => Activity::published()->with('media')->take(3)->get(),
        ]);
    }
}
