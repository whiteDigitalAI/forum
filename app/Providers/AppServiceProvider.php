<?php

namespace App\Providers;

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
        \View::share('channels', \App\Channel::all());
        
//         \View::composer( '*'. function($view){
//             $view->with('channels', \App\Channel::all());
        
//        \View::composer('*', function ($view) {
//            $channels = \Cache::rememberForever('channels', function () {
//                return Channel::all();
//            });
//            $view->with('channels', $channels);
//        });
             
             
         
    }
}
