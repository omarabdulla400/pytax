<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetStudentStages extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function student()
    {
        return $this->belongsTo(Students::class,'student','id');
    }
    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage','id');
    }
    public function study_status()
    {
        return $this->belongsTo(StudyStatus::class,'study_status','id');
    }
    public function education_year()
    {
        return $this->belongsTo(Education_Years::class,'education_year','id');
    }
    public function studentResults()
    {
        return $this->hasMany(StudentResults::class,'setStudentStage','id');
    }
}
