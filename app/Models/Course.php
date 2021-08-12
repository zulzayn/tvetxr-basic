<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function lecturer() {
        return $this->hasOne('App\Models\User', 'id', 'id_lecturer');
    }

    public function coursefile() {
        return $this->hasMany('App\Models\CourseFile', 'id_course', 'id');
    }


}
