@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Management Data User</div>

                <div class="panel-body">
                    <table class="table table-responsive dttable">
                        <thead>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th>Hak Akses User</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->roles()->get() as $k=>$role)
                                            {{$role->display_name}}, 
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="#" id="edit" data-toggle="modal" data-target="#myModal" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" ><span class="glyphicon glyphicon-ok-circle col-sm-offset-3"></span></a>&nbsp;&nbsp;&nbsp;
                                        <a href="#" id="delete" data-toggle="modal" data-target="#remModal" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" ><span class="glyphicon glyphicon-remove-circle col-sm-offset-3"></span></a>
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
@include('manageuser.usermodal',['roles'=>$roles])
@include('manageuser.userremoveprivileges')
@endsection
