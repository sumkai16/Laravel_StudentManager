<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Subject extends Model
{
    protected $fillable = [
        'subject_code',
        'subject_name',
        'description',
        'year_level',
        'units'
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject')
                    ->withTimestamps();
    }
}
