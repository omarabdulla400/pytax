<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function subjectAndDepartments()
    {
        return $this->hasMany(SubjectsAndDepartments::class,'stage','id');
    }
    public function setStudentStages()
    {
        return $this->hasMany(SetStudentStages::class,'stage','id');
    }
}
