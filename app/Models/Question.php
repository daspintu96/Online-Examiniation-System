<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id','question','answer1','answer2','answer3','answer4','answer',];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
