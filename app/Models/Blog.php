<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }
}
