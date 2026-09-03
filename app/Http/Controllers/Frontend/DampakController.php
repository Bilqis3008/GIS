<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImpactStat;
use Illuminate\Contracts\View\View;

class DampakController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.dampak', [
            'realizedStats' => ImpactStat::realized()->get(),
            'plannedStats' => ImpactStat::planned()->get(),
        ]);
    }
}
