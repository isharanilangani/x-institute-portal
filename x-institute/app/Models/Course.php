<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'fee',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
