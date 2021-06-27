<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table='admin';
    protected $fillable=['username','password','email'];
    public $timestamps=false;
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function audio()
    {
    	return $this->hasMany(Audio::class,'id_admin','id');
    }
}

