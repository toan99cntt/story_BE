<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employer extends Authenticatable
{
    use Notifiable;
    protected $table='employer';
    protected $fillable=['username','password','email','avatar'];
    public $timestamps=false;
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function comment()
    {
    	return $this->hasMany(Comment::class,'id_story','id');
    }
}
