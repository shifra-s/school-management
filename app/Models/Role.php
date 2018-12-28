<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function admins() {
        return $this->hasMany('App\Models\Administrator', 'role', 'id');
    }
}
