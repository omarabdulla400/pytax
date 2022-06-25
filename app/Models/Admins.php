<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;


    public function adminRole()
    {
        return $this->belongsTo(Roles::class,'role','id');
    }
    public function user()
    {
        return $this->hasMany(User::class,'accountId','id');
    }
    public function userBlongs()
    {
        return $this->belongsTo(User::class,'admin','id');
    }

}
