<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $globalCategories = [];

        if (Schema::hasTable('categories')) {
            $globalCategories = Category::where('status', 'hien')->get();
        }

        view()->share('globalCategories', $globalCategories);
    }
}
