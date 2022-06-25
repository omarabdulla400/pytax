<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function department()
    {
        return $this->belongsTo(Departments::class,'department','id');
    }
    public function study_type()
    {
        return $this->belongsTo(StudyTypes::class,'study_type','id');
    }
    public function setStudentStages()
    {
        return $this->hasMany(SetStudentStages::class,'student','id');
    }
}
