@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Master Data</a></li>
              <li class="active"><a href="{{url('/lembaga')}}">Penyelenggara Diklat</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-home"></span> Lembaga Penyelenggara Diklat
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addLembaga" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nama Lembaga Diklat</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($lembagas as $key=>$lembaga)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$lembaga->nama}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#editLembaga" data-lembaga_id="{{$lembaga->id}}" data-nama="{{$lembaga->nama}}" ><span class="glyphicon glyphicon-pencil col-sm-offset-3"></span></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{url('/lembaga/delete')}}/{{$lembaga->id}}"><span class="glyphicon glyphicon-trash"></span></a>
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
@include('lembaga.addlembagamodal')
@include('lembaga.editlembagamodal')
@endsection
