<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MataDiklatRequest;
use App\Http\Requests;
use App\MataDiklat;
class MataDiklatController extends Controller
{
    //
    public function showMataDiklat()
    {
    	# code...
    	$matadiklats=MataDiklat::all();
    	return view('matadiklat.tbmatadiklat',compact('matadiklats'));
    }

    public function addMataDiklat(MataDiklatRequest $request)
    {
    	# code...
    	$matadiklat=new MataDiklat(array('nama' =>$request->get('nama')));
    	$matadiklat->save();
    	return $this->showMataDiklat();
    }

    public function editMataDiklat(MataDiklatRequest $request)
    {
    	# code...
    	$MataDiklat=MataDiklat::find($request->get('matadiklat_id'))->update([
    			'nama'=>$request->get('nama'),
    		]);
    	return $this->showMataDiklat();
    }

    public function deleteMataDiklat(MataDiklatRequest $request)
    {
    	# code...
    	$matadiklat=MataDiklat::find($request->get('matadiklat_id'))->delete();
    	return $this->showMataDiklat();
    }
}
