<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;  // for Gate Responce
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Project;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        /*
        All authorities for administrators
        */
        Gate::before(function ($user, $ability) {
            if ($user->category->id == 3) {
                return true;
            }
        });

        /*
        User categoryに応じた処理分け
        */
        Gate::define('isPlayer', function(User $user){
           return $user->category->id == 1; // player
        });
        Gate::define('isManager',function(User $user){
           return $user->category->id == 2; // manager
        });
        Gate::define('isAdministrator',function(User $user){
           return $user->category->id == 3; // administrator
        });
        Gate::define('higherThanManager',function(User $user){
           return $user->category->id > 1; // more than manager
        });
        
        /*
        relationship between projects and users
        */
        Gate::define('isAuthorizedFor',function(User $user, Project $project){
           return in_array($project, $user->authorized_projects) // project_user_tableを介してuserにそのprojectを見る権限が与えられていればtrue
                        ? Response::allow()
                        : Response::deny('You do not own this post.');
        });
    }
}
