<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use App\Http\Requests\ProjectRequest;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Subject;
use Gate;

class ProjectController extends Controller
{
    public function index(Project $project) 
    {
        $projects_all = $project->getAuthorizedProjects();
        $subject = new Subject;
        $lab_note = $subject->lab_note();
        return view('projects/index', compact('projects_all', 'project', 'subject', 'lab_note'));
    }
    
    public function show(Project $project) 
    {
        $user = Auth::user();
        $projects_all = Project::with(['users', 'subjects', 'subjects.lab_notes'])
                            ->whereHas('users', function ($query) use ($user) {
                                $query->where('id', $user->id);  // get authorized projects
                            })->get();
        $subjects = $project->subjects;
        $subject = new Subject;
        $lab_note = $subject->lab_note();
        return view('projects/show', compact('projects_all', 'project', 'subjects', 'subject', 'lab_note'));
    }
    
    public function create()
    {
        return view('create/project');
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
        
        return redirect('projects/'. $project->id);
    }
    
    public function destroy(Project $project)
    {
        //
    }
}
