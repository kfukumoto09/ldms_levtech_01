<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabNote;
use App\Models\Subject;

class SearchController extends Controller
{

    /**
     * Show the form for searching.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return view('search.search')->with(['input' => $request]);
    }

    /**
     * Show the search results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $input = $request['search'];
        // $lab_notes = LabNote::with('subject.project')->get();
        $results = (new Subject)->search($input);
        return view('search.results', compact('results', 'input'));
    }
}
