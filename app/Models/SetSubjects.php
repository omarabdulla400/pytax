<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetSubjects extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function subjectsAndDepartments()
    {
        return $this->belongsTo(SubjectsAndDepartments::class,'subjects_and_departments','id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teachers::class,'teacher','id');
    }
}
