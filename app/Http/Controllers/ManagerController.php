<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Gate;

class ManagerController extends Controller
{
    /**
     * Show the form for authorizing a manager projects.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_authorization(Project $project, User $user)
    {
        Gate::authorize('isAdministrator');
        $projects = $project->get();
        $users = $user->managers();
        return view('users/authorize-to-manager', compact('projects', 'users'));
    }

    /**
     * Update the authorization of projects in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_authorization(Request $request, ProjectUser $project_user)
    {
        Gate::authorize('isAdministrator');
        $user_id = (int) $request->updated_user_id;
        $project_user->authorize($user_id, $request['project_ids']);
        return redirect('console');
    }
}
