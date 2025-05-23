<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'address',
        'contact_number',
        'course_id',
    ];

    // Define the relationship: A student belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
