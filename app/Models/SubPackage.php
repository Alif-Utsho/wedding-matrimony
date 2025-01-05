<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPackage extends Model {
    use HasFactory;
    protected $guarded = [];

    public function package() {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function userpackage() {
        return $this->belongsTo(UserPackage::class, 'id', 'package_id');
    }

    public function accesses() {
        return $this->belongsToMany(Access::class, 'package_accesses', 'package_id', 'access_id');
    }
}
