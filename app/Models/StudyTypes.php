<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyTypes extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function students()
    {
        return $this->hasMany(Students::class,'department','id');
    }
}
