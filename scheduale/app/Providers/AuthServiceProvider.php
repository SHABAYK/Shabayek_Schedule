<?php

namespace App\Providers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Config;


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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

       GateContract::define('isAdmin', function ($user){
            return $user->type == 'admin';
        });

        GateContract::define('isManager', function ($user){
            return $user->type == 'manager';
        });

        GateContract::define('isStudent',function ($user){
            return $user->type == 'student';
        });
        GateContract::define('isAcademic',function ($user){
            return $user->type == 'academic';
        });
        GateContract::define('isDoctor',function ($user){
            return $user->type == 'doctor';
        });

    }
}
