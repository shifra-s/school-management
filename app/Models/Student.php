<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function courses() {
        return $this->hasMany('App\Models\CourseStudent', 'student_id', 'id');
    }
}
