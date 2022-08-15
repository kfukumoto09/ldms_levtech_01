<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProjectUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_id',
        'user_id',
        'authorized_by',
    ];
    
    protected $table = 'project_user';  // defaultではproject_users_tableになるため、手動で変更
    public $timestamps = false;  // 入れていないと、ProjectUser::createやfillをしたときにエラーが出る。
    
    /**
     * Search (project_id, user_id) in project_user_table
     */
    public function search($project_id, $user_id) {
        return $this->where('project_id', $project_id)
                    ->where('user_id', $user_id);
    }
}
