<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialPackageCategory extends Model {
    use HasFactory;

    protected $fillable = [
        'special_id',
        'duration',
        'price',
        'old_price',
        'details',
        'popular',
        'status',
    ];

    public function specialpackage() {
        return $this->hasOne(SpecialPackage::class, 'id', 'special_id');
    }

    public function accesses() {
        return $this->belongsToMany(Access::class, 'package_accesses', 'package_id', 'access_id');
    }
}
