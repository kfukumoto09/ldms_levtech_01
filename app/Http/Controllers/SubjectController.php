<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function show(Subject $subject) 
    {
        // $subject = new Subject;
        return view('subjects/show')->with(['subject' => $subject]);
    }
}
