<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mentoring;
use App\Quesioner;
use App\Opsi;
use App\respon;
use App\Http\Requests\QuesionerRequest;
class QuesionerController extends Controller
{
    //
    public function showQuesionerMentorPIM3($mentoring_id,$questionnumber)
    {
        # show question for mentor PIM III
        # first we select data in mentorings table and check tb respon if any answer of questionnumber 
        $mentorings=Mentoring::with(['respon'=>function($query) use ($questionnumber,$mentoring_id){
            $query->where('quesioner_id','=',$questionnumber)->where('mentoring_id',$mentoring_id);
        }])->where('id','=',$mentoring_id)->firstOrFail();
        //return $mentorings;
        #check if there is data in respon table
        $jawab=array();
        if($mentorings->respon!=null){
            #if not null than get answer value and store in array
            foreach($mentorings->respon as $key=>$respon){
                array_push($jawab,$respon->opsi_id);
            }
        }
        #get number of question
        $jumlahPertanyaan=Quesioner::where('diklat','PIM III')->where('questionfor','mentor')->get();
        $jumlahPertanyaan=count($jumlahPertanyaan);
        $pertanyaan=Quesioner::where('id',$questionnumber)->firstOrFail();
        return view('quesioner.quesionermentorpim3',compact('mentorings','pertanyaan','jumlahPertanyaan','jawab')); 
    }

    public function showQuesionerAlumniPIM3($mentoring_id,$quesioner_id)
    {
        #basicly the code for alumni and mentor is same for the controller but we make different in view
        #this code below same with above, but different in the return view
        # get id of quesioner first
        $nomor=$quesioner_id;
        $questionAlumni=Quesioner::where('diklat','PIM III')->where('questionfor','alumni')->firstOrFail();
        $quesioner_id=$questionAlumni->id+$quesioner_id-1;
        $mentorings=Mentoring::with(['respon'=>function($query) use ($quesioner_id,$mentoring_id){
            $query->where('quesioner_id',$quesioner_id)->where('mentoring_id',$mentoring_id);
        }])->where('id',$mentoring_id)->firstOrFail();
        #check if there is data in respon table
        //return $mentorings;
        $jawab=array();
        if($mentorings->respon!=null){
            #if not null than get answer value and store in array
            foreach($mentorings->respon as $key=>$respon){
                array_push($jawab,$respon->opsi_id);
            }
        }
        #get number of question
        
        $jumlahPertanyaan=Quesioner::where('diklat','PIM III')->where('questionfor','alumni')->get();
        $jumlahPertanyaan=count($jumlahPertanyaan);
        $pertanyaan=Quesioner::where('id',$quesioner_id)->firstOrFail();
        return view('quesioner.quesioneralumnipim3',compact('mentorings','pertanyaan','jumlahPertanyaan','jawab','nomor'));
    }

     public function showQuesionerMentorPIM4($mentoring_id,$questionnumber)
    {
        # show question for mentor PIM IV
        # first we select data in mentorings table and check tb respon if any answer of questionnumber 
        $nomor=$questionnumber;
        $questionMentor=Quesioner::where('diklat','PIM IV')->where('questionfor','mentor')->firstOrFail();
        $questionnumber=$questionMentor->id-1+$questionnumber;
        $mentorings=Mentoring::with(['respon'=>function($query) use ($questionnumber,$mentoring_id){
            $query->where('quesioner_id','=',$questionnumber);
        }])->where('id',$mentoring_id)->firstOrFail();
        //return $mentorings->respon;
        #check if there is data in respon table
        $jawab=array();
        if($mentorings->respon!=null){
            #if not null than get answer value and store in array
            foreach($mentorings->respon as $key=>$respon){
                array_push($jawab,$respon->opsi_id);
            }
        }
        #get number of question
        $jumlahPertanyaan=Quesioner::where('diklat','PIM IV')->where('questionfor','mentor')->get();
        $jumlahPertanyaan=count($jumlahPertanyaan);
        $pertanyaan=Quesioner::where('id',$questionnumber)->firstOrFail();

        return view('quesioner.quesionermentorpim4',compact('mentorings','pertanyaan','jumlahPertanyaan','jawab','nomor')); 
    } 

    public function showQuesionerAlumniPIM4($mentoring_id,$quesioner_id)
    {
        #basicly the code for alumni and mentor is same for the controller but we make different in view
        #this code below same with above, but different in the return view
        # get id of quesioner first
        $nomor=$quesioner_id;
        $questionAlumni=Quesioner::where('diklat','PIM IV')->where('questionfor','alumni')->firstOrFail();
        $quesioner_id=$questionAlumni->id+$quesioner_id-1;
        $mentorings=Mentoring::with(['respon'=>function($query) use ($quesioner_id,$mentoring_id){
            $query->where('quesioner_id',$quesioner_id)->where('mentoring_id',$mentoring_id);
        }])->where('id',$mentoring_id)->firstOrFail();
        #check if there is data in respon table
        $jawab=array();
        if($mentorings->respon!=null){
            #if not null than get answer value and store in array
            foreach($mentorings->respon as $key=>$respon){
                array_push($jawab,$respon->opsi_id);
            }
        }
        #get number of question
        $jumlahPertanyaan=Quesioner::where('diklat','PIM IV')->where('questionfor','alumni')->get();
        $jumlahPertanyaan=count($jumlahPertanyaan);
        $pertanyaan=Quesioner::where('id',$quesioner_id)->firstOrFail();
        return view('quesioner.quesioneralumnipim4',compact('mentorings','pertanyaan','jumlahPertanyaan','jawab','nomor'));
    }  
}
