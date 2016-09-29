<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LembagaRequest;
use App\Http\Requests;
use App\Lembaga;
class LembagaController extends Controller
{
    //
    public function showLembaga()
    {
    	# code...
    	$lembagas=Lembaga::all();
    	return view('lembaga.tblembaga',compact('lembagas'));
    }

    public function addLembaga(LembagaRequest $request)
    {
    	# code...
    	$lembaga=new Lembaga(array(
    			'nama'=>$request->get('nama'),
    		));

    	$lembaga->save();
    	return $this->showLembaga();
    }

    public function editLembaga(LembagaRequest $request)
    {
    	# code...
    	$lembaga=Lembaga::find($request->get('lembaga_id'))->update([
    			'nama'=>$request->get('nama'),
    		]);
    	return $this->showLembaga();
    }

    public function deleteLembaga($lembaga_id)
    {
    	# code...
    	$lembaga=Lembaga::find($lembaga_id)->delete();
    	return $this->showLembaga();
    }
}
