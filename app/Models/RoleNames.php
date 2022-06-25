<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleNames extends Model
{
    public function roleItemList()
    {
        return $this->hasMany(RoleItems::class);
    }
    use HasFactory;
}
