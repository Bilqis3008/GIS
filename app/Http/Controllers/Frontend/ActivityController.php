<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Contracts\View\View;

class ActivityController extends Controller
{
    public function index(\Illuminate\Http\Request $request): View
    {
        $query = Activity::published()->with('media');

        if ($request->has('type')) {
            $query->where('type', $request->query('type'));
        }

        return view('frontend.pages.berita-index', [
            'activities' => $query->paginate(9)->withQueryString(),
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
