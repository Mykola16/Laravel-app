<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use App\Models\Category;
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

        $categories = Category::orderBy('id')->get();
        View::share([
            'categories' => $categories,
        ]);

//        if (!$this->app->runningInConsole() && Schema::hasTable('categories')) {
//            $categories = Category::orderBy('id')->get();
//
//
//            if ($categories->isNotEmpty()) {
//                View::share('categories', $categories);
//            }
//        }


    }
}
