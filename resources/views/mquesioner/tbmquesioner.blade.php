@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
              Anda Disini : <li><a href="#">Master Data</a></li>
              <li class="active"><a href="{{url('/mquesioner')}}">Master Quesioner Pasca Diklat</a></li>
            </ol>
            <!--end panel form mentor-->
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-tag"></span>
                    Master Quesioner Pasca Diklat
                    <div>
                        <a href="#" data-toggle="modal" data-target="#addmquesioner" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                    </div>
                </div>
                <div class="panel-body">
                    <!--Mentor Table-->
                    <table class="table table-responsive table-hover dttable">
                        <thead>
                            <th>#</th>
                            <th class="col-sm-8">Question</th>
                            <th class="col-sm-1">Question For Diklat</th>
                            <th class="col-sm-1">Question For</th>
                            <th class="col-sm-2">Action</th>
                        </thead>
                        <tbody>
                            @foreach($quesioners as $key=>$question)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$question->question}}<br>
                                        @foreach($question->opsi as $key=>$pilih)
                                            <div>
                                                <a href="#" data-toggle="modal" data-target="#editopsimodal" data-opsi_id="{{$pilih->id}}" data-opsi="{{$pilih->pilihan}}" data-uraian="{{$pilih->uraian}}"><span class="glyphicon glyphicon-ok-circle col-sm-1"></span></a> <a href="#" data-toggle="modal" data-target="#delopsimodal" data-opsi_id="{{$pilih->id}}" data-opsi="{{$pilih->pilihan}}"><span class="glyphicon glyphicon-remove-circle col-sm-1"></span></a>{{$pilih->pilihan}}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>{{$question->diklat}}</td>
                                    <td>{{$question->questionfor}}</td>
                                    <td>
                                        <a href="#" id="edit" class="col-sm-offset-1" data-toggle="modal" data-target="#editmquesioner" data-question_id="{{$question->id}}" data-question="{{$question->question}}" data-diklat="{{$question->diklat}}" data-questionfor="{{$question->questionfor}}"><span class="glyphicon glyphicon-pencil col-sm-offset-3"></span></a>
                                        <a href="#" id="del" class="col-sm-offset-1" data-toggle="modal" data-target="#delmquesioner" data-question_id="{{$question->id}}" data-question="{{$question->question}}" data-diklat="{{$question->diklat}}" data-questionfor="{{$question->questionfor}}"><span class="glyphicon glyphicon-trash col-offset-sm-3"></span></a>
                                        <a href="#" id="opsi" class="col-sm-offset-1" data-toggle="modal" data-target="#addopsimquesioner" data-question_id="{{$question->id}}"><span class="glyphicon glyphicon-link col-offset-sm-3"></span></a>
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
@include('mquesioner.addmquesionermodal')
@include('mquesioner.editmquesionermodal')
@include('mquesioner.delmquesionermodal')
@include('mquesioner.addopsimquesionermodal')
@include('mquesioner.detilopsimquesionermodal')
@include('mquesioner.editopsimquesionermodal')
@include('mquesioner.delopsimquesionermodal')
@endsection
