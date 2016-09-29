@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        @foreach($lembagas as $key=>$lembaga)
        @endforeach
        <div class="col-sm-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Master Data</a></li>
              <li><a href="{{url('/angkatan')}}">Angkatan Diklat</a></li>
              <li class="active"><a href="{{url('/angkatan/'.$lembaga->id)}}">Detail Angkatan Diklat</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-file"></span> Diklat Yang Pernah Diselenggarakan Oleh : {{$lembaga->nama}}</div>
                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nama Diklat</th>
                            <th>Jenis Diklat</th>
                            <th>Angkatan</th>
                            <th>Tahun Pelaksanaan</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($lembaga->angkatan as $key=>$angk)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$angk->nama_diklat}}</td>
                                    <td>{{$angk->jenis_diklat}}</td>
                                    <td>{{$angk->angkatan}}</td>
                                    <td>{{$angk->tahun}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#detailAngkatan" data-lembaga_id="{{$lembaga->id}}" data-angkatan_id="{{$angk->id}}" data-nama_diklat="{{$angk->nama_diklat}}" data-jenis_diklat="{{$angk->jenis_diklat}}" data-angkatan="{{$angk->angkatan}}" data-tahun="{{$angk->tahun}}" ><span class="glyphicon glyphicon-ok-circle"></span> Edit</a>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#delAngkatan" data-lembaga_id="{{$lembaga->id}}" data-nama_lembaga="{{$lembaga->nama}}" data-angkatan_id="{{$angk->id}}" data-nama_diklat="{{$angk->nama_diklat}}" data-angkatan="{{$angk->angkatan}}" data-tahun="{{$angk->tahun}}" ><span class="glyphicon glyphicon-remove-circle"></span> Hapus</a>
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
@include('angkatan.editdetailangkatanmodal',compact('lem'))
@include('angkatan.deldetailangkatanmodal')
@endsection
