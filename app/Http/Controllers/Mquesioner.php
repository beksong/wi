<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MquesionerRequest;
use App\Http\Requests\OpsiRequest;
use App\Quesioner;
use App\Opsi;
class Mquesioner extends Controller
{
    //
    public function showQuesioner()
    {
    	# code...
    	$quesioners=Quesioner::all();
    	return view('mquesioner.tbmquesioner',compact('quesioners'));
    }

    public function addQuesioner(MquesionerRequest $req)
    {
    	# code...
    	$quesioner=new Quesioner([
    			'question'=>$req->get('question'),
    			'diklat'=>$req->get('diklat'),
    			'questionfor'=>$req->get('questionfor')
    		]);
    	$quesioner->save();

    	return redirect('/mquesioner');
    }

    public function editQuesioner(MquesionerRequest $req)
    {
    	# code...
    	$quesioner=Quesioner::find($req->get('question_id'));
    	$quesioner->update([
    			'question'=>$req->get('question'),
    			'diklat'=>$req->get('diklat'),
    			'questionfor'=>$req->get('questionfor')
    		]);
    	return redirect('/mquesioner');
    }

    public function delQuesioner(MquesionerRequest $req)
    {
    	# code...
    	$quesioner=Quesioner::find($req->get('question_id'))->delete();
    	return redirect('/mquesioner');
    }
}
