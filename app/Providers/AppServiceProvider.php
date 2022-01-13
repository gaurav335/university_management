<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CollegeInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\SubjectInterface;
use App\Interfaces\MeritRoundInterface;
use App\Interfaces\CollegeCourseInterface;
use App\Interfaces\CollegeMeritInterface;
use App\Interfaces\StudentInterface;


use App\Repositories\CollegeRepository;
use App\Repositories\CourseRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\MeritRoundRepository;
use App\Repositories\CollegeCourseRepository;
use App\Repositories\CollegeMeritRepository;
use App\Repositories\StudentRepository;



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
        $this->app->bind(CollegeCourseInterface::class, CollegeCourseRepository::class);
        $this->app->bind(CollegeMeritInterface::class, CollegeMeritRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);

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
