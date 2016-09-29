<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quesioner extends Model
{
    //
    protected $fillable=['question','diklat','questionfor'];
    
    public function opsi()
    {
    	# code...
    	return $this->hasMany('App\Opsi');
    }

    public function respon()
    {
    	# code...
    	return $this->hasMany('App\Respon');
    }
}
