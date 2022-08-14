<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Models\ProjectUser;
use App\Models\User;
use App\Models\Project;
use App\Models\Subject;
use App\Models\UserCategory;
use Gate;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function console()
    {
        Gate::authorize('isAdministrator');
        $me = \Auth::user();
        $user = new User;
        $administrators = $user->administrators();
        $managers = $user->managers();
        $players = $user->players();
        $projects = Project::all();
        $subjects = Subject::all();
        return view('projects/console', compact('administrators', 'managers', 'players', 'projects', 'subjects'));
    }
    
    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        Gate::authorize('isAdministrator');
        $category = $user->category;
        $projects = $user->projects();
        $authorizing_user = $user->authorized_by;
        return view('users/show', compact('user', 'category', 'projects', 'authorizing_user'));
    }
    
    
    public function test()  // you can arrange this function when you debug
    {
        $user = User::all();
        return view('projects.console')->with(['user'=>new User]);
    }
}
