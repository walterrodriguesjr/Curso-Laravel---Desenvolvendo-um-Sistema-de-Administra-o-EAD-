<?php

namespace App\Providers;

use App\Repositories\AdminRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\LessonRepository;
use App\Repositories\Eloquent\ModuleRepository;
use App\Repositories\ModuleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\LessonRepositoryInterface;
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
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class,
        );

        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class,
        );
        $this->app->singleton(
            ModuleRepositoryInterface::class,
            ModuleRepository::class,
        );
        $this->app->singleton(
            LessonRepositoryInterface::class,
            LessonRepository::class,
        );
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
