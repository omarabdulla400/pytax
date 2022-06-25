<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    public function teacherRole()
    {
        return $this->belongsTo(Roles::class,'role','id');
    }
    public function userBlongs()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function user()
    {
        return $this->hasMany(User::class,'accountId','id');
    }
    public function setSubject()
    {
        return $this->hasMany(SetSubjects::class,'teacher','id');
    }
}
