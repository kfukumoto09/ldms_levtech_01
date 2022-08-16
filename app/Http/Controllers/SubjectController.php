<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function show(Subject $subject) 
    {
        $user = Auth::user();
        $projects_all = Project::with(['users', 'subjects', 'subjects.lab_notes'])
                            ->whereHas('users', function ($query) use ($user) {
                                $query->where('id', $user->id);  // get authorized projects
                            })->get();
        $project = $subject->project;
        $lab_note = $subject->lab_note();
        return view('subjects/show', compact('projects_all', 'project', 'subject', 'lab_note'));
    }
}
