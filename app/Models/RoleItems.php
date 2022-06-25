<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleItems extends Model
{
    use HasFactory;

  

    public function roleNames()
    {
        return $this->belongsTo(RoleNames::class);
    }
    public function roles()
    {
        return $this->belongsTo(Roles::class);
    }
}
