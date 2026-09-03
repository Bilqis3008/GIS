<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Contracts\View\View;

class PublicationController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.publikasi', [
            'publications' => Publication::published()->with('media')->get(),
        ]);
    }
}
