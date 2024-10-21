<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hobby(){
        return $this->belongsTo(Hobby::class);
    }
}
