<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CollegeInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\SubjectInterface;
use App\Interfaces\MeritRoundInterface;
use App\Repositories\CollegeRepository;
use App\Repositories\CourseRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\MeritRoundRepository;


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
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(SubjectInterface::class, SubjectRepository::class);
        $this->app->bind(MeritRoundInterface::class, MeritRoundRepository::class);

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
