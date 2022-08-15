<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class LabNote extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subject_id',
        'preparation',
        'methods',
        'performed_on',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    /**
     * Relationship
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
    /**
     * Scopes
     */
    public function scopeSearchWords($query, $word)
    {
        return $query->where('methods', 'LIKE', '%' . $word . '%')
                     ->orWhere('preparation', 'LIKE', '%' . $word . '%');
    }
    
    public function scopeDateFrom($query, $date)
    {
        if( isset($date) ) {
            return $query->whereDate('performed_on', '>=', $date);
        }else{
            return $query;
        }
    }
    
    public function scopeDateTo($query, $date)
    {
        if( isset($date) ) {
            return $query->whereDate('performed_on', '<=', $date);
        }else{
            return $query;
        }
    }
}
