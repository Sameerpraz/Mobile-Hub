<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        view()->composer('*', function ($view) {
//            $view->with('main_menu', \App\Menu::main());
            $view->with('main_menu', \App\Menu::main());
            $view->with('footer_link', \App\Menu::footer_link());
            $view->with('socials', \App\Social::all());
        });
        Schema::defaultStringLength(191);
    }
}
