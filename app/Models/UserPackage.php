<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function accesses(){
        return $this->hasManyThrough(
            Access::class,
            PackageAccess::class,
            'package_id',  // Foreign key on PackageAccess table...
            'id',           // Foreign key on Access table...
            'package_id',   // Local key on UserPackage table...
            'access_id'     // Local key on PackageAccess table...
        );
    }
}