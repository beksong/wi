<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    //
    protected $fillable=[
    	'nip',
    	'name',
    	'hp',
    	'email',
    	'unitkerja_skrg',
    	'unitkerja_diklat',
    	'jabatan'
    ];

    public function mentoring()
    {
        # code...
        return $this->hasMany('App\Mentoring');
    }
}
