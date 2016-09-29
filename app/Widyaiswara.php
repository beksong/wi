<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widyaiswara extends Model
{
    //
    protected $fillable=['nip','nama'];
    
    public function nilais()
    {
    	# code...
    	return $this->hasMany('App\Nilai');
    }
}
