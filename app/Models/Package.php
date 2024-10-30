<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function accesses()
    {
        return $this->belongsToMany(Access::class, 'package_accesses', 'package_id', 'access_id');
    }
}
