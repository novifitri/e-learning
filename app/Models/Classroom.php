<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
