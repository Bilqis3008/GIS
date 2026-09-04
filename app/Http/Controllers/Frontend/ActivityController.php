<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Enums\ActivityType;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request): View
    {
        $query = Activity::published()->with('media');
        $typeParam = $request->query('type');

        if ($typeParam) {
            if ($typeParam === 'artikel') {
                // Show both Artikel & Opini when type=artikel
                $query->whereIn('type', [ActivityType::Artikel, ActivityType::Opini]);
            } elseif ($typeParam === 'berita') {
                $query->where('type', ActivityType::Berita);
            } elseif ($typeParam === 'opini') {
                $query->where('type', ActivityType::Opini);
            } else {
                $query->where('type', $typeParam);
            }
        }

        $activities = $query->paginate(9)->withQueryString();

        return view('frontend.pages.berita-index', [
            'activities' => $activities,
            'currentType' => $typeParam,
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

    public function galeri(): View
    {
        $activities = Activity::published()->with('media')->get();

        return view('frontend.pages.galeri', [
            'activities' => $activities,
        ]);
    }
}
