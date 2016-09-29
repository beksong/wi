@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Master Data</a></li>
              <li class="active"><a href="{{url('/widyaiswara')}}">Widyaiswara</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Detail Data Widyaiswara
                    <div><a href="#" id="edit" data-toggle="modal" data-target="#addWidyaiswaraModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah</a></div>
                </div>

                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nip Widyaiswara</th>
                            <th>Nama Widyaiswara</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($widyaiswaras as $key=>$widyaiswara)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$widyaiswara->nip}}</td>
                                    <td>{{$widyaiswara->nama}}</td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#editwidyaiswaramodal" data-widyaiswara_id="{{$widyaiswara->id}}" data-nip="{{$widyaiswara->nip}}" data-nama="{{$widyaiswara->nama}}" ><span class="glyphicon glyphicon-pencil col-sm-offset-3"></span></a>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#deletewidyaiswaramodal" data-widyaiswara_id="{{$widyaiswara->id}}" data-nip="{{$widyaiswara->nip}}" data-nama="{{$widyaiswara->nama}}" ><span class="glyphicon glyphicon-trash col-sm-offset-3"></span></a>
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
@include('widyaiswara.addwidyaiswaramodal')
@include('widyaiswara.editwidyaiswaramodal')
@include('widyaiswara.deletewidyaiswaramodal')
@endsection
