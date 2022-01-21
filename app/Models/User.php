<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()//s tazi funkciq pozvolqvame da se suzdavat svobodno profile
    {
        parent::boot();

        static::created(
            function ($user){
                $user->profile()->create([
                    'title'=>$user->username,

                ]);
            });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');//she ima mnogo postove podredeni po posledno dobaveno
    }


    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function following()
    {
        return $this->belongsToMany(Profile::class);//zashtoto moje da imame mn posledovateli i da sledvame nie mnogo v profile sushtoto
    }
    public function likes()
    {
        return $this->belongsToMany(Post::class);
    }
}
