<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovermentRoles extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'admin','id');
    }
    public function semester()
    {
        return $this->belongsTo(Semesters::class,'semester','id');
    }
    public function education_years()
    {
        return $this->belongsTo(Education_Years::class,'year','id');
    }
}
