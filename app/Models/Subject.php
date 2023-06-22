<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = ['subject_name', 'subject_code', 'description'];

    public function courses() {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}
