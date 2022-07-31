<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabNote;
use App\Models\Subject;

class LabNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject, LabNote $lab_note)
    {
        $lab_note->subject_id = $subject->id;
        // dd ($lab_note->subject);
        return view('create.lab-note')->with(['lab_note' => $lab_note]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subject $subject, LabNote $lab_note)
    {
        $input = $request['lab_note'];
        $input += array('subject_id' => 1);
        $lab_note->fill($input)->save();
        // dd($lab_note);
        return redirect('/labnotes/' . $lab_note->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
