<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsAndDepartments extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class,'subject','id');
    }
    public function department()
    {
        return $this->belongsTo(Departments::class,'department','id');
    }
    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage','id');
    }
    public function education_type()
    {
        return $this->belongsTo(EducationTypes::class,'education_type','id');
    }
    public function education_years()
    {
        return $this->belongsTo(Education_Years::class,'education_year','id');
    }

    public function setSubject()
    {
        return $this->hasMany(SetSubjects::class,'subjects_and_departments','id');
    }
    public function studentResults()
    {
        return $this->hasMany(StudentResults::class,'subjects_and_departments','id');
    }
}
