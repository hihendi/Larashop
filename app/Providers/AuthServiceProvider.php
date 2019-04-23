<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-access', function($user){
            return count(array_intersect(["Admin"], json_decode($user->roles)));
        });

        Gate::define('staff-access', function($user){
            return count(array_intersect(["Admin", "Staff"], json_decode($user->roles)));
        });

    }
}
