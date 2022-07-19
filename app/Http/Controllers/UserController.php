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
    public function edit_player()
    {
        Gate::authorize('higherThanManager');
        $user = \Auth::user();
        return view('projects/authorize')
            ->with(['projects' => $user->authorized_projects,
                    'users' => $user->authorized_users]);
    }
    
    public function update_player(Request $request)
    {
        Gate::authorize('higherThanManager');
        foreach ( $request->project_ids as $project_id ) {
            ProjectUser::create(["project_id" => (int) $project_id, 
                                "user_id" => (int) $request->updated_user_id,
                                "authorized_by" => \Auth::user()->id]);
        }
        return redirect('index');
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
                    'users' => $user->get()]);
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
    
    public function test()  // you can arrange this function when you debug
    {
        
        dd((new User)->get()->first());
        dd(UserCategory::where('name', 'player')->first()->id);
        $user = User::all();
        dd($user);
    }
}
