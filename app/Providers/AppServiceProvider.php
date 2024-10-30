<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\TaskObserver;
use App\Models\Task;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        ['App\Models\Task'=>'App/Observers/TaskObserver'];
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Task::observe(TaskObserver::class);
    }
}
