<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    public function stories(){
        return $this->hasMany(WeddingStory::class);
    }

    public function galleries(){
        return $this->hasMany(WeddingGallery::class);
    }
}
