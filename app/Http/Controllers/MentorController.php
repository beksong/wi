<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MentorRequest;
use App\Mentor;
class MentorController extends Controller
{
    //
    public function showMentor()
    {
    	$mentors=Mentor::all();
    	return view('mentor.tbmentor',compact('mentors'));
    }

    public function showForm()
    {
    	/*
    	** showing mentor form
    	 */
    	return view('mentor.frmmentor');
    }

    public function saveMentor(MentorRequest $request)
    {
    	$mentors=new Mentor(array(
    		'nip' =>$request->get('nip'),
    		'name'=>$request->get('name'),
    		'hp'=>$request->get('hp'),
    		'email'=>$request->get('email'),
    		'jabatan'=>$request->get('jabatan'),
    		'unitkerja'=>$request->get('unitkerja'),
    	));

	    	$mentors->save();

	    	return $this->showMentor();
    }

    public function deleteMentor($mentor_id)
    {
    	$mentor=Mentor::where('id',$mentor_id)->delete();
    	return $this->showMentor();
    }

    public function editMentor(MentorRequest $request)
    {
        # code...
        $mentor=Mentor::find($request->get('mentor_id'))->update([
                'nip'=>$request->get('nip'),
                'name'=>$request->get('name'),
                'hp'=>$request->get('hp'),
                'email'=>$request->get('email'),
                'jabatan'=>$request->get('jabatan'),
                'unitkerja'=>$request->get('unitkerja'),
            ]);
        return $this->showMentor();
    }
}
