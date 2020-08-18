<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Notifications\AccountActivation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->activation_token = Str::random(10);
            $user->notify(new AccountActivation($user));
        });
    }

    public function statuses()
    {
        $this->hasMany(Status::class);
    }
}
