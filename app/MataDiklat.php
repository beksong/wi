<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataDiklat extends Model
{
    //
    protected $table='matadiklats';
    protected $fillable=['nama'];

    public function nilais()
    {
    	# code...
    	return $this->hasMany('App\Nilai');
    }
}
