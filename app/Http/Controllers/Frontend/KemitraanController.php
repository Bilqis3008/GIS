<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Contracts\View\View;

class KemitraanController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.kemitraan', [
            'partners' => Partner::with('media')->orderBy('order')->get()->groupBy(fn ($p) => $p->category->value),
        ]);
    }
}
