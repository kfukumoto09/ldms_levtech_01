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
        'methods',
    ];
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
