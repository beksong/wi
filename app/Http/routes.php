<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
** Route for login user
 */
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    // return what you want
    return view('welcome');
});

Route::group(['middleware'=>['web']],function(){
	Route::get('/',function(){
		if(Auth::check())
		{
			$user=Auth::user();
			//$user=App\User::where('id',$userid)->get();
			$roleUser=$user->roles()->get();
			//return $roleUser;
			if(count($roleUser)!=0)
			{
				//here user will be if user has role
				return view('welcomelogin',compact('roleUser'));
			}
		}
		return view('welcome');
	});
});

Route::auth();

Route::group(['middleware'=>['web','auth','role:admin']],function(){
	//admin controller
	Route::get('/assignrole','AdminControllerManageUser@tbUser');
	/*Route::get('assignrole/{user_id}',function($user_id){
		$grants=App\User::where('id',$user_id)->get();
		return Response::json($grants);
	});*/
	Route::post('/assignrole','AdminControllerManageUser@assignRole');
	Route::post('/removerole','AdminControllerManageUser@removeRole');
});

Route::group(['middleware'=>['web','auth','role:user']],function(){
	//route to handle mentor
	Route::get('/mentor','MentorController@showMentor');
	Route::post('/mentor/add','MentorController@saveMentor');
	Route::get('/mentor/{mentor_id}','MentorController@deleteMentor');
	Route::post('/editmentor','MentorController@editMentor');
});

Route::group(['middleware'=>['web','auth','role:user']],function(){
	Route::get('/alumni','AlumniController@showAlumni');
	Route::post('/alumni/add','AlumniController@saveAlumni');
	Route::post('/alumni/edit','AlumniController@editAlumni');
	Route::get('/alumni/{alumni_id}','AlumniController@deleteAlumni');
});

Route::group(['middleware'=>['web','auth','role:user']],function(){
	//Route to handle lembaga
	Route::get('/lembaga','LembagaController@showLembaga');
	Route::post('/lembaga','LembagaController@addLembaga');
	Route::post('/lembaga/edit','LembagaController@editLembaga');
	Route::get('/lembaga/delete/{lembaga_id}','LembagaController@deleteLembaga');
});

Route::group(['middleware'=>['web','auth','role:user']],function(){
	//Route to handle Angkatan
	Route::get('/angkatan','AngkatanController@showAngkatan');
	Route::post('/angkatan','AngkatanController@addAngkatan');
	Route::get('/angkatan/{lembaga_id}','AngkatanController@detailAngkatan');
	Route::post('/angkatan/edit','AngkatanController@editAngkatan');
	Route::post('/angkatan/delete','AngkatanController@delAngkatan');
});

Route::group(['middleware'=>['web','auth','role:user']],function(){
	//Route to handle Master Quesioner
	Route::get('/mquesioner','Mquesioner@showQuesioner');
	Route::post('/mquesioner/add','Mquesioner@addQuesioner');
	Route::post('/mquesioner/edit','Mquesioner@editQuesioner');
	Route::post('/mquesioner/del','Mquesioner@delQuesioner');
	Route::post('/opsimquesioner/add',function(){
		$uraian=Input::get('uraian');
		if($uraian==null){
			$uraian='0';
		}else{
			$uraian='1';
		}
		$opsi=new App\Opsi([
				'quesioner_id'=>Input::get('question_id'),
				'pilihan'=>Input::get('pilihan'),
				'uraian'=>$uraian,
			]);
		$opsi->save();
		return redirect('/mquesioner');
	});

	Route::post('/opsimquesioner/edit',function(){
		$uraian=Input::get('uraian');
		if($uraian==null){
			$uraian='0';
		}else{
			$uraian='1';
		}
		$opsi=App\Opsi::find(Input::get('opsi_id'))->update([
				'pilihan'=>Input::get('pilihan'),
				'uraian'=>$uraian,
			]);
		return redirect('/mquesioner');
	});

	Route::post('/opsimquesioner/del',function(){
		$opsi=App\Opsi::find(Input::get('opsi_id'))->delete();
		return redirect('/mquesioner');
	});
});


Route::group(['middleware'=>['web','auth','role:user']],function(){
	//Route to handle Widyaiswara
	Route::get('/widyaiswara','WidyaiswaraController@showWidyaiswara');
	Route::post('/widyaiswara/add','WidyaiswaraController@addWidyaiswara');
	Route::post('/widyaiswara/edit','WidyaiswaraController@editWidyaiswara');
	Route::post('/widyaiswara/delete','WidyaiswaraController@deleteWidyaiswara');
});

Route::group(['middleware'=>['web','auth','role:user|admin']],function(){
	//Route to handle Widyaiswara
	Route::get('/matadiklat','MataDiklatController@showMataDiklat');
	Route::post('/matadiklat/add','MataDiklatController@addMataDiklat');
	Route::post('/matadiklat/edit','MataDiklatController@editMataDiklat');
	Route::post('/matadiklat/delete','MataDiklatController@deleteMataDiklat');
});

