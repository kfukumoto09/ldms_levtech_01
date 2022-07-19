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
    function get_category_id($key) {
        $categories = new UserCategory;
        return $categories->where('name', $key)->first()->id;
    }
    
    /**
     * Relationships
     */
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
    
    /**
     * Functions passed to the controller
     */
    public function get_managers() {
        return $this->where('user_category_id', $this->get_category_id('manager'))
                    ->get();
    }
    
    
//     public function test($user)
//     {
//         $user = new User;
//         dd($user);
//     }
}
