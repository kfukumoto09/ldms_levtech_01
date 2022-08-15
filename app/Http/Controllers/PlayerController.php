<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectUser;
use App\Models\User;
use Gate;

class PlayerController extends Controller
{
    /**
     * Show the form for authorizing new projects to a player user.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_authorization()
    {
        Gate::authorize('higherThanManager');
        $user = \Auth::user();
        return view('users/authorize-to-player')
            ->with(['projects' => $user->authorized_projects,
                    'users' => $user->authorizing_users]);
    }
    
    /**
     * Update the authorization of projects in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_authorization(Request $request)
    {
        Gate::authorize('higherThanManager');
        foreach ( $request->project_ids as $project_id ) {
            ProjectUser::create(["project_id" => (int) $project_id, 
                                "user_id" => (int) $request->updated_user_id,
                                "authorized_by" => \Auth::user()->id]);
        }
        return redirect('projects/index');
    }
}
