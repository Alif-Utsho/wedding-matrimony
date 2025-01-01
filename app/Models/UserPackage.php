<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model {
    use HasFactory;

    protected $guarded = [];

    public function package() {
        return $this->belongsTo(Package::class);
    }

    public function specialcategory() {
        return $this->belongsTo(SpecialPackageCategory::class, 'sub_pkg_id', 'id');
    }

    public function subpackage() {
        return $this->belongsTo(SubPackage::class, 'sub_pkg_id', 'id');
    }

    public function accesses() {
        return $this->hasManyThrough(
            Access::class,
            PackageAccess::class,
            'package_id', // Foreign key on PackageAccess table...
            'id',         // Foreign key on Access table...
            'package_id', // Local key on UserPackage table...
            'access_id'   // Local key on PackageAccess table...
        );
    }
}