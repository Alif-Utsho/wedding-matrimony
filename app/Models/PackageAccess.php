<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageAccess extends Model
{
    use HasFactory;

    public function access() {
        return $this->belongsTo(Access::class);
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }
}