Route::group(['middleware'=>['web','auth','role:user|admin']],function(){
	//Route to handle monev Widyaiswara
	Route::get('/pengampu','NilaiController@showNilai');
	Route::get('/lembaga/{lembaga_id}',function($lembaga_id){
		$angkatans=App\Angkatan::where('lembaga_id','=',$lembaga_id)->get();
		return Response::json($angkatans);
	});
	Route::post('/nilai/add','NilaiController@addNilai');
	Route::post('/nilai/update','NilaiController@updateNilai');
	Route::post('/nilai/delete','NilaiController@deleteNilai');
	Route::get('/detailnilaiwi/{nilai_id}','NilaiController@showDetail');
	Route::post('/detailnilaiwi/edit','NilaiController@editDetilNilai');
	Route::post('/detailnilaiwi/add',function(){
		//$a=Input::all();
		$itemnilai=Input::get('itemnilai_id');
		$nilai=Input::get('nilai');
		$nilai_id=Input::get('nilai_id');
		//return Response::json($itemnilai);
		for($i=0;$i<count($itemnilai);$i++) {
			$detil=new App\DetilNilai([
					'nilai_id'=>Input::get('nilai_id'),
					'item_nilai_id'=>$itemnilai[$i],
					'angka'=>$nilai[$i],
				]);
           $detil->save();
		}
		 return Redirect('/detailnilaiwi/'.$nilai_id);
	});
	/*Route::post('/detailnilaiwi/add','NilaiController@addDetilNilai');*/
});

Route::group(['middleware'=>['web','auth','role:user|admin']],function(){
	//Route to handle Mentoring between mentors and alumnis
	Route::get('/mentoring','MentoringController@showMentoring');
	Route::post('/mentoring/add','MentoringController@addMentoring');
	Route::post('/mentoring/edit','MentoringController@editMentoring');
	Route::post('/mentoring/delete',function(){
		$mentoring_id=Input::get('mentoring_id');
		$mentoring=App\Mentoring::find($mentoring_id)->delete();
		return redirect('/mentoring');
	});
	Route::get('/mentoring/detil/{mentoring_id}','MentoringController@showDetil');
});

