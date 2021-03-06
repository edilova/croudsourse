<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\CoreExtensions\SessionGuardExtended as SessionGuardExtended;
use Illuminate\Support\Facades\Auth;

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
        /*Auth::extend('sessionextended',function($app,$name, array $config){
            return new SessionGuardExtended('sessionextended',Auth::createUserProvider($config['provider']),$app->make('session.store'),$app->make('request'));
        });*/
    }
}
