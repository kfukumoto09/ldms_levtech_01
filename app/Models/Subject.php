<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\LabNote;

class Subject extends Model
{
    use HasFactory;
    
    public function project() 
    {
        return $this->belongsTo(Subject::class);
    }
    
    public function lab_notes() 
    {
        return $this->hasMany(LabNote::class);
    }
    
    public function lab_note() // 単数形の場合は最新 (last()) のlab_noteを取得する
    {
        return $this->lab_notes->last();
    }
}

