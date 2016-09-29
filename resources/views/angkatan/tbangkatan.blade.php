@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Master Data</a></li>
              <li class="active"><a href="{{url('/angkatan')}}">Penyelenggara Diklat</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-home"></span> Penyelenggaraan Diklat / Angkatan Diklat</div>
                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nama Lembaga Diklat Penyelenggara</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($lembagas as $key=>$lembaga)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$lembaga->nama}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#addAngkatan" data-lembaga_id="{{$lembaga->id}}" data-nama="{{$lembaga->nama}}" ><span class="glyphicon glyphicon-plus col-sm-offset-3"></span> Diklat</a>
                                        <a href="{{url('/angkatan/'.$lembaga->id)}}"><span class="glyphicon glyphicon-search col-offset-sm-3"></span> Detail</a>
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
@include('angkatan.addangkatanmodal')
@endsection
