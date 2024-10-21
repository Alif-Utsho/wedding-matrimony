<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {
    use HasFactory;

    protected $guarded = [];

    public function isComplete()
    {
        return !empty($this->gender) && !empty($this->birth_date) && !empty($this->city_id) && !empty($this->height) && !empty($this->weight);
    }

    public function career() {
        return $this->hasOne(UserCareer::class);
    }

    // Relationship to UserHobby
    public function hobbies() {
        return $this->hasMany(UserHobby::class);
    }

    // Relationship to UserSocialmedia
    public function socialmedia() {
        return $this->hasOne(UserSocialmedia::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
