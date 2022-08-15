<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function show(Subject $subject) 
    {
        $projects_all = Project::with('subjects', 'subjects.lab_notes')->get();
        $project = $subject->project;
        $lab_note = $subject->lab_note();
        return view('subjects/show', compact('projects_all', 'project', 'subject', 'lab_note'));
    }
}
