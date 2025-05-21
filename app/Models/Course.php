<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['title', 'description', 'teacher_id'];
   public function teacher()
{
    return $this->belongsTo(Teatcher::class);
}

public function students()
{
    return $this->belongsToMany(Student::class, 'enrollments');
}
}
