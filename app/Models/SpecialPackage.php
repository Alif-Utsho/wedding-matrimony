<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialPackage extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'details',
        'status',
    ];

    public function specialcategory() {
        return $this->hasMany(SpecialPackageCategory::class, 'special_id', 'id');
    }

    public function accesses() {
        return $this->belongsToMany(Access::class, 'package_accesses', 'package_id', 'access_id');
    }
}
