<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TeamMember;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function tentang(): View
    {
        return view('frontend.pages.tentang', [
            'pages' => Page::all()->keyBy('key'),
            'team' => TeamMember::with('media')->orderBy('order')->get()->groupBy(fn ($m) => $m->group->value),
        ]);
    }

    public function struktur(): View
    {
        return view('frontend.pages.struktur', [
            'team' => TeamMember::with('media')->orderBy('order')->get()->groupBy(fn ($m) => $m->group->value),
        ]);
    }

    public function aksi(): View
    {
        return view('frontend.pages.aksi');
    }

    public function aksiDetail(string $slug): View
    {
        $program = \App\Models\Program::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('frontend.pages.aksi-detail', [
            'program' => $program,
        ]);
    }

    public function terkini(): View
    {
        return view('frontend.pages.terkini');
    }

    public function even(): View
    {
        return view('frontend.pages.even');
    }
}
