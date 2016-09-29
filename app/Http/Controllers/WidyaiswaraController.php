<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WidyaiswaraRequest;
use App\Http\Requests;
use App\Widyaiswara;
class WidyaiswaraController extends Controller
{
    //
    public function showWidyaiswara()
    {
    	# code...
    	$widyaiswaras=Widyaiswara::all();
    	return view('widyaiswara.tbwidyaiswara',compact('widyaiswaras'));
    }

    public function addWidyaiswara(WidyaiswaraRequest $request)
    {
    	# code...
    	$widyaiswara=new Widyaiswara(array(
    		'nip' =>$request->get('nip'),
    		'nama'=>$request->get('nama'),
    		));
    	$widyaiswara->save();
    	return $this->showWidyaiswara();
    }

    public function editWidyaiswara(WidyaiswaraRequest $request)
    {
    	# code...
    	$widyaiswara=Widyaiswara::find($request->get('widyaiswara_id'))->update([
    			'nip'=>$request->get('nip'),
    			'nama'=>$request->get('nama')
    		]);

    	return $this->showWidyaiswara();
    }

    public function deleteWidyaiswara(WidyaiswaraRequest $request)
    {
    	# code...
    	$widyaiswara=Widyaiswara::find($request->get('widyaiswara_id'))->delete();
    	return $this->showWidyaiswara();
    }
}
