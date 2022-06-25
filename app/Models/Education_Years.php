<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_Years extends Model
{
    use HasFactory;
    protected $table = 'education_years';
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function subjectAndDepartments()
    {
        return $this->hasMany(SubjectsAndDepartments::class,'education_years','id');
    }
    public function setStudentStages()
    {
        return $this->hasMany(SetStudentStages::class,'education_year','id');
    }
    public function covermentRole()
    {
        return $this->hasMany(CovermentRoles::class,'year','id');
    }
}
