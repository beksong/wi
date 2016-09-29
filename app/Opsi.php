<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    //
    protected $fillable=['quesioner_id','pilihan','uraian'];
    public function quesioner()
    {
    	# code...
    	return $this->belongsTo('App\Quesioner');
    }

    public function respon()
    {
    	return $this->hasMany('App\respon');
    }
}
