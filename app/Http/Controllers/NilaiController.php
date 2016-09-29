<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NilaiRequest;
use App\Http\Requests\DetilNilaiRequest;
use App\Http\Requests;
use App\Nilai;
use App\MataDiklat;
use App\Widyaiswara;
use App\Angkatan;
use App\Lembaga;
use App\ItemNilai;
use App\DetilNilai;
use Barryvdh\DomPDF\Facade as PDF;
class NilaiController extends Controller
{
    //
    public function showNilai()
    {
    	# code...
    	$nilais=Nilai::all();
    	$matadiklats=MataDiklat::all();
    	$widyaiswaras=Widyaiswara::all();
    	$lembagas=Lembaga::all();
    	//return $nilai;
    	return view('nilai.tbnilai',compact('nilais','matadiklats','widyaiswaras','lembagas'));
    }

    public function addNilai(NilaiRequest $request)
    {
        # code...
        $nilai=new Nilai(array(
                'widyaiswara_id' =>$request->get('widyaiswara_id'),
                'matadiklat_id'=>$request->get('matadiklat_id'),
                'angkatan_id'=>$request->get('angkatan_id'),
                'tgl'=>$request->get('tgl'),
                'jp'=>$request->get('jp')
            ));
        $nilai->save();
        return redirect('/pengampu');
    }

    public function updateNilai(NilaiRequest $request)
    {
        # code...
        $nilai=Nilai::find($request->get('nilai_id'))->update([
                'widyaiswara_id'=>$request->get('widyaiswara_id'),
                'matadiklat_id'=>$request->get('matadiklat_id'),
                'angkatan_id'=>$request->get('angkatan_id'),
                'tgl'=>$request->get('tgl'),
                'jp'=>$request->get('jp'),
            ]);
        return $this->showNilai();
    }

    public function deleteNilai(NilaiRequest $request)
    {
        # code...
        $nilai=Nilai::find($request->get('nilai_id'))->delete();
        return $this->showNilai();
    }

    public function showDetail($nilai_id)
    {
        $nilai=Nilai::with('detilnilai')->where('id',$nilai_id)->get();
        $itemnilais=ItemNilai::where('grup','=',1)->get();
        return view('nilai.tbdetailnilaiwi',compact('nilai','itemnilais'));
    }

    public function editDetilNilai(DetilNilaiRequest $request)
    {
        $detilnilai=DetilNilai::find($request->get('detil_id'))->update([
                'nilai_id'=>$request->get('nilai_id'),
                'item_nilai_id'=>$request->get('item_nilai_id'),
                'angka'=>$request->get('nilai'),
            ]);
        return redirect('/detailnilaiwi/'.$request->get('nilai_id'));
    }

    public function CetakNilaiWi($nilai_id)
    {
        $nilai=Nilai::find($nilai_id);
        $itemnilais=ItemNilai::where('grup',1)->get();
        $detilnilais = array();
        $rata=0;
        foreach ($itemnilais as $key => $itemnilai) {
            $detil=DetilNilai::where('item_nilai_id',$itemnilai->id)->where('nilai_id',$nilai_id)->avg('angka');
            array_push($detilnilais,['urut'=>$itemnilai->urut,'uraian'=>$itemnilai->uraian,'nilai'=>round($detil)]);
            $rata=$rata+$detil;
        }
        $rata=round($rata/10);
        /*$pdf=PDF::loadView('pdfnilai.nilaiwi',compact('nilai','detilnilais','rata'));
        return $pdf->stream($nilai->widyaiswara->nama.'_'.$nilai->angkatan->angkatan.'.pdf')->header('Content-Type','application/pdf');*/
        $pdf=PDF::loadView('pdfnilai.nilaiwi',compact('nilai','detilnilais','rata'))->setPaper('Legal','portrait')->setWarnings(false);
        return $pdf->stream($nilai->widyaiswara->nama.'_'.$nilai->angkatan->angkatan.'.pdf')->header('Content-Type','application/pdf');
        //return view('pdfnilai.nilaiwi',compact('nilai','detilnilais','rata'));
    }

    public function CetakNilaiWiLedger($nilai_id)
    {
        set_time_limit(1000);
        $detilnilais=DetilNilai::where('nilai_id',$nilai_id)->get();
        $jumlahdata=count($detilnilais);
        $jumlahhalaman=ceil($jumlahdata/100);
        $indexdata = array();
        $nilai=DetilNilai::where('nilai_id',$nilai_id)->firstOrFail();
        $pdf=PDF::loadView('pdfnilai.nilaiwiledger1',compact('detilnilais','jumlahdata','nilai','jumlahhalaman','indexdata'))->setPaper('Legal','landscape')->setWarnings(false);
        return $pdf->stream('Ledger_'.$nilai->nilai->widyaiswara->nama.'_'.$nilai->nilai->angkatan->angkatan.'.pdf')->header('Content-Type','application/pdf');
        /*return view('pdfnilai.nilaiwiledger1',compact('detilnilais','jumlahdata','nilai','jumlahhalaman','indexdata'));*/
    }
}
