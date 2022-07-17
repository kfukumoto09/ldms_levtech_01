<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_id',
        'user_id',
    ];
    
    protected $table = 'project_user';  // defaultではproject_users_tableになるため、手動で変更
    
    public $timestamps = false;  // 入れていないと、ProjectUser::createやfillをしたときにエラーが出る。
}
