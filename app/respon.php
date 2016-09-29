<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respon extends Model
{
    //
    protected $fillable=['mentoring_id','quesioner_id','opsi_id','answer','answerof'];
    
    public function mentoring()
    {
    	# code...
    	return $this->belongsTo('App\Mentoring');
    }

    public function quesioner()
    {
    	return $this->belongsTo('App\Quesioner');
    }

    public function opsi()
    {
        return $this->belongsTo('App\Opsi');
    }
}
