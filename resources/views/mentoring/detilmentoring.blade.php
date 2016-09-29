@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Pasca Diklat</a></li>
              <li><a href="{{url('/mentoring')}}">Mentoring</a></li>
              <li class="active"><a href="{{url('/mentoring/detil/'.$mentorings->id)}}">Detil Mentoring</a></li>
            </ol>
            <!--end panel form mentor-->
         </div>
        </div>
        <div class="row">
            <!--left side control-->
            <div class="col-sm-4">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="glyphicon glyphicon-pencil"></i> Input Quesioner Baru Quesioner Mentor / Alumni</div>
                        <div class="panel-body">
                            <div class="col-sm-12"><a href="{{url('/quesioner/mentor/'.$mentorings->angkatan->jenis_diklat.'/'.$mentorings->id.'/1')}}"><span class="glyphicon glyphicon-pencil"></span> Input Quesioner Pasca Diklat Mentor</a></div>
                            <div class="col-sm-12"><a href="{{url('/quesioner/alumni/'.$mentorings->angkatan->jenis_diklat.'/'.$mentorings->id.'/1')}}"><span class="glyphicon glyphicon-pencil"></span> Input Quesioner Pasca Diklat Alumni</a></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="glyphicon glyphicon-print"></i> Cetak Quesioner Mentor / Alumni Diklat</div>
                        <div class="panel-body">
                            <div class="col-sm-12"><a href="{{url('/cetakquesioner/mentor/'.$mentorings->angkatan->jenis_diklat.'/'.$mentorings->id)}}"><span class="glyphicon glyphicon-print"></span> Quesioner Pasca Diklat Mentor</a></div>
                            <div class="col-sm-12"><a href="{{url('/cetakquesioner/alumni/'.$mentorings->angkatan->jenis_diklat.'/'.$mentorings->id)}}"><span class="glyphicon glyphicon-print"></span> Quesioner Pasca Diklat Alumni</a></div>
                        </div>
                    </div>
                </div>

            </div>
            <!--right side for info-->
            <div class="col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-folder-open"></span> Detail Informasi Mentor dan Alumni
                    </div>

                    <div class="panel-body">
                        <!--Mentor Table-->
                        <div class="row">
                            <legend>Identitas Mentor</legend>
                            <div class="col-sm-5"><strong>Nip Mentor</strong></div><div class="col-sm-7">: {{$mentorings->mentor->nip}}</div>
                            <div class="col-sm-5"><strong>Nama Mentor</strong></div><div class="col-sm-7">: {{$mentorings->mentor->name}}</div>
                            <div class="col-sm-5"><strong>Nomor Hp</strong></div><div class="col-sm-7">: {{$mentorings->mentor->hp}}</div>
                            <div class="col-sm-5"><strong>Email Mentor</strong></div><div class="col-sm-7">: {{$mentorings->mentor->email}}</div>
                            <div class="col-sm-5"><strong>Jabatan Mentor</strong></div><div class="col-sm-7">: {{$mentorings->mentor->jabatan}}</div>
                            <div class="col-sm-5"><strong>Unit Kerja Mentor</strong></div><div class="col-sm-7">: {{$mentorings->mentor->unitkerja}}</div>
                            <div class="col-sm-5"><strong>Status Mentor Saat Diklat</strong></div><div class="col-sm-7">: {{$mentorings->status_mentor_diklat}}</div>
                            <div class="col-sm-5"><strong>Status Mentor Saat Ini</strong></div><div class="col-sm-7">: {{$mentorings->status_mentor_skrg}}</div>
                            
                            <legend>Identitas Alumni/Peserta Diklat</legend>
                            <div class="col-sm-5"><strong>Nip Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->nip}}</div>
                            <div class="col-sm-5"><strong>Nama Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->name}}</div>
                            <div class="col-sm-5"><strong>Nomor Hp</strong></div><div class="col-sm-7">: {{$mentorings->alumni->hp}}</div>
                            <div class="col-sm-5"><strong>Email Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->email}}</div>
                            <div class="col-sm-5"><strong>Jabatan Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->jabatan}}</div>
                            <div class="col-sm-5"><strong>Unit Kerja Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->unitkerja_skrg}}</div>
                                               
                            <legend>Informasi Diklat Yang Diikuti Alumni</legend>
                            <div class="col-sm-5"><strong>Nama Diklat Yang Diikuti</strong></div><div class="col-sm-7">: {{$mentorings->angkatan->nama_diklat}}</div>
                            <div class="col-sm-5"><strong>Angkatan Diklat Yang Diikuti</strong></div><div class="col-sm-7">: {{$mentorings->angkatan->angkatan}}</div>
                            <div class="col-sm-5"><strong>Tahun Pelaksanaan Diklat</strong></div><div class="col-sm-7">: {{$mentorings->angkatan->tahun}}</div>
                            <div class="col-sm-5"><strong>Lembaga Penyelenggara Diklat</strong></div><div class="col-sm-7">: {{$mentorings->angkatan->lembaga->nama}}</div>
                            <div class="col-sm-5"><strong>Jabatan Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->jabatan}}</div>
                            <div class="col-sm-5"><strong>Unit Kerja Alumni</strong></div><div class="col-sm-7">: {{$mentorings->alumni->unitkerja_skrg}}</div>
                        </div>
                    </div><!--End Panel Body-->
                </div><!--end panel-->
            </div>
        </div>
    </div>
</div>
@endsection
