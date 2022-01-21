<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];//kazvame na laravel che ne e nyjno da pazi vsichki ot dostup
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function likers()
    {
        return $this->belongsToMany(User::class);
    }
}
