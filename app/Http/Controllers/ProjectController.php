<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Project $project) 
    {
        return view('projects/index')->with(['projects' => $project->get()]);
    }
    
    public function home(Project $project) 
    {
        return view('projects/project')->with(['project' => $project]);
    }
}
