<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;  // for relationship
use Illuminate\Support\Facades\Gate;  // for Gate
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Project;
use App\Models\UserCategory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_category_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // relationships
    public function authorized_users()
    {
        if (Gate::allows('higherThanManager')) {
            return $this->hasMany(User::class, 'authorized_by', 'id');
        } else {
            echo "You are not authorized user.";
        }
    }
    
    public function category()
    {
        return $this->belongsTo(UserCategory::class, 'user_category_id');
    }
    
    public function authorized_projects()
    {
        return $this->belongsToMany(Project::class);
    }
    
    
    public function test($user)
    {
        dd(\Auth::user()->authorized_projects);
    }
}
