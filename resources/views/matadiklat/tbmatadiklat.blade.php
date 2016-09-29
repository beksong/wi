@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Master Data</a></li>
              <li class="active"><a href="{{url('/matadiklat')}}">Mata Diklat</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-book"></span> Detail Data Mata Diklat
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addmatadiklatModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nama Mata Diklat</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($matadiklats as $key=>$matadiklat)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$matadiklat->nama}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#editmatadiklatmodal" data-matadiklat_id="{{$matadiklat->id}}"  data-nama="{{$matadiklat->nama}}" ><span class="glyphicon glyphicon-pencil col-sm-offset-3"></span></a>&nbsp;&nbsp;&nbsp;
                                        <a href="#" id="edit" data-toggle="modal" data-target="#deletematadiklatmodal" data-matadiklat_id="{{$matadiklat->id}}"  data-nama="{{$matadiklat->nama}}" ><span class="glyphicon glyphicon-trash col-sm-offset-3"></span></a>&nbsp;&nbsp;&nbsp;
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
@include('matadiklat.addmatadiklatmodal')
@include('matadiklat.editmatadiklatmodal')
@include('matadiklat.deletematadiklatmodal')
@endsection
