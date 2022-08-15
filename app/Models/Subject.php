<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\LabNote;
use Carbon\Carbon;  // comparison of date

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
     * Scope: searching words in title and objective
     */
    public function scopeSearchWord($query, $word) 
    {
        return $query->where('title', 'LIKE', '%' . $word . '%')
                     ->orWhere('objective', 'LIKE', '%' . $word . '%');
    }
    
    /**
     * Searching
     */
    public function search($input)
    {
        $user = Auth::user();
        $query = Subject::with(['lab_notes', 'project', 'project.users']);  // Eager loading
        
        // [1] Authorized projects
        $query = $query->whereHas('project.users', function ($query) use ($user) {
                            $query->authorized($user);
                        });
        // [2] Date
        $query = $query->whereHas('lab_notes', function ($query) use ($input) {
                                $query->dateFrom($input['from'])  // [2-1] (date >= from)
                                      ->dateTo($input['to']);     // [2-2] AND (date <= to)
                        });
        
        // [3] Key words (複数キーワード間は AND検索、検索対象のtitle, objective, lab_note間は OR検索)
        $query = $query->where(function ($query) use ($input) {
                            $words_converted = mb_convert_kana($input['words'], 's');   // -- convert double-byte space to single-byte space
                            $arr_words = explode(' ', $words_converted);                // -- separate words with " "
                            foreach( $arr_words as $word ) {                            // [3-n] (word(1) AND word(2) AND ...) {
                                $query = $query->searchWord($word)                                          // [3-n-1] (contains word(n) in Subject) 
                                                ->orWhereHas('lab_notes', function ($query) use ($word) {   // 
                                                    $query->searchWords($word);                             // [3-n-2] OR (contains word(n) in LabNote)
                                                });
                            }
                        });
                        
        $results = $query->get();
        return $results;
        
        // (original code)
        // $subjects = Subject::with(['lab_notes', 'project', 'project.users'])            // Eager loading
        //                     ->whereHas('project.users', function ($query) use ($user) { // [1] Authorized projects
        //                         $query->authorized($user);                              // 
        //                     })->whereHas('lab_notes', function ($query) use ($input) {  // 
        //                         $query->dateFrom($input['from'])                        // [2] AND (date >= from)
        //                               ->dateTo($input['to']);                           // [3] AND (date <= to)
        //                     })->where(function ($query) use ($input) {                  // [4] AND (contains key words {
        //                         $words_converted = mb_convert_kana($input['words'], 's');   // -- convert double-byte space to single-byte space
        //                         $arr_words = explode(' ', $words_converted);                // -- separate words with " "
        //                         foreach( $arr_words as $word ) {                            // [4-n] (word(1) AND word(2) AND ...) {
        //                             $query = $query->searchWord($word)                                              // [4-n-1] (contains word(n) in Subject) 
        //                                             ->orWhereHas('lab_notes', function ($query) use ($word) {  // 
        //                                                 $query->searchWords($word);                       // [4-n-2] OR (contains word(n) in LabNote)
        //                                             });                                     //
        //                         }                                                           // }  <!-- [4-n] word(n) -->
        //                     })->get();                                                  // })  <!-- [4] contains word -->
        // $results = $subjects
        // return $results;
    }
    
}

