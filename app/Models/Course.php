<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
 
    public function students(){
        return $this->hasMany(Student::class,'course_id');
    }
 
    public function attendances(){
        return $this->hasMany(Attendance::class,'course_id');
    }
}
