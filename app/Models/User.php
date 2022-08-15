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
    
    /**
     * A function to get user_category_id from the category name (e.g. player, manager or administrator)
     */
    function category_id($key) {
        return UserCategory::where('name', $key)->first()->id;
    }
    
    function isAdministrator() {
        return $this->category->name == 'administrator';
    }
    
    /**
     * Relationships
     */
    public function authorizing_users()
    {
        if (Gate::allows('higherThanManager')) {
            return $this->hasMany(User::class, 'authorizer_id', 'id');
        } else {
            echo "You are not authorized user.";
        }
    }
    
    public function authorized_by() {
        return $this->belongsTo(User::class, 'authorizer_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo(UserCategory::class, 'user_category_id');
    }
    
    public function authorized_projects()
    {
        return $this->belongsToMany(Project::class);
    }
    
    /**
     * Administrator: all projects
     * Others: authorized projects
     */
    public function projects()
    {
        if ( $this->isAdministrator() ) {
            return Project::all();
        } else {
            return $this->authorized_projects;
        };
    }
    
    /**
     * Functions passed to the controller
     */
    public function administrators() 
    {
        return $this->where('user_category_id', $this->category_id('administrator'))
                    ->get();
    }
    
    public function managers() 
    {
        return $this->where('user_category_id', $this->category_id('manager'))
                    ->get();
    }
    
    public function players() 
    {
        return $this->where('user_category_id', $this->category_id('player'))
                    ->get();
    }

    public function count() {
        return $this->count();
    }
    
    /**
     * [Scope] return authorized items
     * Administrator: all
     * Others: authorized
     */
    public function scopeAuthorized($query, $user)
    {
        if ( $user->isAdministrator() ) {
            return $query;
        } else {
            return $query->where('id', $user->id);
        };
    }
    
    
//     public function test($user)
//     {
//         $user = new User;
//         dd($user);
//     }
}
