<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse ;
use App\Models\User;
use App\Models\Project;
use Gate;

class ProjectController extends Controller
{
    public function index(Project $project, User $user) 
    {
        return view('projects/index')->with(['projects' => \Auth::user()->authorized_projects,
                                            'user' => $user]);
    }
    
    public function home(Project $project) 
    {
        return view('projects/project')->with(['project' => $project]);
    }
    
    public function destroy(Project $project)
    {
        //
    }
}
