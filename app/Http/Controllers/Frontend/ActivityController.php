<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Contracts\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.berita-index', [
            'activities' => Activity::published()->with('media')->paginate(9),
        ]);
    }

    public function show(Activity $activity): View
    {
        abort_unless($activity->is_published, 404);

        return view('frontend.pages.berita-show', [
            'activity' => $activity,
            'gallery' => $activity->getMedia('gallery'),
            'latest' => Activity::published()->with('media')->whereKeyNot($activity->id)->take(3)->get(),
        ]);
    }
}
