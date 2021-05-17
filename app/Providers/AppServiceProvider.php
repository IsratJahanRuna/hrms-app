<?php

namespace App\Providers;

use App\Models\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        $applicationCount = Application::where('status','Pending')->count();
        view()->share('application_count',$applicationCount);
    }
}
