<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
 
    public function attendances(){
        return $this->hasMany(Attendance::class,'student_id');
    }
    
}
