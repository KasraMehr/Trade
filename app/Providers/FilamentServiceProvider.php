<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;


class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
      Filament::serving(function () {
              if (auth()->check() && auth()->user()->role !== 'admin') {
                  abort(403); // یا redirect به مسیر دلخواه
              }
          });
    }
}
