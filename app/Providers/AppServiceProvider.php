<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Inject cached site settings into the public layout + page views (keeps queries out of Blade, §11).
        View::composer(['components.layout', 'frontend.pages.*'], function ($view) {
            $view->with('site', SiteSetting::values());
        });
    }
}
