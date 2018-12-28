<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    public function course() {
        return $this->hasOne('\App\Models\Course', 'id', 'course_id');
    }
}
