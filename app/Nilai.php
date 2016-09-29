<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $fillable=['angkatan_id','matadiklat_id','widyaiswara_id','tgl','jp'];

    public function angkatan()
    {
    	# code...
    	return $this->belongsTo('App\Angkatan');
    }

    public function widyaiswara()
    {
    	# code...
    	return $this->belongsTo('App\Widyaiswara');
    }

    public function matadiklat()
    {
    	# code...
    	return $this->belongsTo('App\MataDiklat');
    }

    public function detilnilai()
    {
        # code...
        return $this->hasMany('App\DetilNilai');
    }
}
