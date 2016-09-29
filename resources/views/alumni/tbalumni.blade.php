@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--end panel form mentor-->
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Pasca Diklat</a></li>
              <li class="active"><a href="{{url('/alumni')}}">Alumni Diklat</a></li>
            </ol>
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Data Alumni Diklat
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addAlumniModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nip Alumni</th>
                            <th>Nama Alumni</th>
                            <th>Telp/Hp</th>
                            <th>Email</th>
                            <th>Unit Kerja Sekarang</th>
                            <th>Jabatan saat mengikuti Diklat</th>
                            <th>Jabatan Saat Ini</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($alumnis as $key=>$alumni)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$alumni->nip}}</td>
                                    <td>{{$alumni->name}}</td>
                                    <td>{{$alumni->hp}}</td>
                                    <td>{{$alumni->email}}</td>
                                    <td>{{$alumni->unitkerja_skrg}}</td>
                                    <td>{{$alumni->unitkerja_diklat}}</td>
                                    <td>{{$alumni->jabatan}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#editAlumni" data-alumni_id="{{$alumni->id}}" data-nip="{{$alumni->nip}}" data-hp="{{$alumni->hp}}" data-name="{{$alumni->name}}" data-email="{{$alumni->email}}" data-unitkerja_skrg="{{$alumni->unitkerja_skrg}}" data-unitkerja_diklat="{{$alumni->unitkerja_diklat}}" data-jabatan="{{$alumni->jabatan}}"><span class="glyphicon glyphicon-pencil col-sm-offset-3"></span></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('/alumni') }}/{{$alumni->id}}"><span class="glyphicon glyphicon-trash"></span></a>
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
@include('alumni.addalumnimodal')
@include('alumni.editalumnimodal')
@endsection
