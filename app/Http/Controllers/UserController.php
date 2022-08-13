<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Models\ProjectUser;
use App\Models\User;
use App\Models\Project;
use App\Models\UserCategory;
use Gate;

class UserController extends Controller
{
    /*
     * View for authorizing projects to a user
     */
    public function authorize_projects()
    {
        Gate::authorize('higherThanManager');
        $user = \Auth::user();
        return view('users/authorize-projects')
            ->with(['projects' => $user->authorized_projects,
                    'users' => $user->authorizing_users]);
    }
    
    /*
     * Update authorization of projects to a user
     */
    public function update_authorization(Request $request)
    {
        Gate::authorize('higherThanManager');
        foreach ( $request->project_ids as $project_id ) {
            ProjectUser::create(["project_id" => (int) $project_id, 
                                "user_id" => (int) $request->updated_user_id,
                                "authorized_by" => \Auth::user()->id]);
        }
        return redirect('projects/index');
    }
    
    // public function create()
    // {
    //     $this->authorize('');
    //     return view('projects/authorize')
    //         ->with(['projects' => $user->authorized_projects,
    //                 'users' => $user->authorized_users]);
    // }
    
    // public function store(Request $request)
    // {
    //     Gate::authorize('isAdministrator');
    //     foreach ( $request->project_ids as $project_id ) {
    //         ProjectUser::create(["project_id" => (int) $project_id, 
    //                             "user_id" => (int) $request->updated_user_id,
    //                             "authorized_by" => \Auth::user()->id]);
    //     }
    //     return redirect('index');
    // }
    
    public function console()
    {
        Gate::authorize('isAdministrator');
        $me = \Auth::user();
        $user = new User;
        return view('projects/console')
            ->with(['projects' => $me->authorized_projects,
                    'user' => $user]);
    }
    
    public function edit_manager()
    {
        Gate::authorize('isAdministrator');
        $project = new Project;
        $user = new User;
        return view('projects/authorize')
            ->with(['projects' => $project->get(),
                    'users' => $user->get_managers()]);
    }
    
    public function update_manager(Request $request)
    {
        Gate::authorize('isAdministrator');
        foreach ( $request->project_ids as $project_id ) {
            ProjectUser::create(["project_id" => (int) $project_id, 
                                "user_id" => (int) $request->updated_user_id,
                                "authorized_by" => \Auth::user()->id]);
        }
        return redirect('index');
    }
    
    public function mypage() 
    {
        Gate::authorize('isManager');
        return view('projects/mypage');
    }
    
    public function show(User $user) 
    {
        return view('users/show')->with(['user' => $user]);
    }
    
    
    public function test()  // you can arrange this function when you debug
    {
        $user = User::all();
        return view('projects.console')->with(['user'=>new User]);
    }
}
