<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('category', Category::all());
        View::share('language', Language::all());
        Paginator::useBootstrap();
    }
}
