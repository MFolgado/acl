<?php

namespace App\Providers;

use App\Permission;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
//        \App\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update-post', function(User $user, Post $post){
//            return $user->id == $post->user_id;
//        });

        $permissions = Permission::with('roles')->get();

        foreach($permissions as $permission){
            Gate::define($permission->name, function(User $user) use($permission){
                return $user->hasPermission($permission);
            });
        }

        Gate::before(function(User $user, $ability){

            if ($user->hasAnyRoles('root')){
                return true;
            }
        });

    }
}
