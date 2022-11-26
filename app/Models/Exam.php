<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['name','subject_id','start_date','end_date','duration'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function regcheck()
    {
        return $this->hasMany(StudentExam::class);
    }

}
