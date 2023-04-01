<?php

namespace App\Providers;

use App\View\Composers\CartComposer;
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Using class based composers...
        View::composer('navbar', CartComposer::class);
        View::composer('category-menu', MenuComposer::class);

        // Using closure based composers...
        // Facades\View::composer('welcome', function (View $view) {
        //     // ...
        // });

        // Facades\View::composer('dashboard', function (View $view) {
        //     // ...
        // });
    }
}
