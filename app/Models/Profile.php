<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded=[];
    

    public function profileImage()//Ako nqmame dobavena snimka dobavq avtomatichno tazi
    {
         $imagePath = ($this->image) ? $this->image : '/profile/UiCfFQNwNCuRzY4A260JS7YuLGB13ulyje1tqSGd.jpg';
        return '/storage/' . $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
