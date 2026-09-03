<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Contracts\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.program-index', [
            'programs' => Program::published()->with('media')->get(),
        ]);
    }

    public function show(Program $program): View
    {
        abort_unless($program->is_published, 404);

        return view('frontend.pages.program-show', [
            'program' => $program,
            'others' => Program::published()->with('media')->whereKeyNot($program->id)->take(3)->get(),
        ]);
    }
}
