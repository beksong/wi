<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AngkatanRequest;
use App\Lembaga;
use App\Angkatan;
class AngkatanController extends Controller
{
    //
    public function showAngkatan()
    {
    	# code...
    	$lembagas=Lembaga::all();
    	return view('angkatan.tbangkatan',compact('lembagas'));
    }

    public function addAngkatan(AngkatanRequest $request)
    {
    	# code...
    	$angkatan=new Angkatan(array(
    		'lembaga_id' =>$request->get('lembaga_id'),
    		'nama_diklat'=>$request->get('nama_diklat'),
    		'tahun'=>$request->get('tahun'),
    		'angkatan'=>$request->get('angkatan'), 
            'jenis_diklat' =>$request->get('jenis_diklat'),
    		));

    	$angkatan->save();

    	return $this->showAngkatan();
    }

    public function detailAngkatan($lembaga_id)
    {
    	$lembagas=Lembaga::with('Angkatan')->where('id','=',$lembaga_id)->get();
        //return $lembagas;
        $lem=Lembaga::all();
        return view('angkatan.detailangkatan',compact('lembagas','lem'));
    }

    public function editAngkatan(AngkatanRequest $request)
    {
        # code...
        $angkatan=Angkatan::where('id','=',$request->get('angkatan_id'))->update([
                'lembaga_id'=>$request->get('lembaga_id'),
                'nama_diklat'=>$request->get('nama_diklat'),
                'tahun'=>$request->get('tahun'),
                'angkatan'=>$request->get('angkatan'),
                'jenis_diklat' =>$request->get('jenis_diklat'),
            ]);
        return $this->detailAngkatan($request->get('lembaga_id'));
    }

    public function delAngkatan(AngkatanRequest $request)
    {
        $angkatan=Angkatan::find($request->get('angkatan_id'))->delete();
        return $this->detailAngkatan($request->get('lembaga_id'));
    }
}