Route::group(['middleware'=>['web','auth','role:user|admin']],function(){
	//Route to handle Quesioner 
	Route::get('/quesioner/mentor/PIM III/{mentoring_id}/{questionnumber}','QuesionerController@showQuesionerMentorPIM3');
	Route::post('/quesioner/mentor/PIM III/add',function(){
		$quesioner_id=Input::get('quesioner_id');
		$mentoring_id=Input::get('mentoring_id');
		$mentorings=App\Mentoring::with(['respon'=>function($query) use ($quesioner_id,$mentoring_id){
			$query->where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id);
		}])->where('id',$mentoring_id)->firstOrFail();

		//check is_exist respon value on table based on above query
		
		if(count($mentorings->respon)!=null){
			//delete an existing data first then insert new data
			$respon=App\respon::where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id)->delete();	
		}

		if(Input::get('uraian')!=null){
			for($i=0;$i<count(Input::get('opsi_id'));$i++){
				for($j=0;$j<count(Input::get('uraian'));$j++){
					$jawab=new App\respon([
						'mentoring_id'=>$mentoring_id,
						'quesioner_id'=>$quesioner_id,
						'opsi_id'=>Input::get('opsi_id')[$i],
						'answer'=>Input::get('uraian')[$j],
						'answerof'=>'mentor',
					]);
					$jawab->save();
				}
			}
		}else{
			for($i=0;$i<count(Input::get('opsi_id'));$i++){
				$jawab=new App\respon([
						'mentoring_id'=>$mentoring_id,
						'quesioner_id'=>$quesioner_id,
						'opsi_id'=>Input::get('opsi_id')[$i],
						'answer'=>'',
						'answerof'=>'mentor',
					]);
				$jawab->save();
			}
		}
		return redirect('/quesioner/mentor/PIM III/'.$mentoring_id.'/'.$quesioner_id);
	});

	Route::get('/quesioner/alumni/PIM III/{mentoring_id}/{quesioner_id}','QuesionerController@showQuesionerAlumniPIM3');
	Route::post('/quesioner/alumni/PIM III/add/{nomor}',function($nomor){
		$quesioner_id=Input::get('quesioner_id');
		$mentoring_id=Input::get('mentoring_id');
		#search Mentoring with respon
		$mentorings=App\Mentoring::with(['respon'=>function($query) use ($quesioner_id,$mentoring_id){
			$query->where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id);
		}])->where('id',$mentoring_id)->firstOrFail();

		if(count($mentorings->respon)!=null){
			$respon=App\respon::where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id)->delete();			
		}

		if(Input::get('opsi_id')!=null){
			for($i=0;$i<count(Input::get('opsi_id'));$i++){
				for ($j=0; $j<count(Input::get('uraian')); $j++) { 
					$jawab=new App\respon([
						'mentoring_id'=>$mentoring_id,
						'quesioner_id'=>$quesioner_id,
						'opsi_id'=>Input::get('opsi_id')[$i],
						'answer'=>Input::get('uraian')[$j],
						'answerof'=>'alumni',
					]);
					$jawab->save();	
				}
			}

		}
		return redirect('/quesioner/alumni/PIM III/'.$mentoring_id.'/'.$nomor);
	});

	Route::get('/quesioner/mentor/PIM IV/{mentoring_id}/{questionnumber}','QuesionerController@showQuesionerMentorPIM4');
	Route::post('/quesioner/mentor/PIM IV/add/',function(){
		$nomor=Input::get('nomor');
		$quesioner_id=Input::get('quesioner_id');
		$mentoring_id=Input::get('mentoring_id');
		$mentorings=App\Mentoring::with(['respon'=>function($query) use ($quesioner_id,$mentoring_id){
			$query->where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id);
		}])->where('id',$mentoring_id)->firstOrFail();

		//check is_exist respon value on table based on above query
		
		if(count($mentorings->respon)!=null){
			//delete an existing data first then insert new data
			$respon=App\respon::where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id)->delete();	
		}

		if(Input::get('uraian')!=null){
			for($i=0;$i<count(Input::get('opsi_id'));$i++){
				for($j=0;$j<count(Input::get('uraian'));$j++){
					$jawab=new App\respon([
						'mentoring_id'=>$mentoring_id,
						'quesioner_id'=>$quesioner_id,
						'opsi_id'=>Input::get('opsi_id')[$i],
						'answer'=>Input::get('uraian')[$j],
						'answerof'=>'mentor',
					]);
					$jawab->save();
				}
			}
		}else{
			for($i=0;$i<count(Input::get('opsi_id'));$i++){
				$jawab=new App\respon([
						'mentoring_id'=>$mentoring_id,
						'quesioner_id'=>$quesioner_id,
						'opsi_id'=>Input::get('opsi_id')[$i],
						'answer'=>'',
						'answerof'=>'mentor',
					]);
				$jawab->save();
			}
		}
		return redirect('/quesioner/mentor/PIM IV/'.$mentoring_id.'/'.$nomor);
	});
	Route::get('/quesioner/alumni/PIM IV/{mentoring_id}/{quesioner_id}','QuesionerController@showQuesionerAlumniPIM4');
	Route::post('/quesioner/alumni/PIM IV/add/{nomor}',function($nomor){
		$quesioner_id=Input::get('quesioner_id');
		$mentoring_id=Input::get('mentoring_id');
		#search Mentoring with respon
		$mentorings=App\Mentoring::with(['respon'=>function($query) use ($quesioner_id,$mentoring_id){
			$query->where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id);
		}])->where('id',$mentoring_id)->firstOrFail();
		if(count($mentorings->respon)!=null){
			$respon=App\Respon::where('mentoring_id',$mentoring_id)->where('quesioner_id',$quesioner_id)->delete();			
		}

		if(Input::get('opsi')!=null){
			for($i=0;$i<count(Input::get('opsi'));$i++){
				$jawab=new App\respon([
					'mentoring_id'=>$mentoring_id,
					'quesioner_id'=>$quesioner_id,
					'opsi_id'=>Input::get('opsi')[$i],
					'answer'=>'',
					'answerof'=>'alumni',
				]);
				$jawab->save();
			}
		}elseif (Input::get('tbopsi')!=null) {
			for($i=0;$i<count(Input::get('tbopsi'));$i++){
				$jawab=new App\respon([
						'mentoring_id'=>$mentoring_id,
						'quesioner_id'=>$quesioner_id,
						'opsi_id'=>'0',
						'answer'=>Input::get('tbopsi')[$i],
						'answerof'=>'alumni',
					]);
				$jawab->save();
			}
		}else{
			$jawab=new App\respon([
				'mentoring_id'=>$mentoring_id,
				'quesioner_id'=>$quesioner_id,
				'opsi_id'=>'0',
				'answer'=>Input::get('uraian'),
				'answerof'=>'alumni',
			]);
			$jawab->save();
		}
		return redirect('/quesioner/alumni/PIM IV/'.$mentoring_id.'/'.$nomor);
	});
});

Route::group(['middleware'=>['web','auth','role:user|admin']],function(){
	#Route to handle report of quesioner
	Route::get('/cetakquesioner/mentor/PIM III/{mentoring_id}','PdfReportQuesioner@ReportMentorPIM3');
	Route::get('/cetakquesioner/alumni/PIM III/{mentoring_id}','PdfReportQuesioner@ReportAlumniPIM3');
	Route::get('/cetakquesioner/mentor/PIM IV/{mentoring_id}','PdfReportQuesioner@ReportMentorPIM4');
	Route::get('/cetakquesioner/alumni/PIM IV/{mentoring_id}','PdfReportQuesioner@ReportAlumniPIM4');
});

//Route to handle printing Nilai wi
Route::group(['middleware'=>['web','auth','role:user|admin']],function(){
	Route::get('/cetaknilai/{nilai_id}','NilaiController@CetakNilaiWi');
	Route::get('/cetakledger/{nilai_id}','NilaiController@CetakNilaiWiLedger');
});
