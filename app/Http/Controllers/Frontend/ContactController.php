<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\ContactSubmission;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.kontak', [
            'site' => SiteSetting::values(),
        ]);
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        // Honeypot terisi → diam-diam abaikan, balas seolah sukses.
        if (! $request->isSpam()) {
            ContactSubmission::create($request->validated());
        }

        return back()->with('contact_success', 'Terima kasih, pesan Anda sudah kami terima. Tim GIS akan menghubungi Anda.');
    }
}
