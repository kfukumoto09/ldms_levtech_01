<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }
    
    public function getAuthorizedProjects(Project $project, User $user)
    {
        // $authorized_users = $this->authorized_users->get();
        // $projects_dst = [];
        // foreach( $authorized_users as $authorized_user) {
        //     if(in_array($project, $authorized_user->authorized))
        // }
        //dd($this->get());
        //foreach ( $this->authorized_users
        dd($project->first()->users);
        dd(Project::where('authorized_users'));
        return Project::where('authorized_users');
    }
    
}
