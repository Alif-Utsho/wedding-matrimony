<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function from_user(){
        return $this->hasOne(User::class, 'id', 'sent_from');
    }

    public function to_user(){
        return $this->hasOne(User::class, 'id', 'sent_to');
    }
}
