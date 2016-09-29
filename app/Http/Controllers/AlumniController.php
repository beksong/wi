<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AlumniRequest;
use App\Alumni;
class AlumniController extends Controller
{
    //
    public function showAlumni()
    {
    	$alumnis=Alumni::all();
    	return view('alumni.tbalumni',compact('alumnis'));
    }

    public function showForm()
    {
    	return view('alumni.frmalumni');
    }

    public function saveAlumni(AlumniRequest $request)
    {
        # code...
        $alumni=new Alumni(array(
            'nip' =>$request->get('nip'),
            'name' =>$request->get('name'),
            'hp'=>$request->get('hp'),
            'email'=>$request->get('email'),
            'unitkerja_skrg'=>$request->get('unitkerja_skrg'),
            'unitkerja_diklat'=>$request->get('unitkerja_diklat'),
            'jabatan'=>$request->get('jabatan'), 
        ));
        $alumni->save();
        return $this->showAlumni();
    }

    public function deleteAlumni($alumni_id)
    {
        $alumni=Alumni::where('id',$alumni_id)->delete();
        return $this->showAlumni();
    }

    public function editAlumni(AlumniRequest $request)
    {
        # code...
        $alumni=Alumni::find($request->get('alumni_id'))->update([
                'nip'=>$request->get('nip'),
                'name'=>$request->get('name'),
                'hp'=>$request->get('hp'),
                'email'=>$request->get('email'),
                'unitkerja_skrg'=>$request->get('unitkerja_skrg'),
                'unitkerja_diklat'=>$request->get('unitkerja_diklat'),
                'jabatan'=>$request->get('jabatan'),
            ]);
        return $this->showAlumni();
    }
}
