<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $guarded = []; //laravel doesnt allow to fill fields from form directly into model - no columns are guarded (empty array)

}