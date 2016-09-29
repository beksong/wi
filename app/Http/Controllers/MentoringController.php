<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MentoringRequest;
use App\Mentor;
use App\Alumni;
use App\Lembaga;
use App\Angkatan;
use App\Mentoring;
use App\Quesioner;
use App\Opsi;
class MentoringController extends Controller
{
    //
    public function showMentoring()
    {
    	# code...
    	$mentors=Mentor::all();
    	$alumnis=Alumni::all();
    	$lembagas=Lembaga::all();
    	$mentorings=Mentoring::all();
    	return view('mentoring.tbmentoring',array('mentors' =>$mentors,'alumnis'=>$alumnis,'lembagas'=>$lembagas,'mentorings'=>$mentorings));
    }

    public function addMentoring(MentoringRequest $request)
    {
    	# code...
    	$mentoring=new Mentoring([
    			'mentor_id'=>$request->get('mentor_id'),
    			'alumni_id'=>$request->get('alumni_id'),
    			'angkatan_id'=>$request->get('angkatan_id'),
                'status_mentor_diklat'=>$request->get('status_mentor_diklat'),
                'status_mentor_skrg'=>$request->get('status_mentor_skrg'),
                'judulpp'=>$request->get('judulpp'),
    		]);
    	$mentoring->save();
    	return redirect('/mentoring');
    }

    public function editMentoring(MentoringRequest $request)
    {
        # code...
        $mentoring=Mentoring::find($request->get('mentoring_id'))->update([
                'mentor_id'=>$request->get('mentor_id'),
                'alumni_id'=>$request->get('alumni_id'),
                'angkatan_id'=>$request->get('angkatan_id'),
                'status_mentor_diklat'=>$request->get('status_mentor_diklat'),
                'status_mentor_skrg'=>$request->get('status_mentor_skrg'),
                'judulpp'=>$request->get('judulpp'),
            ]);
        return redirect('/mentoring');
    }

    public function delMentoring(MentoringRequest $request)
    {
        # code...
        $mentoring=Mentoring::find($request->get('mentoring_id'))->delete();
        return redirect('/mentoring');
    }

    public function showDetil($mentoring_id)
    {
        # code...
        $mentorings=Mentoring::find($mentoring_id);
        
        return view('mentoring.detilmentoring',compact('mentorings'));
    }
}
