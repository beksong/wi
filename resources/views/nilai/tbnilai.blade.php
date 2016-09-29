@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Monev Widyaiswara</a></li>
              <li class="active"><a href="{{url('/pengampu')}}">Nama Diklat dan Mata Diklat Yang Diampu Widyaiswara</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Detail Nama Diklat dan Mata Diklat Yang Diampu Widyaiswara
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addpenilaianwidyaiswaramodal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th class="col-sm-1">#</th>
                            <th class="col-sm-2">Nama Widyaisara</th>
                            <th class="col-sm-3">Nama Diklat</th>
                            <th class="col-sm-1">Angkatan</th>
                            <th class="col-sm-2">Nama Mata Diklat</th>
                            <th class="col-sm-1">Tanggal Pelaksanaan</th>
                            <th class="col-sm-1">Jumlah JP</th>
                            <th class="col-sm-1">Action</th>
                        </thead>
                        <tbody>
                           @foreach($nilais as $key=>$nilai)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$nilai->widyaiswara->nama}}</td>
                                    <td>{{$nilai->angkatan->nama_diklat}}</td>
                                    <td>{{$nilai->angkatan->angkatan}}</td>
                                    <td>{{$nilai->matadiklat->nama}}</td>
                                    <td>{{$nilai->tgl}}</td>
                                    <td>{{$nilai->jp}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#editpenilaianwidyaiswaramodal" data-nilai_id="{{$nilai->id}}" data-widyaiswara_id="{{$nilai->widyaiswara->id}}" data-widyaiswara_nama="{{$nilai->widyaiswara->nama}}" data-lembaga_id="{{$nilai->angkatan->lembaga->id}}" data-lembaga_nama="{{$nilai->angkatan->lembaga->nama}}" data-angkatan_id="{{$nilai->angkatan->id}}" data-angkatan_namadiklat="{{$nilai->angkatan->nama_diklat}}" data-matadiklat_id="{{$nilai->matadiklat->id}}" data-matadiklat_nama="{{$nilai->matadiklat->nama}}" data-tgl="{{$nilai->tgl}}" data-jp="{{$nilai->jp}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#delpenilaianwidyaiswaramodal" data-nilai_id="{{$nilai->id}}" data-widyaiswara_id="{{$nilai->widyaiswara->id}}" data-widyaiswara_nama="{{$nilai->widyaiswara->nama}}" data-lembaga_id="{{$nilai->angkatan->lembaga->id}}" data-lembaga_nama="{{$nilai->angkatan->lembaga->nama}}" data-angkatan_id="{{$nilai->angkatan->id}}" data-angkatan_namadiklat="{{$nilai->angkatan->nama_diklat}}" data-matadiklat_id="{{$nilai->matadiklat->id}}" data-matadiklat_nama="{{$nilai->matadiklat->nama}}" data-tgl="{{$nilai->tgl}}" data-jp="{{$nilai->jp}}"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="{{url('/detailnilaiwi')}}/{{$nilai->id}}" ><span class="glyphicon glyphicon-search"></span></a>
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
@include('nilai.addpenilaianwidyaiswaramodal',compact('matadiklats','angkatans','widyaiswaras'))
@include('nilai.editpenilaianwidyaiswaramodal',compact('matadiklats','angkatans','widyaiswaras'))
@include('nilai.delpenilaianwidyaiswaramodal',compact('matadiklats','angkatans','widyaiswaras'))
@endsection
