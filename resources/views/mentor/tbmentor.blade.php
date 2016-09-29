@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Pasca Diklat</a></li>
              <li class="active"><a href="{{url('/mentor')}}">Mentor</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Mentor Peserta Diklat
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addMentorModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nip Mentor</th>
                            <th>Nama Mentor</th>
                            <th>Telp/Hp</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Unit Kerja</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($mentors as $key=>$mentor)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$mentor->nip}}</td>
                                    <td>{{$mentor->name}}</td>
                                    <td>{{$mentor->hp}}</td>
                                    <td>{{$mentor->email}}</td>
                                    <td>{{$mentor->jabatan}}</td>
                                    <td>{{$mentor->unitkerja}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#mentorModal" data-mentor_id="{{$mentor->id}}" data-nip="{{$mentor->nip}}" data-name="{{$mentor->name}}" data-hp="{{$mentor->hp}}" data-email="{{$mentor->email}}" data-jabatan="{{$mentor->jabatan}}" data-unitkerja="{{$mentor->unitkerja}}" ><span class="glyphicon glyphicon-pencil col-sm-offset-3"></span></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('/mentor') }}/{{$mentor->id}}"><span class="glyphicon glyphicon-trash"></span></a>
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
@include('mentor.addmentormodal');
@include('mentor.editmentormodal');
@endsection
