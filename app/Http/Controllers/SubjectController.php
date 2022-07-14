<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function home(Subject $subject) 
    {
        // $subject = new Subject;
        return view('projects/subject')->with(['subject' => $subject]);
    }
}
