<?php

namespace App\Providers;

use Laravel\Passport\Passport;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
    //public function boot()
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        Passport::routes();

        $gate->define('isAuthor', function($user) { // roles
            return ($user->user_type == 'author') || 
                ($user->user_type == 'admin');
        });
    }
}
