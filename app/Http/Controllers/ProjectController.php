<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use App\Http\Requests\ProjectRequest;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use Gate;

class ProjectController extends Controller
{
    public function index(Project $project, User $user) 
    {
        return view('projects/index')->with(['projects' => \Auth::user()->authorized_projects,
                                            'user' => $user]);
    }
    
    public function show(Project $project) 
    {
        return view('projects/show')->with(['project' => $project]);
    }
    
    public function create()
    {
        return view('projects/create-project');
    }
    
    public function store(Request $request, Project $project)
    {
        /*
        Main process | saving
        */
        $input = $request['project'];
        $project->fill($input)->save();
        
        /*
        Authorization using the intermediate table (project_user)
        */
        $ls_intermediate = ["project_id" => $project->id, 
                            "user_id" => \Auth::user()->id];
        $project_user = ProjectUser::create($ls_intermediate);
        //$project_user->fill($ls_intermediate)->save();
        
        return redirect('index');
    }
    
    public function destroy(Project $project)
    {
        //
    }
}
