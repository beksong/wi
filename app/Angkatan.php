<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    //
    protected $fillable=[
    	'lembaga_id',
    	'nama_diklat',
    	'tahun',
    	'angkatan',
        'jenis_diklat'
    ];
    public function lembaga()
    {
    	# code...
    	return $this->belongsTo('App\Lembaga');
    }

    public function nilais()
    {
        # code...
        return $this->hasMany('App\Nilai');
    }

    public function mentoring()
    {
        # code...
        return $this->hasMany('App\Mentoring');
    }
}
