<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Models\Channel;

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
        \View::composer(['layouts.navigation.main-navigation', 'layouts.navigation.nav-guest', 'admin.dashboard', 'admin.threads.create'], function($view){
            $view->with('channels', \App\Models\Channel::all());
        });
        /*** Share for all views */
        // \View::composer(['*', 'threads.store'], function($view){
        //     $view->with('channels', \App\Models\Channel::all());
        // });
    }
}
