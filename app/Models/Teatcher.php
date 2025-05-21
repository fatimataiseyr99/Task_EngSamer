<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teatcher extends Model
{
    
    protected $fillable = ['name', 'email'];
    public function courses()
{
    return $this->hasMany(Course::class);
}
}
