<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Models\ProjectUser;
use App\Models\User;
use Gate;

class UserController extends Controller
{
    public function show_authorization()
    {
        Gate::authorize('higherThanManager');
        $user = \Auth::user();
        return view('projects/authorize')
            ->with(['projects' => $user->authorized_projects,
                    'users' => $user->authorized_users]);
    }
    
    public function authorize_projects(Request $request)
    {
        Gate::authorize('higherThanManager');
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
}
