<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = []; //laravel doesnt allow to fill fields from form directly into model - no columns are guarded (empty array)

    public function students() {
        return $this->hasMany('App\Models\CourseStudent', 'course_id', 'id');
    }

}
