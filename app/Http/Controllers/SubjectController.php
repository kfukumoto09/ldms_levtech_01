<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function show(Subject $subject) 
    {
        // $subject = new Subject;
        $lab_note = $subject->lab_note();
        return view('subjects/show')->with(['subject' => $subject, 
                                            'lab_note' => $lab_note]);
    }
}
