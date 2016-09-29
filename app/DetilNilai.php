<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilNilai extends Model
{
    //
    //protected $table='detil_nilais';
    
    protected $fillable=['nilai_id','item_nilai_id','angka'];
    public function nilai()
    {
    	# code...
    	return $this->belongsTo('App\Nilai');
    }

    public function item_nilai()
    {
    	# code...
    	return $this->belongsTo('App\ItemNilai');
    }

}
