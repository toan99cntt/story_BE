<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table='audio';
    protected $fillable=['title','link','status','id_admin'];
    public $timestamps = false;
    public  function admin()
    {
    	return $this->hasOne(Admin::class, 'id','id_admin');
    }
}
