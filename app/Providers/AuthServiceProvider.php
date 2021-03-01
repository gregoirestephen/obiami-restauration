<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Gate;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->profil->name == 'Administrateur';
        });

        Gate::define('isGestionnaire', function ($user) {
            return $user->profil->name == 'Gestionnaire';
        });

        Gate::define('isVisiteur', function ($user) {
            return $user->profil->name == 'Gestionnaire';
        });

        //
    }
}
