<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::tokensCan([
            'student' => 'Student access',
            'instructor' => 'Instructor access',
            'client' => 'Client access',
            'admin' => 'Admin access',
        ]);

        Passport::setDefaultScope([
            'student'
        ]);
    }
}
