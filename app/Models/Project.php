<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
    
    public function getAuthorizedProjects()
    {
        $user = Auth::user();
        $projects = Project::with(['users', 'subjects', 'subjects.lab_notes'])
                            ->whereHas('users', function ($query) use ($user) {
                                $query->authorized($user);  // get authorized projects
                            })->get();
        return $projects;
    }
    
}
