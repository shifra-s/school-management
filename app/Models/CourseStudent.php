<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'student_id',
        'course_id',
    ];

    public function course() {
        return $this->hasOne('\App\Models\Course', 'id', 'course_id');
    }

    public function student() {
        return $this->hasOne('\App\Models\Student', 'id', 'student_id');
    }
}
