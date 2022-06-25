<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public function roleItemList()
    {
        return $this->hasMany(RoleItems::class);
    }
    public function admins()
    {
        return $this->belongsTo(Admins::class);
    }
    public function teacherRole()
    {
        return $this->belongsTo(teacher::class,'role','id');
    }
    public function adminRole()
    {
        return $this->hasMany(Admins::class,'role','id');
    }

}
