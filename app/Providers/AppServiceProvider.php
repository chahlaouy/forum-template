<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Models\Channel;
use Illuminate\Support\Facades\View;

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
        /** Share the channels varieble across all the view this will make a query for each view loaded */
        // \View::share('channels', Channel::all());

        /** Or if You want to share Just with one or two views etc .. */
        View::composer(['layouts.partials.main-navigation', 'layouts.partials.nav-guest', 'users.author.dashboard', 'threads.create'], function($view){
            $view->with('channels', \App\Models\Channel::all());
        });
        /*** Share for all views */
        // \View::composer(['*', 'threads.store'], function($view){
        //     $view->with('channels', \App\Models\Channel::all());
        // });
    }
}
