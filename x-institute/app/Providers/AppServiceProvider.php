<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Register policies here if needed
    ];

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
        $this->registerPolicies();

        // If you had role logic, handle it with a 'role' column manually.
        // For example, remove the Gate::before block entirely:
        //
        // Gate::before(function ($user, $ability) {
        //     if ($user->role === 'Admin') {
        //         return true;
        //     }
        // });
    }
}
