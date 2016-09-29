<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    //
    //protected $table='mentors';
    protected $fillable=['nip','name','hp','email','jabatan','unitkerja'];

    public function mentoring()
    {
    	# code...
    	return $this->hasMany('App\Mentoring');
    }
}
