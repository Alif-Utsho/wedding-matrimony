<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLog extends Model {
    use HasFactory;

    protected $guarded = [];

    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

}
