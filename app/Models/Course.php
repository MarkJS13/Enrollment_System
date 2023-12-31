<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['department', 'course_code', 'course_name', 'description'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function subjects() {
        return $this->belongsToMany(Subject::class, 'enrollments');
    }
}
