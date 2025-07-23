<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Notifications\Notifiable;

class BanquetManager extends  Authenticatable  implements CanResetPassword
{
    use HasFactory, Notifiable, CanResetPasswordTrait;

    protected $table = 'banquet_managers';
    protected $fillable = [
        'name',
        'banquet_name',
        'banquet_address',
        'email',
        'phone',
    ];

    protected $hidden = [
        'password',
    ];
    public function banquet()
    {
        return $this->hasOne(Banquet::class);
    }
}
