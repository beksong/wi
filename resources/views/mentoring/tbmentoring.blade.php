@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Pasca Diklat</a></li>
              <li class="active"><a href="{{url('/mentoring')}}">Mentoring</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-folder-open"></span> List Info Mentor dan Alumni
                    <div><a href="#" id="add" data-toggle="modal" data-target="#addMentoringModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th  class="col-sm-2">Nama Mentor</th>
                            <th  class="col-sm-2">Nama Alumni</th>
                            <th  class="col-sm-2">Penyelenggara Diklat</th>
                            <th  class="col-sm-2">Nama Diklat</th>
                            <th class="col-sm-1">Jenis Diklat</th>
                            <th class="col-sm-1">Angkatan</th>
                            <th class="col-sm-2">Judul Proyek Perubahan</th>
                            <th  class="col-sm-1">Action</th>
                        </thead>
                        <tbody>
                            @foreach($mentorings as $key=>$mentoring)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    @if($mentoring->mentor==null)
                                        <td></td>
                                    @else
                                        <td>{{$mentoring->mentor->name}}</td>
                                    @endif

                                    @if($mentoring->alumni==null)
                                        <td></td>
                                    @else
                                        <td>{{$mentoring->alumni->name}}</td>
                                    @endif

                                    @if($mentoring->angkatan==null)
                                        <td></td>
                                    @else
                                       <td>{{$mentoring->angkatan->lembaga->nama}}</td>
                                    @endif

                                    @if($mentoring->angkatan==null)
                                        <td></td>
                                    @else
                                       <td>{{$mentoring->angkatan->nama_diklat}}</td>
                                    @endif

                                    @if($mentoring->angkatan==null)
                                        <td></td>
                                    @else
                                       <td>{{$mentoring->angkatan->jenis_diklat}}</td>
                                    @endif

                                    @if($mentoring->angkatan==null)
                                        <td></td>
                                    @else
                                       <td>{{$mentoring->angkatan->angkatan}}</td>
                                    @endif

                                    @if($mentoring->angkatan==null)
                                        <td></td>
                                    @else
                                       <td>{{$mentoring->judulpp}}</td>
                                    @endif

                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#editMentoringModal" data-mentoring_id="{{$mentoring->id}}" data-mentor_id="{{$mentoring->mentor->id}}" data-alumni_id="{{$mentoring->alumni->id}}" data-lembaga_id="{{$mentoring->angkatan->lembaga->id}}" data-status_mentor_diklat="{{$mentoring->status_mentor_diklat}}" data-status_mentor_skrg="{{$mentoring->status_mentor_skrg}}" data-angkatan_id="{{$mentoring->angkatan->id}}" data-angkatan_nama="{{$mentoring->angkatan->nama_diklat}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="#" data-toggle="modal" data-target="#delMentoringModal" data-mentoring_id="{{$mentoring->id}}" data-mentor_id="{{$mentoring->mentor->id}}" data-alumni_id="{{$mentoring->alumni->id}}" data-lembaga_id="{{$mentoring->angkatan->lembaga->id}}" data-status_mentor_diklat="{{$mentoring->status_mentor_diklat}}" data-status_mentor_skrg="{{$mentoring->status_mentor_skrg}}" data-angkatan_id="{{$mentoring->angkatan->id}}" data-angkatan_nama="{{$mentoring->angkatan->nama_diklat}}"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="{{url('/mentoring/detil/'.$mentoring->id)}}"><span class="glyphicon glyphicon-search"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('mentoring.addmentoringmodal',compact(['mentors','alumnis','angkatans']))
@include('mentoring.delmentoringmodal',compact(['mentors','alumnis','angkatans']))
@include('mentoring.editmentoringmodal',compact(['mentors','alumnis','angkatans']))
@endsection
