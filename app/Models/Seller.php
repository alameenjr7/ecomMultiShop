<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Seller extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $guard='sellers';
    protected $fillable =
    [
        'full_name',
        'username',
        'email',
        'photo',
        'phone',
        'address',
        'date_of_birth',
        'genre',
        'city',
        'country',
        'state',
        'email_verified_at',
        'password',
        'status',
        'is_verified',
    ];
}
