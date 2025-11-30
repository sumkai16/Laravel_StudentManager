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
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
