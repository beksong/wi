<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemNilai extends Model
{
    //
    //protected $table='item_nilais';
    public function detilnilai()
    {
    	# code...
    	return $this->hasMany('App\DetilNilai');
    }
}
