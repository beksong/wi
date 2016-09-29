<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mentoring;
use App\Quesioner;
use App\respon;
use App\Opsi;
class PdfReportQuesioner extends Controller
{
    //
    public function ReportMentorPIM3($mentoring_id)
    {
    	$mentorings=Mentoring::with(['respon'=>function($query){
    		$query->where('answerof','mentor');
    	}])->where('id',$mentoring_id)->firstOrFail();
    	$pdf=PDF::loadView('pdf.quesionermentorpim3',compact('mentorings'));
        return $pdf->stream();
    }

    public function ReportAlumniPIM3($mentoring_id)
    {
        $mentorings=Mentoring::with(['respon'=>function($query){
            $query->where('answerof','alumni');
        }])->where('id',$mentoring_id)->firstOrFail();
        //return $mentorings->respon;
        $quesioners=Quesioner::with(['respon'=>function($query) use($mentoring_id){
            $query->where('mentoring_id',$mentoring_id)->where('answerof','alumni');
        }])->where('diklat','PIM III')->where('questionfor','alumni')->get();
        
        $pdf=PDF::loadView('pdf.quesioneralumnipim3',compact('mentorings','quesioners'));
        return $pdf->stream('quesioneralumni'.$mentoring_id.'.pdf');
    }

     public function ReportMentorPIM4($mentoring_id)
    {
        $mentorings=Mentoring::with(['respon'=>function($query){
            $query->where('answerof','mentor');
        }])->where('id',$mentoring_id)->firstOrFail();

        $pdf=PDF::loadView('pdf.quesionermentorpim4',compact('mentorings'));
        return $pdf->stream();
    }

    public function ReportAlumniPIM4($mentoring_id)
    {
        $mentorings=Mentoring::with(['respon'=>function($query){
            $query->where('answerof','alumni');
        }])->where('id',$mentoring_id)->firstOrFail();
        //return $mentorings->respon;
        $quesioners=Quesioner::with(['respon'=>function($query) use($mentoring_id){
            $query->where('mentoring_id',$mentoring_id)->where('answerof','alumni');
        }])->where('diklat','PIM IV')->where('questionfor','alumni')->get();
        
        $pdf=PDF::loadView('pdf.quesioneralumnipim4',compact('mentorings','quesioners'));
        return $pdf->stream('quesioneralumni'.$mentoring_id.'.pdf');
    }
}
