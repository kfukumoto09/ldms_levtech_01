<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'purpose',
    ];
    
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }
    
    public function subjects() 
    {
        return $this->hasMany(Subject::class);
    }
    
    public function getAuthorizedProjects(Project $project, User $user)
    {
        dd(Project::where('authorized_users'));
        return Project::where('authorized_users');
    }
    
}
