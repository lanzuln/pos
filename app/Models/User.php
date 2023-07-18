<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{


    protected $fillable = [
        'fName',
        'lName',
        'email',
        'mobile',
        'password',
        'otp'
    ];

    protected $attributes = [
        'otp' => '0'
    ];


}