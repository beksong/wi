<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    //
    protected $fillable=['nama'];

    public function angkatan()
    {
    	# code...
    	return $this->hasMany('App\Angkatan');
    }
}
