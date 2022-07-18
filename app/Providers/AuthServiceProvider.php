<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;  // for Gate Responce
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\UserCategory;
use App\Models\Project;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        /**
         * function to get user_category_id from the category name (e.g. player, manager or administrator)
         */
        function get_category_id($key) {
            $categories = new UserCategory;
            return $categories->where('name', $key)->first()->id;
        }
        
        /*
        All authorities for administrators
        */
        Gate::before(function ($user, $ability) {
            if ($user->category->id == get_category_id('administrator')) {
                return true;
            }
        });

        /*
        User categoryに応じた処理分け
        */
        Gate::define('isPlayer', function(User $user){
            return $user->category->id == get_category_id('player'); // player
        });
        Gate::define('isManager',function(User $user){
            return $user->category->id == get_category_id('manager'); // manager
        });
        Gate::define('isAdministrator',function(User $user){
            return $user->category->id == get_category_id('administrator'); // administrator
        });
        Gate::define('higherThanManager',function(User $user){
            return $user->category->id >= get_category_id('manager');; // higher than manager
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
