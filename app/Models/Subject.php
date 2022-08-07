<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\LabNote;

class Subject extends Model
{
    use HasFactory;
    
    /*
     * Relationships
     */
    public function project() 
    {
        return $this->belongsTo(Project::class);
    }
    
    public function lab_notes() 
    {
        return $this->hasMany(LabNote::class);
    }
    
    public function lab_note() // 単数形の場合は最新 (last()) のlab_noteを取得する
    {
        return $this->lab_notes->last();
    }
    
    /*
     * Searching
     */
    
    public function search($input)
    {
        $subjects = Subject::with(['lab_notes', 'project'])->get();
        dd( $subjects->first()->lab_note()->where('methods', 'LIKE', $input['words'])->get() );
        $results = $subjects->first()
                            ->lab_note()
                            ->where('methods', 'LIKE', $input['words'])
                            ->get();
        // dd($results);
        return $results;
    }
    
    
}

