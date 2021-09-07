<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Statice;

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
        $this->loadHelpers();
        $facebook = Statice::where('key','facebook')->first();
        $youtube = Statice::where('key','youtube')->first();
        $twitter = Statice::where('key','twitter')->first();
        $instagram = Statice::where('key','instagram')->first();
      
        View::share('facebook', $facebook->description);
        View::share('youtube', $youtube->description);
        View::share('twitter', $twitter->description);
        View::share('instagram', $instagram->description);
        
    }
  
    protected function loadHelpers()
    {
        foreach (glob(app_path('Helpers/*.php')) as $filename) {
            require_once $filename;
        }
    }
}
