<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
class Student extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'course',
        'year_level',
    ];
    public function subject(){
        return $this->hasMany(Subject::class);
    }

}
    