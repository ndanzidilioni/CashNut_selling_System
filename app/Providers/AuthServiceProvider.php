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

        Gate::define('isPeasant', function($user){            
            foreach($user->roles as $role)
            {                
            }
            return $role->id == 1;
        });
       
        Gate::define('isBuyer', function($user){            
            foreach($user->roles as $role)
            {                
            }
            return $role->id == 2;
        });
        
        Gate::define('isClerk', function($user){            
            foreach($user->roles as $role)
            {                
            }
            return $role->id == 3;
        });
        
        Gate::define('isOfficer', function($user){            
            foreach($user->roles as $role)
            {                
            }
            return $role->id == 4;
        });
        Gate::define('isSysAdmin', function($user){            
            foreach($user->roles as $role)
            {                
            }
            return $role->id == 5;
        });
        //
    }
}
 