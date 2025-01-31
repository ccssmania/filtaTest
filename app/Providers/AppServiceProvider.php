<?php

namespace App\Providers;

use App\Models\MenuLink;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.guest', function (View $view) {
            $menuLinks = MenuLink::with('children')->rootLinks()->orderBy('order', 'asc')->get();
            $view->with('menuLinks', $menuLinks);
        });
    }
}
