<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentoring extends Model
{
    //
    protected $fillable=['mentor_id','alumni_id','angkatan_id','status_mentor_diklat','status_mentor_skrg','judulpp'];
    
    public function alumni()
    {
    	# code...
    	return $this->belongsTo('App\Alumni');
    }

    public function mentor()
    {
    	# code...
    	return $this->belongsTo('App\Mentor');
    }

    public function angkatan()
    {
    	# code...
    	return $this->belongsTo('App\Angkatan');
    }

    public function quesioner()
    {
        # code...
        return $this->hasMany('App\Quesioner');
    }

    public function respon()
    {
        # code...
        return $this->hasMany('App\Respon');
    }
}
