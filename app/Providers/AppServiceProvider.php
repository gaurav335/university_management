<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CollegeInterface;
use App\Repositories\CollegeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CollegeInterface::class, CollegeRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
