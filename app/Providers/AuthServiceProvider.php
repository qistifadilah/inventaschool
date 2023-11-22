<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function ($user) {
            return $user->id_role == '3';
        });

        /* define a manager user role */
        Gate::define('isPetugas', function ($user) {
            return $user->id_role == '2';
        });

        /* define a user role */
        Gate::define('isUser', function ($user) {
            return $user->id_role == '1';
        });
    }
}
