<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResults extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function setStudentStage()
    {
        return $this->belongsTo(SetStudentStages::class,'setStudentStage','id');
    }
    public function subject_and_departments()
    {
        return $this->belongsTo(SubjectsAndDepartments::class,'subject_and_departments','id');
    }
}
