<?php

namespace App\Providers;

use App\Models\Application;
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
        $applicationCount = Application::where('status','Pending')->count();
        view()->share('application_count',$applicationCount);
    }
}
