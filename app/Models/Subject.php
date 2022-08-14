<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Project;
use App\Models\LabNote;

class Subject extends Model
{
    use HasFactory;
    
    /**
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
    
    public function last_notes()
    {
        $subjects = Subject::with(['lab_notes', 'project'])->get();
        dd ( Subject::where('objective', 'method')->get() );
        $lab_notes_dst = Collection::make();
        foreach( $subjects as $subject ) {
            $lab_notes_dst->add( $subject->lab_note());
        }
        return $lab_notes_dst;
    }
    
    /**
     * Searching
     */
    public function search($input)
    {
        $keywords_converted = mb_convert_kana($input['words'], 's');  // convert double-byte space to single-byte space
        $arr_keywords = explode(' ', $keywords_converted);
        $query = Subject::query();
        // dd($query)
        $lab_notes = $this->last_notes();
        dd( $lab_notes->where('methods', 'LIKE', '%' . $input['words'] . '%') );
        dd( $this->first()->lab_note()->where('methods', 'LIKE', '%' . $input['words'] . '%') );
        $results = $lab_notes->where('methods', 'LIKE', '%' . $input['words'] . '%');
        return $results;
    }
    
}

